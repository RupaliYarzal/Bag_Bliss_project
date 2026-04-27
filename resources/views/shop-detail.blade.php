@extends('header')
@section('content')
{{-- If item added to cart or not --}}
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


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop Detail</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Shop Detail</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4">
            {{-- Left: Product Details --}}
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="{{ asset('images/' . $product->pimage) }}" class="img-fluid rounded"
                                    alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">{{ $product->pname }}</h4>
                        <h5 class="fw-bold mb-3">Rs.{{ $product->price }}</h5>
                        <p class="mb-4">{{ $product->desc }}</p>

                        {{-- Quantity Form --}}
                        <form action="/cart/{{ $product->id }}" method="POST" id="add-to-cart-form">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                        </form>

                        <!-- {{-- Stock Message --}}
                        {{-- @php $qty = $product->stock->qty ?? 0; @endphp --}}
                        {{-- @if ($qty > 0)
                                <p class="text-success">In stock: {{ $product->stock->quantity }}</p>
                        @else
                        <p class="text-danger">Out of Stock</p>
                        @endif --}} -->


                        @php
                        $qty = 0;
                        if (!empty($product->stock)) {
                        $qty = $product->stock->qty;
                        }
                        @endphp


                        {{-- Add to Cart Button --}}
                        @if ($qty > 0)
                        <form action="{{ url('/cart/' . str_replace(' ', '-', $product->pname)) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="btn border border-secondary rounded-pill px-4 py-2 text-primary">
                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                            </button>
                        </form>
                        @else
                        <div class="alert alert-danger mt-2 mb-0 py-1 px-2 rounded" style="font-size: 14px;">
                            This product is currently unavailable.
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Description and Reviews Tabs --}}
                <div class="mt-5">
                    <nav>
                        <div class="nav nav-tabs mb-3">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#nav-about">Description</button>
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-mission">Reviews</button>
                        </div>
                    </nav>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-about">
                            <p class="mb-2">The generated Lorem Ipsum is therefore always free from repetition
                                injected humour, or non-characteristic words etc.</p>
                            <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock
                                flounder; chain pickerel hatchetfish, pencilfish snailfish</p>
                        </div>
                        <div class="tab-pane fade" id="nav-mission">
                            <div class="d-flex">
                                <img src="{{ asset('frontend/img/avatar.jpg') }}" class="img-fluid rounded-circle p-3"
                                    style="width: 100px; height: 100px;" alt="">
                                <div>
                                    <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                    <h5>Jason Smith</h5>
                                    <div class="d-flex mb-3">
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>Sample review text.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Categories Sidebar --}}
            <div class="col-lg-4 col-xl-3">
                <div class="input-group mb-4">
                    <input type="search" class="form-control p-3" placeholder="keywords">
                    <span class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
                <div class="mb-4">
                    <h4>Categories</h4>
                    <ul class="list-unstyled bag-category">
                        @foreach ($category as $c)
                        <li style="padding: 10px 0; border-bottom: 1px solid #eee;">
                            <a href="{{ url('catg_product/' . str_replace(' ', '-', $c->cname)) }}">
                                <i class="fas fa-shopping-bag me-2" style="color: #f7fb13;"></i>{{ $c->cname }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>


</div>
</div>
<!-- Single Product End -->
@endsection