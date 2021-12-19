<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>
    @if(false)
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi doloremque doloribus ea eius enim explicabo minus nihil odit sit vel? Doloribus facere nam pariatur sed. Delectus deserunt earum nobis veniam.
    @endif

    @foreach($users as $user)
        <p> {{$user->id}}-{{$user->name}}-{{$user->email}}</p>
    @endforeach
</p>
</body>
</html>
