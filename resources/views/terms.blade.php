@extends('header')

@section('content')
    <style>
        .terms-wrapper {
            margin-top: 170px;
        }

        .terms-section {
            border-radius: 15px;
            color: #2c3e50;
        }

        .terms-section h1 {
            color: #2e7d32;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .terms-section h3 {
            color: #388e3c;
            margin-top: 30px;
        }

        .terms-section p {
            margin-bottom: 15px;
            line-height: 1.7;
        }

        .terms-section ul {
            padding-left: 20px;
            text-align: left;
        }

        .terms-section ul li::marker {
            color: #43a047;
        }

        .terms-section a {
            color: #2e7d32;
            text-decoration: underline;
        }
    </style>

    <div class="container terms-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-8 terms-section text-center">
                <h1>Terms and Conditions</h1>

                <p>Welcome to <strong>Bag Bliss</strong>. By accessing or using our website, you agree to the following
                    Terms and Conditions. Please read them carefully.</p>

                <h3>1. Acceptance of Terms</h3>
                <p>
                    By using our services, you confirm that you accept these terms and agree to comply with them. If you do
                    not agree, you must not use our site.
                </p>

                <h3>2. Use of Website</h3>
                <p>
                    You agree to use the site for lawful purposes only. You must not misuse the website or interfere with
                    its proper functioning.
                </p>

                <h3>3. Product Information</h3>
                <p>
                    We make every effort to display our products accurately. However, we do not guarantee that descriptions,
                    colors, or other details are always error-free.
                </p>

                <h3>4. Pricing & Payments</h3>
                <p>
                    All prices are listed in INR and are subject to change without notice. Payment must be made at the time
                    of order through our secure payment gateways.
                </p>

                <h3>5. Shipping & Returns</h3>
                <p>
                    Shipping times may vary. You can find detailed information on our <a href="/shipping">Shipping</a> and <a
                        href="/returns">Return Policy</a> pages.
                </p>

                <h3>6. Intellectual Property</h3>
                <p>
                    All content, logos, images, and text are the property of Bag Bliss and protected by copyright laws. You
                    may not copy or use any part without permission.
                </p>

                <h3>7. Limitation of Liability</h3>
                <p>
                    Bag Bliss is not liable for any damages arising from the use or inability to use our website, including
                    indirect or consequential losses.
                </p>

                <h3>8. Changes to Terms</h3>
                <p>
                    We reserve the right to update or change these terms at any time. Continued use of the site means you
                    accept the new terms.
                </p>

                <h3>9. Contact Us</h3>
                <p>
                    If you have any questions about these Terms and Conditions, please contact us at
                    <a href="mailto:support@bagbliss.com">support@bagbliss.com</a>.
                </p>
            </div>
        </div>
    </div>
@endsection
