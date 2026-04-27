@extends('header')
@section('content')
    <div class="text-center mt-5">
        <h2>QR Code for {{ $product->pname }}</h2>
        {!! QrCode::size(250)->generate($url) !!}
        <p class="mt-3">Scan this QR to open product page:</p>
        <a href="{{ $url }}" class="btn btn-primary mt-2">Open Product</a>
    </div>
@endsection
