@extends('layouts.app')

@section('content')

  <div class="d-flex justify-content-end mb-2">

  <a href="{{ route('tags.create') }}" class="btn btn-success">Add Tag</a>

  </div> <!-- end d-flex -->

  <div class="card">

    <div class="card-header">Tags</div>

    <div class="card-body">

      @if($tags->count() > 0)

        <table class="table table-hover">

          <thead>

            <th>Name</th>
            <th>Post Count</th>
            <th></th>
            <th></th>

          </thead> <!-- end table head -->

          <tbody>

            @foreach($tags as $tag)

              <tr>

                <td>
                  {{$tag->name}}
                </td>

                <td>
                  {{$tag->posts->count()}}
                </td>

                <td>

                  <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-small">Edit</a>

                </td>

                <td>

                  <button class="btn btn-danger btn-small" onclick="handleDelete({{ $tag->id}})">Delete</button>

                </td>

              </tr> <!-- end table row -->

            @endforeach  <!-- end foreach -->

          </tbody> <!-- end table body -->

        </table> <!-- end table -->

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="POST" id="deleteTagForm">

                @csrf
                @method('DELETE')

                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p class="text-bold text-center">
                        Are you sure you want to delete this tag?
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
         <h3 class="text-cenrer">No Tags currently exist</h3>
      @endif
    </div> <!-- end card body -->

  </div> <!-- end card default -->

@endsection <!-- end section -->

@section('scripts')

   <script>

    function handleDelete(id) {

      var form = document.getElementById('deleteTagForm')
      form.action = '/tags/' + id

      $('#deleteModal').modal('show')

    }

   </script> <!-- end script -->

@endsection
