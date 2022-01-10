<x-loggedin>
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
</x-loggedin>
