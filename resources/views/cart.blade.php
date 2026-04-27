    @extends('header')

    @section('content')
        <div class="container mt-4">
            @if (session('success') || session('error') || session('info'))
                <script>
                    @if (session('success'))
                        alert("{{ session('success') }}");
                    @endif

                    @if (session('error'))
                        alert("{{ session('error') }}");
                    @endif

                    @if (session('info'))
                        alert("{{ session('info') }}");
                    @endif
                </script>
            @endif
        </div>




        <!-- Page Header -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>

        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price (Rs.)</th>
                                <th>Quantity</th>
                                <th>Total (Rs.)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <pre>
                                {{ print_r(session('cart'), true) }}
                            </pre> --}}

                            @php $total = 0; @endphp
                            @foreach (session('cart', []) as $item)
                                @php
                                    $price = $item['price'];
                                    $itemTotal = $price * $item['quantity'];
                                    $total += $itemTotal;
                                @endphp
                                <tr>
                                    <td><img src="{{ asset('images/' . $item['pimage']) }}" style="width: 80px; height: 80px;"
                                            class="rounded-circle"></td>
                                    <td>{{ $item['pname'] }}</td>
                                    <td>Rs.{{ $item['price'] }}</td>

                                    <!-- Quantity Form -->
                                    <td>
                                        <form method="POST"
                                            action="{{ url('cart/update/' . str_replace(' ', '-', $item['pname'])) }}"
                                            class="d-flex align-items-center">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                                style="width: 60px;" class="form-control form-control-sm me-2">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Update</button>
                                        </form>
                                    </td>

                                    <td>Rs.{{ $itemTotal }}</td>
                                    <td>
                                        <form action="{{ url('/cart/remove/' . str_replace(' ', '-', $item['pname'])) }}"
                                            method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-danger">&times;</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Cart Summary -->
                <div class="row justify-content-end">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-light p-4 rounded">
                            <h4 class="mb-3">Cart Total</h4>
                            <p>Subtotal: Rs.{{ $total }}</p>

                            <hr>
                            <h5>Total: Rs.{{ $total }}</h5>

                            <!-- checkout btn -->
                            <a href="{{ url('/checkout') }}" class="btn btn-primary mt-3 w-100">Proceed to Checkout</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
