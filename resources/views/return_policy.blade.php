@extends('header')

@section('content')
    <style>
        .return-wrapper {
            margin-top: 170px;
        }

        .return-section {
            border-radius: 15px;
            color: #2c3e50;
        }

        .return-section h1 {
            color: #2e7d32;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .return-section h3 {
            color: #388e3c;
            margin-top: 30px;
        }

        .return-section p {
            margin-bottom: 15px;
            line-height: 1.7;
        }

        .return-section ul {
            padding-left: 20px;
            text-align: left;
        }

        .return-section ul li::marker {
            color: #43a047;
        }

        .return-section a {
            color: #2e7d32;
            text-decoration: underline;
        }
    </style>

    <div class="container return-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-8 return-section text-center">
                <h1>Return & Refund Policy</h1>

                <p>
                    At <strong>Bag Bliss</strong>, your satisfaction is our priority. If you're not happy with your
                    purchase, we’re here to help.
                </p>

                <h3>1. Return Eligibility</h3>
                <p>You can return items within <strong>7 days</strong> of receiving your order if:</p>
                <ul class="w-75 mx-auto">
                    <li>The product is unused and in original condition</li>
                    <li>It includes all tags, packaging, and accessories</li>
                    <li>You have proof of purchase (invoice/order ID)</li>
                </ul>

                <h3>2. Non-Returnable Items</h3>
                <ul class="w-75 mx-auto">
                    <li>Used, damaged, or washed items</li>
                    <li>Custom-made or personalized products</li>
                    <li>Items returned after the return window</li>
                </ul>

                <h3>3. How to Request a Return</h3>
                <p>
                    To initiate a return, email us at <a href="mailto:support@bagbliss.com">support@bagbliss.com</a> with
                    your order ID and reason for return.
                    Our team will review and share the return instructions.
                </p>

                <h3>4. Refund Process</h3>
                <ul class="w-75 mx-auto">
                    <li>Refunds are processed within 7–10 business days after inspection</li>
                    <li>Amount will be refunded to your original payment method</li>
                    <li>Shipping charges (if any) are non-refundable</li>
                </ul>

                <h3>5. Exchange Policy</h3>
                <p>
                    We currently do not offer direct exchanges. Please return the item and place a new order.
                </p>

                <h3>6. Contact Us</h3>
                <p>
                    If you have any questions about returns or refunds, contact our support team at:
                    <a href="mailto:support@bagbliss.com">support@bagbliss.com</a>
                </p>
            </div>
        </div>
    </div>
@endsection
