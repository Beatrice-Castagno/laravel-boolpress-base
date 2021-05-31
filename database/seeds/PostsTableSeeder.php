<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            
            $post = new Post();

            $post->title = $faker->sentence(); //To generate title
            $post->date = $faker->date(); //To generate data
            $post->content = $faker->paragraph(rand(10,15)); //To generate content
            $post->image = 'images/' . $faker->image('public/storage/images',400,300, null, false); //To generate image
            $post->slug = Str::slug($post->title, '-'); //To generate slug with name title
            $post->published = rand(0, 1); //To generate published or not

            $post->save(); //To save
        }
    }
}
