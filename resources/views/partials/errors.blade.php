@if ($errors->any())  

    <div class="alert alert-danger">

        <ul class="list-group">

        @foreach ($errors->all() as $error)

            <li class="list-group-item text-danger">

            {{ $error }}

            </li> <!-- end li list group item -->
                
        @endforeach <!-- end for each -->

        </ul> <!-- end ul list group -->

    </div>  <!-- end alert --> 

@endif <!-- end if -->
