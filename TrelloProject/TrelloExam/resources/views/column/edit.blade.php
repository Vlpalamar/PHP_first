@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-75 p-5">
            <h3>Edit Column</h3>
            <form action="{{route('columns.update', $column->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input id="title" type="text" class="form-control-plaintext" name="title" placeholder="Title"
                               value="{{$column->title}}">
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Save</button>

                <a class="btn btn-primary" href="{{ route('tables.show',$column->table_id) }}">
                    Back
                </a>
            </form>
            <form action="{{route('columns.destroy', $column->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @if($errors->any())
        @foreach ($errors as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
@endsection
