@extends('app')

@section('content')
    <div class="edit-form-content" style="margin-top: 50px;">
        <div class="container">
            <form method="post" action="/editFirm/{{$editFirm->id}}/update">
                @csrf
                <div class="col-5">
                    <center>
                        <div style="margin: 20px 0 30px 0;"><h3>Edit Company</h3></div>
                    </center>
                    <div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $editFirm->title  }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="submit" class="btn btn-primary" value="Save changes">
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-5 text-center">
                <a href="{{ route('main') }}">To home page</a>
            </div>
        </div>
    </div>
@endsection
