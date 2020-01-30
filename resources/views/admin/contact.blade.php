@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="card card-default">

      <div class="card-header">

      </div> <!-- end card header -->

      <div class="card card-body">

        @include('partials.errors')

        <form action="{{ route('admin.contact')}}" method="POST">

          @csrf

          <div class="form-group">

            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" name="name">

          </div> <!-- end form group -->

          <div class="form-group">

            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" name="email">

          </div> <!-- end form group -->

          <div class="form-group">

            <label for="msg">Message</label>
            <input id="msg" type="hidden" name="msg">
            <trix-editor input="msg" class="trix-content"></trix-editor>

          </div> <!-- end form group -->

          <div class="form-group">

              <button type="submit" class="btn btn-success btn-sm">

                  Submit message
                  
              </button>

          </div> <!-- end form group -->

        </form> <!-- end form -->

      </div> <!-- end card body -->

    </div> <!-- end card default -->

  </div> <!-- end container -->

@endsection <!-- end section -->

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@endsection <!-- end section -->

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection <!-- end section -->
