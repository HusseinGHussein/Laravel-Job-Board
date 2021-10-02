<?php

namespace App\Collections;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class ListingCollection extends Collection
{
    public function searchWhere($query)
    {
        return $this->filter(function ($listing) use ($query) {
            if (Str::contains(strtolower($listing->title), $query)) {
                return true;
            }

            if (Str::contains(strtolower($listing->company), $query)) {
                return true;
            }

            if (Str::contains(strtolower($listing->location), $query)) {
                return true;
            }

            return false;
        });
    }

    public function tagged($tag)
    {
        return $this->filter(function ($listing) use ($tag) {
            return $listing->tags->contains('slug', $tag);
        });
    }
}