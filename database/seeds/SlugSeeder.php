<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;

class SlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $slug = Str::slug($post->title);

            $alreadyExist = Post::where('slug', $slug)->first();
            $count = 1;

            while ($alreadyExist) {
                $newSlug = $slug . "-" . $count;
                $alreadyExist = Post::where('slug', $newSlug)->first();
                $count++;

                if (!$alreadyExist) {
                    $slug = $newSlug;
                }
            }
            $post->slug = $slug;
            $post->save();
        }
    }
}
