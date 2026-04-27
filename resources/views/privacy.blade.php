@extends('header')

@section('content')
    <style>
        .privacy-wrapper {
            margin-top: 170px;
        }

        .privacy-section {
            border-radius: 15px;
            color: #2c3e50;
        }

        .privacy-section h1 {
            color: #2e7d32; /* Dark green */
            font-weight: bold;
            margin-bottom: 30px;
        }

        .privacy-section h3 {
            color: #388e3c;
            margin-top: 30px;
        }

        .privacy-section p {
            margin-bottom: 15px;
            line-height: 1.7;
        }

        .privacy-section ul {
            padding-left: 20px;
            text-align: left;
        }

        .privacy-section ul li::marker {
            color: #43a047;
        }

        .privacy-section a {
            color: #2e7d32;
            text-decoration: underline;
        }
    </style>

    <div class="container privacy-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-8 privacy-section text-center">
                <h1>Privacy Policy</h1>

                <p>
                    At <strong>Bag Bliss</strong>, we value your privacy and are committed to protecting your personal information.
                    This Privacy Policy explains how we collect, use, and safeguard your data when you visit or make a purchase from
                    our website.
                </p>

                <h3>1. Information We Collect</h3>
                <p>We may collect the following types of information:</p>
                <div class="d-flex justify-content-center">
                    <ul class="w-45">
                        <li>Name, email address, phone number</li>
                        <li>Shipping and billing address</li>
                        <li>Payment information (secured and encrypted)</li>
                        <li>Device information, IP address, and browser details</li>
                    </ul>
                </div>

                <h3>2. How We Use Your Information</h3>
                <p>Your data helps us:</p>
                <div class="d-flex justify-content-center">
                    <ul class="w-45">
                        <li>Process and deliver your orders</li>
                        <li>Send order updates and promotional offers</li>
                        <li>Improve our website and customer service</li>
                        <li>Prevent fraud and ensure data security</li>
                    </ul>
                </div>

                <h3>3. Sharing Your Information</h3>
                <p>
                    We do not sell your personal data. We may share information with third parties only to the extent necessary to
                    provide services (e.g., shipping, payment gateways).
                </p>

                <h3>4. Data Protection</h3>
                <p>
                    We use secure servers, SSL encryption, and strict access control to protect your data.
                </p>

                <h3>5. Your Rights</h3>
                <p>
                    You have the right to access, correct, or delete your personal information. To make any request, please contact
                    us at: <a href="mailto:support@bagbliss.com">support@bagbliss.com</a>.
                </p>

                <h3>6. Updates to This Policy</h3>
                <p>
                    This Privacy Policy may be updated periodically. We encourage you to review it regularly.
                </p>

                <h3>7. Contact Us</h3>
                <p>
                    If you have any questions about this Privacy Policy, please reach out to our support team at:
                    <a href="mailto:support@bagbliss.com">support@bagbliss.com</a>.
                </p>
            </div>
        </div>
    </div>
@endsection
