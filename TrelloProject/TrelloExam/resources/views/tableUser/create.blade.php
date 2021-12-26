@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-75 p-5">
            <h3>Create new table</h3>
            <form action="{{route('UserTables.store')}}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">name</label>
                    <div class="col-sm-10">
                        <input id="name" type="text" class="form-control-plaintext" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="from-group"><label class="col-sm-2 control-label">Users:</label>
                    <div class="col-sm-10">
                        @foreach($users as $user)
                            <input  type="checkbox"  name="users[]" value="{{$user->id}}"
                                    @if($currentUser==$user)
{{-- если раскоментировать - не будет добовлять в таблицу                disabled="disabled"--}}
                                    checked="checked"
                                @endif
                            >
                            <label class="">{{ucfirst($user->name)}}</label>
                            <br>
                        @endforeach
                    </div>
                </div>


                <button type="submit" class="btn btn-success">Submit</button>
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
