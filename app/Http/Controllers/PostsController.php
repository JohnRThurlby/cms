<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequests;

use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{

    public function __construct() {

    $this->middleware('verifyCategoriesCount')->only(['create', 'store']);

    }

    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    public function store(CreatePostsRequest $request)
    {

        $image = $request->image->store('posts');


        $image = $request->image;

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/posts/', $image_new_name);

        $post = Post::create ([
          
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => 'uploads/posts/' . $image_new_name,
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id

          ]);


          if ($request->tag) {
            $post->tags()->attach($request->tag);
          }

        session()->flash('success','Post created successfully');

        return redirect( route('posts.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    public function update(UpdatePostRequests $request, Post $post)
    {

        $data = $request->only(['title','description','content', 'published_at', 'category_id']);

        if($request->hasFile('image') ) {

          $image = $request->image->store('posts');

          $post->deleteImage();

          $data['image'] = $image;

        }

        $post::update ($data);

        session()->flash('success','Post updated successfully');

        return redirect( route('posts.index'));
    }

    public function destroy($id)

    {

        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        if ($post->trashed()) {

            $post->deleteImage();

            session()->flash('success','Post deleted successfully');

            $post->forceDelete();

        } else{

            session()->flash('success','Post trashed successfully');

            $post->delete();
        }



        return redirect( route('posts.index'));
    }

    public function trashed(Post $post)

    {
        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->withPosts($trashed);

    }

    public function restore($id)

    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        $post->restore();

        session()->flash('success','Post restored successfully');

        return redirect()->back();
    }
}
