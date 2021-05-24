<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Comment;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
                // get all post published
                $posts = Post::where('published', 1)->get();
                
                foreach ($posts as $post) {

                    for ($i = 0; $i < rand(0, 5); $i++) {
        
                        $newComment = new Comment();

                        $newComment->post_id = $post->id; //set post_id with id of post

                        if (rand(0,1)) {
                            $newComment->name = $faker->name();//To generate author name 
                        }
                        else{
                            $newComment->name = "unregistered user"; // set unregistered user
                        }

                        $newComment->content = $faker->text(); //to generate content of comment
                        $newComment->save();// to save
                    }
                    
                }
    }
}
