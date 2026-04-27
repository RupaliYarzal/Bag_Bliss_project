@extends('header')

@section('content')
    <style>
        .about-section {
            margin-top: 140px;
            padding: 50px 20px;
            border-radius: 15px;
        }

        .about-section h1,
        .about-section h3,
        .about-section h4 {
            color: #2c3e50;
        }

        .about-section h1 {
            color: #4ac546f0;
            font-weight: bold;
        }

        .about-section ul {
            list-style: none;
            padding-left: 0;
        }

        .about-section ul li {
            margin-bottom: 12px;
            padding-left: 25px;
            position: relative;
        }

        .about-section ul li::before {
            content: "✔";
            color: #2196f3;
            position: absolute;
            left: 0;
        }
    </style>

    <div class="container about-section">
        <h1 class="text-center mb-4">About Bag Bliss</h1>
        <p class="lead text-center mb-5">
            Welcome to <strong>Bag Bliss</strong> – your go-to place for fashionable, functional, and affordable bags.
        </p>

        <div class="row">
            <div class="col-md-8">
                <h3>Our Story</h3>
                <p>
                    Bag Bliss started with a simple idea — to make stylish, high-quality bags accessible to everyone. From a small local boutique to a nationwide favorite, we’ve always believed in empowering people through fashion.
                </p>
                <p>
                    Our bags are thoughtfully curated to match your lifestyle, whether it's for work, travel, or casual outings.
                </p>
            </div>

            <div class="col-md-4">
                <h3>What We Offer</h3>
                <ul>
                    <li>Stylish handbags, crossbody bags, clutches</li>
                    <li>Backpacks for daily use and travel</li>
                    <li>Affordable prices with premium quality</li>
                    <li>Fast delivery and easy returns</li>
                </ul>
            </div>
        </div>

        <div class="mt-5 text-center">
            <h3>Why Choose Us?</h3>
            <p class="mt-3">
                At Bag Bliss, we combine fashion and function. Every product is designed with care, keeping your comfort, style, and needs in mind. Whether you're heading to work, a weekend trip, or a casual day out — we’ve got the perfect bag for you.
            </p>
        </div>

        <div class="text-center mt-5">
            <h4>Stay Connected</h4>
            <p>
                Follow us on social media or drop us a message anytime — we're here for you!
            </p>
        </div>
    </div>
@endsection
