<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = \App\Models\Tag::factory(10)->create();

         \App\Models\User::factory(10)->create()->each(function ($user) use ($tags) {
            \App\Models\Listing::factory(rand(1, 2))->create([
                'user_id' => $user->id,
            ])->each(function ($listing) use ($tags) {
                $listing->tags()->attach($tags->random(2));
            });
         });

    }
}
