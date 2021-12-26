@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-lg12" style="margin: 5px">
            <div class="pull-left">
                <h2>CRUD example</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('columns.create') }}">
                    Create new Column
                </a>
            </div>
        </div>
    </div>

    @if($message = \Illuminate\Support\Facades\Session::get("success"))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Title</th>

        </tr>
        @foreach ($columns as $column)
            <tr>
                <td>{{ $column->title }}</td>

                <td>
                    <div class="d-flex flex-row gap-2">
                        <a class="btn btn-primary" href="{{ route('columns.show', $column->id)}}">Show</a>
                        <a class="btn btn-warning" href="{{ route('columns.edit', $column->table())}}">Edit</a>
                        <form action="{{route('columns.destroy', $column->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
