<x-loggedin>
    <div class="container mt-5">
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
    </div>

    <div class="container mt-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Delete</th>
                <th scope="col">Fraudulent</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <th scope="row">{{$transaction->type}}</th>
                    <td>{{$transaction->value}}</td>
                    <td>{{$transaction->created_at}}</td>
                    <td>
                        <form method="post"
                              action="{{route('transactions.destroy', $transaction)}}">
                            @csrf
                            @method('delete')
                            <button>delete</button>
                        </form>
                    </td>
                    <td>{{$transaction->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-loggedin>
