<x-loggedin>


    <div class="container mt-5">
        <div class="list-group">
            @foreach($wallets as $wallet)
                <a href="{{route('wallets.show', $wallet)}}" class="list-group-item list-group-item-action"
                   aria-current="true">{{$wallet->name}}</a>
            @endforeach
        </div>
    </div>

</x-loggedin>
