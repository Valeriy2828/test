@extends('app')

@section('content')
    <!-- Add Company -->
    <div class="add-form-content" style="margin-top: 50px;">
        <div class="container">
            <form method="post" action="/addFirm/add" >
                @csrf
                <div class="col-5">
                    <center>
                        <div style="margin: 20px 0 30px 0;"><h3>Add company</h3></div>
                    </center>
                    <div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-5 text-center">
                <a href="{{ route('main') }}">To home page</a>
            </div>
        </div>
    </div>
    <!-- End add Company -->
@endsection
