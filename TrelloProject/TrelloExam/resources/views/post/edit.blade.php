@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-75 p-5">
            <h3>Edit post</h3>
            <form action="{{route('posts.update', $post->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input id="title" type="text" class="form-control-plaintext" name="title" placeholder="Title"
                               value="{{$post->title}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10">
                        <input  type="hidden" class="form-control-plaintext" name="table_id"  value="{{$post->table_id}}" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="description" type="text" class="form-control-plaintext" name="description"
                                  placeholder="Description">{{$post->description}}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
                <a class="btn btn-primary" href="{{ route('tables.show',$post->table_id) }}">
                    Back
                </a>
            </form>
            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
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
