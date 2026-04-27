<!DOCTYPE html>
<html>

<head>
    <title>Invoice - Bag Bliss</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff;
            color: #333;
            padding: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: purple;
            margin-bottom: 0;
        }

        .invoice-info {
            margin-top: 10px;
            font-size: 14px;
            text-align: center;
            color: #555;
        }

        .customer-info {
            margin-top: 30px;
            font-size: 14px;
        }

        .customer-info p {
            margin: 4px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            font-size: 14px;
        }

        th,
        td {
            border: 1px solid #d1b3ff;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0e6ff;
            color: purple;
        }

        tfoot td {
            background-color: #f9f0ff;
            font-weight: bold;
            color: #4b0082;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logo img {
            height: 50px;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="logo">
            <img src="{{ public_path('images/logo1.jpg') }}" alt="Bag Bliss Logo">
            <h1>Bag Bliss</h1>
        </div>
        <div class="invoice-info">
            <strong>Invoice</strong><br>
            Date: {{ \Carbon\Carbon::now()->format('d-m-Y') }}
        </div>
    </div>

    <div class="customer-info">
        <p><strong>Customer Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Address:</strong> {{ $user->address }}, {{ $user->city }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Amount (Rs.)</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach ($orderDetails as $detail)
                @php
                    $itemTotal = $detail->price * $detail->quantity;
                    $grandTotal += $itemTotal;
                @endphp
                <tr>
                    <td>{{ $detail->order_id }}</td>
                    <td>{{ $detail->product_name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>Rs. {{ number_format($itemTotal, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($detail->created_at)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right;">Total:</td>
                <td colspan="2">Rs. {{ number_format($grandTotal, 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        Thank you for shopping with Bag Bliss!<br>
        Visit us at www.bagbliss.com | Contact: support@bagbliss.com
    </div>

</body>

</html>
