<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riepilogo ordine</title>
</head>
<body>
    <h1> Di seguito troverai il riepilogo del tuo ordine</h1>

    <p>{{$order->name_customer}}</p>
    <p>{{$order->address_customer}}</p>
    <p>{{$order->total_price}}</p>
    
</body>
</html>