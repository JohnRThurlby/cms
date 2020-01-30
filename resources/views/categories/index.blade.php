@extends('layouts.app')

@section('content')

  <div class="d-flex justify-content-end mb-2">

  <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>

  </div> <!-- end d-flex -->

  <div class="card">

    <div class="card-header">Categories</div>

    <div class="card-body">

      @if($categories->count() > 0)

        <table class="table table-hover">

          <thead>

            <th>Name</th>
            <th>Post Count</th>
            <th></th>
            <th></th>

          </thead> <!-- end table head -->

          <tbody>

            @foreach($categories as $category)

              <tr>

                <td>
                  {{$category->name}}
                </td>

                <td>
                  {{$category->posts->count()}}
                </td>

                <td>

                  <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-small">Edit</a>

                </td>

                <td>

                  <button class="btn btn-danger btn-small" onclick="handleDelete({{ $category->id}})">Delete</button>

                </td>

              </tr> <!-- end table row -->

            @endforeach  <!-- end foreach -->

          </tbody> <!-- end table body -->

        </table> <!-- end table -->

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="POST" id="deleteCategoryForm">

                @csrf
                @method('DELETE')

                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p class="text-bold text-center">
                        Are you sure you want to delete this category?
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                  </div>
            </form> <!-- end form -->
          </div>
        </div>
      @else
         <h3 class="text-cenrer">No Categories currently exist</h3>
      @endif
    </div> <!-- end card body -->

  </div> <!-- end card default -->

@endsection <!-- end section -->

@section('scripts')

   <script>

    function handleDelete(id) {

      var form = document.getElementById('deleteCategoryForm')
      form.action = '/categories/' + id

      $('#deleteModal').modal('show')

    }

   </script> <!-- end script -->

@endsection
