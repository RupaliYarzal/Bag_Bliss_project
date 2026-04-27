@extends('header')

@section('content')
    <style>
        .main-content {
            margin-top: 11%;
        }

        .product-card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: #fff;
            display: flex;
            flex-direction: column;
            height: 100%;
            border-radius: 10px;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: scale(1.02);
        }

        .fruite-img {
            height: 250px;
            overflow: hidden;
        }

        .fruite-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .p-4 {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .stock-message {
            font-size: 14px;
            margin-top: 5px;
        }

        .blinking {
            animation: blink 1s infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }
    </style>

    <div class="main-content">
        <div class="container mt-5">
            <h4 class="mb-4 text-center">Search Results for "{{ $query }}"</h4>

            @if ($products->isEmpty())
                <p class="text-center">No products found.</p>
            @else
                <div class="row g-4 justify-content-center">
                    @foreach ($products as $p)
                        <div class="col-md-6 col-lg-4 col-xl-3 d-flex">
                            <div class="product-card w-100">

                                <!-- Product Image -->
                                <div class="fruite-img">
                                    <a href="/shop-detail/{{ $p->id }}">
                                        <img src="{{ asset('images/' . $p->pimage) }}" alt="">
                                    </a>
                                </div>

                                <!-- Product Details -->
                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                    <h4 class="text-center" style="font-size: 18px; font-weight: bold; color: #32f2d5;">
                                        {{ $p->pname }}
                                    </h4>

                                    <p class="text-center text-dark fs-5 fw-bold mb-0">Rs.{{ $p->price }}</p>

                                    @php
                                        $qty = $p->stock->qty ?? 0;
                                    @endphp

                                    <div class="text-center stock-message">
                                        @if ($qty > 0)
                                            @if ($qty < 5)
                                                <p class="text-danger blinking">Only {{ $qty }} left in stock!</p>
                                            @else
                                                <p class="text-success">In stock: {{ $qty }}</p>
                                            @endif

                                            <form action="/cart/{{ $p->id }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-outline-primary rounded-pill px-4 py-2 mt-2">
                                                    <i class="fa fa-shopping-bag me-2"></i> Add to cart
                                                </button>
                                            </form>
                                        @else
                                            <button class="btn rounded-pill px-4 py-2 mt-4"
                                                style="background-color: rgb(241, 182, 192); color: white;">
                                                Out of Stock
                                            </button>
                                        @endif
                                    </div>

                                    {{-- QR Code --}}
                                    <div class="text-center mt-3">
                                        {!! QrCode::size(100)->generate(url('shop-detail/' . str_replace(' ', '-', $p->pname))) !!}
                                        <p class="mt-1" style="font-size: 12px;">Scan to view product</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
