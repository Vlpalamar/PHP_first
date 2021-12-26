@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-lg12" style="margin: 5px">
            <div class="pull-left">
                <h2>CRUD example</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tables.create') }}">
                    Create new Table
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
            <th>Name</th>

        </tr>
        @foreach ($tables as $table)
            <tr>
                <td>{{ $table->name }}</td>
                <td>{{ $table->users()->pluck('name')->implode(', ') }}</td>

                <td>
                    <div class="d-flex flex-row gap-2">
                        <a class="btn btn-primary" href="{{ route('tables.show', $table->id)}}">Show</a>
                        <a class="btn btn-warning" href="{{ route('tables.edit', $table->id)}}">Edit</a>
                        <form action="{{route('tables.destroy', $table->id)}}" method="POST">
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
