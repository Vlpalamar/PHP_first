@extends('layout.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-100 p-5">
            <h3>{{$table->name}}</h3>
            <div class="mb-3 row">
                <label for="users" class="col-sm-2 col-form-label">Users</label>
                <p>{{ $table->users()->pluck('name')->implode(', ') }}</p>
            </div>
            <br><br>

            <table class="table" border="1">
                <tr>
                @foreach($table->columns()->get() as $column)

                        <th>  <a class="btn text-black" href="{{ route('columns.edit', $column->id)}}">{{$column->title}} </a>
                    <ul class="list-group">
                        @foreach($column->posts()->get() as $post)
                            <li class="list-group-item">
                                <h4 ><a style=" color: black; text-decoration: none" href="{{ route('posts.edit',$post->id)}}">{{$post->title}}</a>   </h4>
                            <p style="color:gray">{{$post->description }}</p>

                            </li>
                        @endforeach
{{--                        создать пост--}}
                        <li  class="list-group-item">
                            <form class="form" action="{{ route('posts.store') }}" method="post">
                                <input type="hidden" name="column_id" value={{$column->id}}>
                                <input type="hidden" name="table_id" value={{$table->id}}>
                                <input type="text" name="title" class="form-control" >
                                <textarea type="text"  name="description"  class="form-control" ></textarea>
                                @csrf
                                <button class="btn btn-success" type="submit">+New POst </button>
                            </form>
                        </li>
                    </ul>
                        </th>
                @endforeach

                        <td>

{{--                        создать колонку    --}}
                            <form class="form" action="{{ route('columns.store') }}" method="post">
                                <input type="hidden" name="table_id" value={{$table->id}}>
                                <input type="text" name="title" class="form-control" >
                                @csrf
                                <button class="btn btn-success" type="submit">+New Column </button>
                            </form>
                        </td>
                    </tr>

            </table>

            <a class="btn btn-primary" href="{{ route('tables.index') }}">
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
