@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-75 p-5">
            <h3>Show Column</h3>

            <div class="mb-3 row">
                <label for="title" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input readonly id="title" type="text" class="form-control-plaintext" name="title"
                           placeholder="Title"
                           value="{{$column->title}}">
                </div>
            </div>

            <a class="btn btn-primary" href="{{ route('columns.index') }}">
                Back
            </a>
        </div>
    </div>

    @if($errors->any())
        @foreach ($errors as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
@endsection
