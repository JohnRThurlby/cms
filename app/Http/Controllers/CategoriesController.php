<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;

use App\Category;

class CategoriesController extends Controller
{
   
    public function index()
    {
        return view('categories.index')->with('categories', Category::all());
    }
    
    public function create()
    {
        return view('categories.create');

    }
    
    public function store(CreateCategoryRequest $request)
    {
        
        Category::create ([
          'name' => $request->name

        ]);

        session()->flash('success','Category created successfully');

        return redirect( route('categories.index'));

    }
    
    public function show($id)
    {
        //
    }
    
    public function edit(Category $category)
    {
        return view('categories.create')->with('category', $category);
    }
    
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        
        $category->update ([
            'name' => $request->name
  
          ]);
  
        session()->flash('success','Category updated successfully');
  
        return redirect( route('categories.index'));
    }
    
    public function destroy(Category $category)
        
    {

        if($category->posts->count() > 0) {

          session()->flash('error','Category cannot be deleted as it is assocated to a post');
  
          return redirect()->back();

        }

        $category->delete();

        session()->flash('success','Category deleteed successfully');
  
        return redirect( route('categories.index'));
    }
}
