<!DOCTYPE html>
<html>
<head>
    <title>User Orders - Bag Bliss</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }
        h1, h2 {
            color: purple;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #f0e6ff;
        }
        tfoot td {
            font-weight: bold;
            background: #f9f0ff;
        }
    </style>
</head>
<body>

    <h1>Bag Bliss</h1>
    <h2>Orders Invoice</h2>

    <p><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Address:</strong> {{ $user->address }}, {{ $user->city }}</p>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Price (Rs.)</th>
                <th>Total (Rs.)</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($orderDetails as $item)
                @php
                    $total = $item->price * $item->quantity;
                    $grandTotal += $total;
                @endphp
                <tr>
                    <td>{{ $item->order_id }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>{{ number_format($total, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align:right;">Grand Total:</td>
                <td colspan="2">{{ number_format($grandTotal, 2) }}</td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
