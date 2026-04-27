@extends('admin/header')

@section('content')
    <style>
        /* Container */
        .container {
            background: #fdf9ff;
            border-radius: 12px;
            padding: 20px;
        }

        /* Headings */
        h3 {
            color: #8d49be;
            /* deep purple */
            font-weight: bold;
        }

        p strong {
            color: #6a0dad;
        }

        /* Table Styling */
        table {
            border: 2px solid #9147c6;
            border-radius: 10px;
            overflow: hidden;
        }

        table thead {
            background-color: #9147c6;
            color: white;
        }

        table tbody tr:hover {
            background-color: #f3e5f5;
        }

        table th,
        table td {
            vertical-align: middle;
            text-align: center;
        }

        /* Buttons */
        .btn-secondary {
            background-color: #6a0dad;
            border-color: #6a0dad;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #4b0a9f;
            border-color: #4b0a9f;
        }
    </style>

    <div class="container mb-3">
        @if ($orders->isEmpty())
            <p>No orders found for this user.</p>
        @else
            {{-- Customer Info from the first order --}}
            @php
                $customer = $orders->first();
            @endphp

            <h3 style="margin-bottom: 20px;">Orders for {{ $customer->first_name }} {{ $customer->last_name }}</h3>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Address:</strong> {{ $customer->address }}, {{ $customer->city }}</p>

            <!-- Download as PDF Button -->
            <a href="{{ route('orders.pdf', $customer->email) }}" class="btn btn-purple"
                style="background-color: purple; color: white; padding: 8px 12px; border-radius: 5px;">
                Download as PDF
            </a>


            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price (Rs.)</th>
                        <th>Total (Rs.)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                            <td>{{ $order->product_name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ number_format($order->price, 2) }}</td>
                            <td>{{ number_format($order->price * $order->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ url('/users') }}" class="btn btn-secondary mt-3">Back to Users</a>
    </div>
@endsection
