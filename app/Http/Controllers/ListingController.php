<?php

namespace App\Http\Controllers;

use App\Http\Requests\Listings\StoreListingRequest;
use App\Models\Tag;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $listings = Listing::query()
                ->active()
                ->with(['tags' => function ($query) {
                    return $query->select(['name', 'slug']);
                }])
                ->latest()
                ->get();

        if ($request->filled('search')) {
            $listings = $listings->searchWhere(strtolower($request->get('search')));
        }

        if ($request->filled('tag')) {
            $listings = $listings->tagged($request->get('tag'));
        }

        $tags = Tag::query()
                ->orderBy('name')
                ->get();

        return view('listings.index', [
            'listings' => $listings,
            'tags' => $tags
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(StoreListingRequest $request)
    {
        $user = auth()->user();

        if (!$user) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            Auth::login($user);
        }

        try {
            $md = new \ParsedownExtra();

            $listing = $user->listings()
                ->create([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title) . '-' . rand(1111, 9999),
                    'company' => $request->company,
                    'logo' => basename($request->file('logo')->store('public')),
                    'location' => $request->location,
                    'apply_link' => $request->apply_link,
                    'content' => $md->text($request->input('content')),
                    'is_highlighted' => $request->filled('is_highlighted'),
                    'is_active' => true
                ]);

            foreach(explode(',', $request->tags) as $requestTag) {
                $tag = Tag::firstOrCreate([
                    'slug' => Str::slug(trim($requestTag))
                ], [
                    'name' => ucwords(trim($requestTag))
                ]);

                $tag->listings()->attach($listing->id);
            }

            return redirect()->route('dashboard');
        } catch(\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing->load(['tags' => function ($query) {
                return $query->select(['name', 'slug']);
            }])
        ]);
    }

    public function apply(Request $request, Listing $listing)
    {
        $listing->clicks()->create([
            'user_agent' => $request->userAgent(),
            'visitor' => $request->ip(),
        ]);

        return redirect()->to($listing->apply_link);
    }
}
