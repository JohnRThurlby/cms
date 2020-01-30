@extends('layouts.app')

@section('content')

  @include('partials.errors')

  <div class="card">

    <div class="card-header">Users</div>

    <div class="card-body">

      @csrf

      @if($users->count() > 0)

      <table class="table table-hover">

        <thead>

          <th>Image</th>
          <th>Name</th>
          <th>Email</th>
          <th></th>

        </thead> <!-- end table head -->

        <tbody>

            @foreach($users as $user)

            <tr>

              <td>


              </td>

              <td>

                  {{ $user->name }}

              </td>

              <td>

                  {{ $user->email}}

              </td>

              <td>

                @if(!$user->isAdmin())

                  <form action="{{ route ('users.make-admin', $user->id) }}" method="POST">

                    @csrf

                    <button type="submit" class="btn btn-sm btn-success">Make Admin</button>

                  </form>

                @endif

              </td>

            </tr> <!-- end table row -->

          @endforeach  <!-- end foreach -->

        </tbody> <!-- end table body -->

      </table> <!-- end table -->

    @else
      <h3 class="text-center">No Users currently exist</h3>
    @endif

    </div>
  </div>

@endsection
