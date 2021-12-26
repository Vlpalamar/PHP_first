@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-75 p-5">
            <h3>Create new post</h3>
            <form action="{{route('posts.store')}}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input id="title" type="text" class="form-control-plaintext" name="title" placeholder="Title">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="category" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <input id="category" type="text" class="form-control-plaintext" name="category" placeholder="Category">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="description" type="text" class="form-control-plaintext" name="description" placeholder="Description"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{ route('posts.index') }}">
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
