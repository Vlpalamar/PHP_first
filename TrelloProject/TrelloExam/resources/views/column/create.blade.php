@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-75 p-5">
            <h3>Create new column</h3>
            <form action="{{route('columns.store')}}" method="post">
                @csrf
                <input type="text" id="table_id" name="table_id" value="{{$table->id}}">
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input id="title" type="text" class="form-control-plaintext" name="title" placeholder="Title">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{ route('columns.index') }}">
                    Back
                </a>
            </form>
        </div>
    </div>
    @if($errors->any())
        @foreach ($errors as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
@endsection
