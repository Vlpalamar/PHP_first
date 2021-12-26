<?php
$users= \App\Models\User::all();
$user = auth()->user();
//$tables= \App\Models\Table::all();
$tables=$user->tables;
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<table class="table">

        @foreach($tables as $table)
        <tr>
            <td> <a  href="{{ route('tables.show', $table->id)}}">{{$table->name}}</a> </td>
            <td> <a class="btn btn- alert-success" href="{{ route('tables.edit', $table->id)}}"> <i class="glyphicon glyphicon-edit">  </i> </a> </td>
            <td> <form action="{{route('tables.destroy', $table->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="alert alert-danger"> <i class="glyphicon glyphicon-trash"> </i> </button>
            </form>
            </td>
        </tr>
        @endforeach
            <tr>
        <td ><a href="{{ route('UserTables.create', $user->id)}}">+new</a></td>

            </tr>

</table>
</body>
</html>
