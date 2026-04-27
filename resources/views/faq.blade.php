@extends('header')

@section('content')
    <style>
        .faq-wrapper {
            margin-top: 170px;
        }

        .faq-section h1 {
            color: #2e7d32;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .accordion-button {
            background-color: #e8f5e9;
            color: #2e7d32;
            font-weight: 500;
        }

        .accordion-button:not(.collapsed) {
            color: white;
            background-color: #2e7d32;
        }

        .accordion-body {
            background-color: #f7f9fc;
            color: #2c3e50;
        }
    </style>

    <div class="container faq-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-10 faq-section text-center">
                <h1>Frequently Asked Questions</h1>

                <div class="accordion" id="faqAccordion">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#a1"
                                aria-expanded="true" aria-controls="a1">
                                1. How do I place an order?
                            </button>
                        </h2>
                        <div id="a1" class="accordion-collapse collapse show" aria-labelledby="q1"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Simply browse our collection, add your favorite items to the cart, and proceed to checkout.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#a2" aria-expanded="false" aria-controls="a2">
                                2. What payment methods do you accept?
                            </button>
                        </h2>
                        <div id="a2" class="accordion-collapse collapse" aria-labelledby="q2"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We accept all major credit/debit cards, UPI, net banking, and wallet payments through secure
                                gateways.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#a3" aria-expanded="false" aria-controls="a3">
                                3. How long does delivery take?
                            </button>
                        </h2>
                        <div id="a3" class="accordion-collapse collapse" aria-labelledby="q3"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Delivery usually takes 3–7 business days, depending on your location.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#a4" aria-expanded="false" aria-controls="a4">
                                4. Can I cancel or modify my order?
                            </button>
                        </h2>
                        <div id="a4" class="accordion-collapse collapse" aria-labelledby="q4"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Orders can be modified or cancelled within 2 hours of placing them. Please email us
                                immediately at support@bagbliss.com.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#a5" aria-expanded="false" aria-controls="a5">
                                5. What is your return policy?
                            </button>
                        </h2>
                        <div id="a5" class="accordion-collapse collapse" aria-labelledby="q5"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can return unused items within 7 days of delivery. Visit our <a
                                    href="/return-policy">Return Policy</a> page for full details.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#a6" aria-expanded="false" aria-controls="a6">
                                6. How do I contact customer support?
                            </button>
                        </h2>
                        <div id="a6" class="accordion-collapse collapse" aria-labelledby="q6"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can reach us at <a href="mailto:support@bagbliss.com">support@bagbliss.com</a>. We
                                respond within 24 hours.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
