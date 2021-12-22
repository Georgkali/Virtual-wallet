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

</body>
</html>
