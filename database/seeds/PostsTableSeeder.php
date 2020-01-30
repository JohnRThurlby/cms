<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Category;
use App\Post;
use App\User;
use App\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create(['name' => 'News']);
        $category2 = Category::create(['name' => 'Updates']);
        $category3 = Category::create(['name' => 'Products']);
        $category4 = Category::create(['name' => 'Offers']);
        $category5 = Category::create(['name' => 'Hiring']);
        $category6 = Category::create(['name' => 'Design']);
        $category7 = Category::create(['name' => 'Marketing']);

        $tag1 = Tag::create(['name' => 'Record']);
        $tag2 = Tag::create(['name' => 'Progress']);
        $tag3 = Tag::create(['name' => 'Customers']);
        $tag4 = Tag::create(['name' => 'Offer']);
        $tag5 = Tag::create(['name' => 'Freebies']);
        $tag6 = Tag::create(['name' => 'Screenshot']);
        $tag7 = Tag::create(['name' => 'Milestone']);

        $author1 = User::create([
          'name' => 'John Smith',
          'email' => 'johnsmith@gmail.com',
          'password' => Hash::make('password')
        ]);

        $author2 = User::create([
          'name' => 'Fred Himes',
          'email' => 'fredhimes@gmail.com',
          'password' => Hash::make('password')
        ]);

        $author3 = User::create([
          'name' => 'Frank Enstein',
          'email' => 'frankensteingmail.com',
          'password' => Hash::make('password')
        ]);


         $post1 = $author1->posts()->create([
          'title' => 'We relocated our office to a new designed garage',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
          'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'category_id' => $category1->id,
          'image' => 'posts/1.jpg'
          ]);

          $post2 = $author2->posts()->create([
          'title' => 'Top 5 brilliant content marketing strategies',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
          'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'category_id' => $category2->id,
          'image' => 'posts/2.jpg'
          ]);

          $post3 = $author3->posts()->create([
          'title' => 'Best practices for minimalist design with example',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
          'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'category_id' => $category3->id,
          'image' => 'posts/3.jpg'
          ]);

          $post4 = $author2->posts()->create([
          'title' => 'Congratulate and thank to Maryam for joining our team',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
          'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'category_id' => $category4->id,
          'image' => 'posts/4.jpg'
          ]);

          $post5 = $author1->posts()->create([
          'title' => 'New published books to read by a product designer',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
          'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'category_id' => $category5->id,
          'image' => 'posts/5.jpg'
          ]);

          $post6 = $author3->posts()->create([
          'title' => 'This is why its time to ditch dress codes at work',
          'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
          'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'category_id' => $category6->id,
          'image' => 'posts/6.jpg'
          ]);

          $post1->tags()->attach([$tag1->id, $tag2->id]);
          $post3->tags()->attach([$tag1->id, $tag3->id]);
          $post5->tags()->attach([$tag2->id, $tag4->id, $tag6->id]);
    }
}
