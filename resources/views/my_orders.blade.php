@extends('header')

@section('content')


    <!DOCTYPE html>
    <html>

    <head>
        <title>My Orders - Bag Bliss</title>
    </head>

    <body class="bg-light" style="margin-top: 13%;">

        <div class="container mt-5">
            <h2 class="mb-4">My Orders</h2>

            @if ($orders->isEmpty())
                <div class="alert alert-info">No orders found.</div>
            @else
                @foreach ($orders as $order)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <strong>Order #{{ $order->id }}</strong>
                            <span
                                class="text-muted">({{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }})</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Image</th>
                                        <th>Qty</th>
                                        <th>Price (Rs.)</th>
                                        <th>Total (Rs.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems->where('order_id', $order->id) as $item)
                                        <tr>
                                            <td>{{ $item->product_name }}</td>
                                            <td>
                                                <img src="{{ asset('images/' . $item->product_image) }}" width="60">
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->price, 2) }}</td>
                                            <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-end fw-bold">
                                Total Amount:
                                Rs.{{ number_format($orderItems->where('order_id', $order->id)->first()->price * $orderItems->where('order_id', $order->id)->first()->quantity, 2) }}
                            </div>

                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </body>

    </html>
@endsection
