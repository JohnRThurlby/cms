<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Tag;
use App\Category;

class PostsController extends Controller
{
    public function show(Post $post){

      return view('blog.show')->with('post', $post);

    }

    public function category(Category $category){

    $search = request()->query('search');

    if ($search) {

      $posts = $category->posts()->where('title', 'LIKE', "{$search}")->simplePaginate(4);

    } else {

      $posts = $category->posts()->simplePaginate(4);

    }

      return view('blog.category')
      ->with('category', $category)
      ->with('posts', $posts)
      ->with('categories', Category::all())
      ->with('tags', Tag::all());

    }

    public function tag(Tag $tag){

      $search = request()->query('search');

      if ($search) {

        $posts = $tag->posts()->where('name', 'LIKE', "{$search}")->simplePaginate(4);

      } else {

        $posts = $tag->posts()->simplePaginate(4);

      }

      return view('blog.tag')
      ->with('tag', $tag)
      ->with('posts', $posts)
      ->with('tags', Tag::all())
      ->with('categories', Category::all());

    }
}
