<x-loggedin>
    <div class="container mt-5">
        <form method="post" action="{{route('wallets.store')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Wallet name</label>
                <input name="name" class="form-control" id="name" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Enter new wallet name</div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-loggedin>
