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
<h1>Edit wallet</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{route('wallets.update', $wallet)}}">
    @csrf
    @method('patch')
    <label for="name"> New wallet name:
        <input name="name" value="{{$wallet->name}}">
    </label>
    <button>Rename</button>

</form>


<form method="post" action="{{route('wallets.destroy', $wallet)}}">
    @csrf
    @method('delete')
    <button>Delete wallet</button>
</form>
</body>
</html>
