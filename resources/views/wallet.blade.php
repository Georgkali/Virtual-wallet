<x-loggedin>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Wallet name</th>
                <th scope="col">Transaction type</th>
                <th scope="col">Amount</th>
                <th scope="col">Make transaction</th>
                <th scope="col">Incoming transactions</th>
                <th scope="col">Outgoing transactions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row"><a href="{{route('wallets.edit', $wallet)}}">{{$wallet->name}}</a></th>
                <form method="post" action="{{route('transactions.store_tr', $wallet)}}">
                    @csrf
                    <td><select name="type">
                            <option value="+">+</option>
                            <option value="-">-</option>
                        </select></td>
                    <td><input name="value" type="number"></td>
                    <td>
                        <button class="btn btn-primary">Make</button>
                    </td>
                </form>
                <td>{{$incomes}}</td>
                <td>{{$outgo}}</td>
            </tr>
            </tbody>
        </table>
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
                @if($transaction->fraudulent === null)
                    <tr>
                @else
                    <tr class="table-danger">
                        @endif
                        <th scope="row">{{$transaction->type}}</th>
                        <td>{{$transaction->value}}</td>
                        <td>{{$transaction->created_at}}</td>
                        <td>
                            <form method="post"
                                  action="{{route('transactions.destroy', $transaction)}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary">delete</button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{route('transactions.fraudulent', $transaction)}}">
                                @csrf
                                @method('post')
                                @if($transaction->fraudulent === null)
                                    <input type="checkbox" onchange="submit()">
                                @else
                                    <input type="checkbox" onchange="submit()" checked>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</x-loggedin>
