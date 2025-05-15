<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel-Paypal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-...=" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 text-center">
        <h2>Laravel-Paypal</h2>

        <!-- Products Table -->
        <div class="mt-4">
            <h4>Products</h4>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Currency</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td>${{ number_format($product['price'], 2) }}</td>
                            <td>{{ $product['currency'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-end"><strong>Total</strong></td>
                        <td colspan="2">${{ number_format($total, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Payment Button -->
        <a class="btn btn-primary mt-3" href="{{ route('make.payment') }}">Pay ${{ number_format($total, 2) }} Via Paypal</a>
    </div>
</body>
</html>
