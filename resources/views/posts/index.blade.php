@extends('layouts.app')

@section('content')

  <div class="d-flex justify-content-end mb-2">

  <a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>

  </div> <!-- end d-flex -->

  <div class="card">

    <div class="card-header">Posts</div>

    <div class="card-body">

      @csrf

      @if($posts->count() > 0)

      <table class="table table-hover">

        <thead>

          <th>Image</th>
          <th>Title</th>
          <th>Category</th>
          <th></th>
          <th></th>

        </thead> <!-- end table head -->

        <tbody>

            @foreach($posts as $post)

            <tr>

              <td>

                <img src="{{ asset($post->image) }}" width="60px" height="60px" alt="">

              </td>

              <td>

                  {{ $post->title }}

              </td>

              <td>

                  <a href="{{ route('categories.edit', $post->category->id ) }}">

                  {{ $post->category->name}}

                  </a>

              </td>

              @if($post->trashed())

                <td>
                  <form action="{{ route('restore-posts', $post->id)}}"method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-info btn-sm">Restore</button>
                  </form>
                </td>

              @else

                <td>

                  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-sm">Edit</a>

                </td>

              @endif

              <td>

              <form action="{{ route('posts.destroy', $post->id)}}"method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" >
                    {{ $post->trashed() ? 'Delete' : 'Trash' }}
                  </button>
                </form>

              </td>

            </tr> <!-- end table row -->

          @endforeach  <!-- end foreach -->



        </tbody> <!-- end table body -->

      </table> <!-- end table -->

    @else
      <h3 class="text-cenrer">No Posts currently exist</h3>
    @endif

    </div>
  </div>

@endsection