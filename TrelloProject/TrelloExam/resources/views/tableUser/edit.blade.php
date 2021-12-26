@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-75 p-5">
            <h3>Edit post</h3>

            <form action="{{route('UserTables.update', $table->id,$users )}}" method="POST">
                @csrf
                @method("PUT")
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input id="name" type="text" class="form-control-plaintext" name="name" placeholder="Name"
                               value="{{$table->name}}">
                    </div>
                </div>
                <div class="from-group"><label class="col-sm-2 control-label">Users:</label>
                    <div class="col-sm-10">
{{--                        @foreach($users as $user)--}}
{{--                            <input  type="checkbox"  name="users[]" value="{{$user->id}}" >--}}
{{--                            <label class="">{{ucfirst($user->name)}}</label>--}}
{{--                            <br>--}}
{{--                        @endforeach--}}

                        @foreach($users as $user)
                            <input  type="checkbox"  name="users[]" value="{{$user->id}}"
                        @if($table->users->where('id',$user->id)->count())
                            checked="checked"
                            @endif
                        >
                            <label class="">{{ucfirst($user->name)}}</label>
                            <br>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
                <a class="btn btn-primary" href="{{ route('UserTables.index') }}">
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
