<x-loggedin>
    Wallet: <a href="{{route('wallets.edit', $wallet)}}">{{$wallet->name}}</a>
    <h2>add transaction</h2>
    <form method="post" action="{{route('transactions.store_tr', $wallet)}}">
        @csrf
        <label for="type"> Transaction type
            <select name="type">
                <option value="+">+</option>
                <option value="-">-</option>
            </select>
        </label>
        <br>
        <label for="value">Amount
            <input name="value" type="number">
        </label>
        <button>Add</button>
    </form>

</x-loggedin>
