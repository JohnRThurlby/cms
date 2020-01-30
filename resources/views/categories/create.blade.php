@extends('layouts.app')

@section('content')

  <div class="card card-default">
      
    <div class="card-header">

      {{ isset($category) ? 'Edit Category' : 'Create Category'}}

    </div> <!-- end card header -->

    <div class="card card-body">

      @include('partials.errors')

      <form action="{{ isset($category) ? route('categories.update' , $category->id) : route('categories.store') }}" method="POST">

        @csrf

        @if(isset($category))
          @method('PUT')
        @endif

        <div class="form-group">

            <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name" value="{{ isset($category) ? $category->name : ''}}">

        </div> <!-- end form group -->

        <div class="form-group">
        
            <button class="btn btn-success">
                {{ isset($category) ? 'Update Category' : 'Add Category'}}
            </button>
        
        </div> <!-- end form group -->

      </form> <!-- end form -->

    </div> <!-- end card body -->

  </div> <!-- end card default -->

@endsection <!-- end section -->
