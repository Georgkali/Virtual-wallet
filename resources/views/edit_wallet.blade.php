<x-loggedin>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">
        <form method="post" action="{{route('wallets.update', $wallet)}}">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">New wallet name</label>
                <input name="name" class="form-control" id="name" value="{{$wallet->name}}"
                       aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Enter new wallet name</div>
            </div>
            <button type="submit" class="btn btn-primary">Rename</button>
        </form>

        <form method="post" action="{{route('wallets.destroy', $wallet)}}">
            @csrf
            @method('delete')
            <button class="btn btn-danger mt-2">Delete wallet</button>
        </form>
    </div>

</x-loggedin>
