@extends('header')
@section('content')
    <style>
        .blinking {
            animation: blink 1s infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        .fruite-item {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: #fff;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            transition: all 0.3s;
            height: 100%;
        }

        .fruite-item:hover {
            transform: scale(1.02);
        }

        .fruite-img img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            transition: transform 0.3s;
        }

        .fruite-item:hover .fruite-img img {
            transform: scale(1.05);
        }

        .p-4 {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .add-cart-btn {
            width: 100%;
            padding: 6px 12px;
            font-size: 14px;
            margin-top: 8px;
            border-radius: 50px;
        }

        .out-of-stock-btn {
            width: 100%;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: bold;
            background-color: pink;
            color: black;
            border-radius: 50px;
            margin-top: 8px;
        }

        .category-box {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .bag-category a:hover {
            text-decoration: underline;
            color: #13fb88;
        }

        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination .page-link {
            border-radius: 50px;
            color: #0ccf53;
            border: 1px solid #ddd;
            padding: 8px 15px;
            transition: all 0.3s;
        }

        .pagination .page-link:hover {
            background-color: #0ccf53;
            color: #fff;
        }

        .pagination .active .page-link {
            background-color: #216c3d;
            color: white;
            border-color: #0ccf53;
        }

        .pagination-info,
        .small.text-muted {
            display: none !important;
        }
    </style>

    {{-- Session Alerts --}}
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if (session('info'))
        <script>
            alert("{{ session('info') }}");
        </script>
    @endif

    <!-- Page Header -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>

    <!-- Shop Section -->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="row g-4">
                <!-- Category Sidebar -->
                <div class="col-lg-3">
                    <div class="category-box">
                        <h4>Categories</h4>
                        <ul class="list-unstyled bag-category mt-3">
                            @foreach ($category as $c)
                                <li style="padding: 10px 0; border-bottom: 1px solid #eee;">
                                    <a href="{{ url('catg_product/' . str_replace(' ', '-', $c->cname)) }}">
                                        <i class="fas fa-shopping-bag me-2" style="color: #f7fb13;"></i>
                                        {{ $c->cname }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <!-- Products -->
                <div class="col-lg-9">
                    <div class="row g-4 justify-content-center">
                        @foreach ($product as $p)
                            <div class="col-md-6 col-lg-4 d-flex">
                                <div class="fruite-item w-100">
                                    <div class="fruite-img">

                                        <a href="{{ url('shop-detail/' . str_replace(' ', '-', $p->pname)) }}">
                                            <img src="{{ asset('images/' . $p->pimage) }}" alt="Product Image">
                                        </a>

                                    </div>

                                    <div class="p-4 border border-secondary border-top-0">
                                        <h4 class="text-center text-primary" style="font-size: 18px; font-weight: bold;">
                                            {{ $p->pname }}</h4>
                                        <p class="text-center text-dark fs-5 fw-bold mb-0">Rs. {{ $p->price }}</p>

                                        {{-- to check qty in stock availability --}}
                                        @php
                                            $qty = 0;
                                            if (!empty($p->stock)) {
                                                $qty = $p->stock->qty;
                                            }
                                        @endphp
                                        <div class="text-center mt-2 stock-info">
                                            @if ($qty > 0)
                                                @if ($qty < 5)
                                                    <p class="text-danger blinking">Only {{ $qty }} left in stock!
                                                    </p>
                                                @else
                                                    {{-- <p class="text-success">In stock: {{ $qty }}</p> --}}
                                                @endif


                                                <form action="{{ url('/cart/' . str_replace(' ', '-', $p->pname)) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn border border-secondary add-cart-btn text-primary">
                                                        <i class="fa fa-shopping-bag me-2"></i> Add to cart
                                                    </button>
                                                </form>
                                            @else
                                                <button class="btn out-of-stock-btn" disabled>Out of Stock</button>
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

                        <!-- Pagination -->
                        <div class="col-12">
                            <div class="pagination d-flex justify-content-center mt-5">
                                {{ $product->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
