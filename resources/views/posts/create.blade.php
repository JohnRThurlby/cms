@extends('layouts.app')

@section('content')

  <div class="card card-default">
      
    <div class="card-header">

      {{ isset($post) ? 'Update Post' : 'Create Post' }}

    </div> <!-- end card header -->

    <div class="card card-body">

      @include('partials.errors')

      <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        @if( isset($post))
          @method('PUT')
        @endif

        <div class="form-group">

          <label for="title">Title</label>
          <input type="text" id="title" class="form-control" name="title" value="{{ isset($post) ? $post->title : '' }}">

        </div> <!-- end form group -->

        <div class="form-group">

          <label for="description">Description</label>
          <textarea id="description" class="form-control" cols=5 rows=5 name="description">{{ isset($post) ? $post->description : '' }}</textarea>
    
        </div> <!-- end form group -->

        <div class="form-group">

          <label for="content">Content</label>
          <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}" >
          <trix-editor input="content" class="trix-content"></trix-editor>
          
        </div> <!-- end form group -->

        <div class="form-group">

          <label for="published_at">Published At</label>
          <input type="text" id="published_at" class="form-control" name="published_at" value="{{ isset($post) ? $post->published_at : '' }}">

        </div> <!-- end form group -->

        @if(isset($post))

          <div class="form-group">

            <img src="{{ asset($post->image)}}" alt="" style="width: 100%">

          </div>

        @endif

        <div class="form-group">

          <label for="image">Image</label>
          <input type="file" id="image" class="form-control" name="image">

        </div> <!-- end form group -->

        <div class="form-group">

          <label for="category">Category</label>
          <select name="category" id="category" class="form-control">

            @foreach( $categories as $category )

                <option value="{{ $category->id }}">
                  
                  {{ $category->name }}
                </option>

            @endforeach

          </select>

        </div> <!-- end form group -->

        @if ($tags->count() > 0)

            <div class="form-group">

              <label for="tag">Tag</label>
              <select name="tag[]" id="tag" class="form-control" multiple>

                @foreach( $tags as $tag )

                    <option value="{{ $tag->id }}">
                    @if(isset($post))
                        @if(in_array($tag->id, $post->tags->toArray()))
                          selected
                        @endif
                    @endif
                  
                      {{ $tag->name }}
                    </option>

                @endforeach

              </select>

            </div> <!-- end form group -->

        @endif

        <div class="form-group">
        
            <button type="submit" class="btn btn-success">
                {{ isset($post) ? 'Update Post' : 'Create Post' }}
            </button>
        
        </div> <!-- end form group -->

      </form> <!-- end form -->

    </div> <!-- end card body -->

  </div> <!-- end card default -->

@endsection <!-- end section -->

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr("#published_at",
     { enableTime: true})
</script>

@endsection <!-- end section -->

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection <!-- end section -->


