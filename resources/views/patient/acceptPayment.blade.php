@extends('layouts.dashboard.main')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="row justify-content-center" style="width: 100%;">
            <div class="col-md-6">
                <div class="card-box " style="width: 100%;">
                    <h4 class="card-title">Make Payment</h4>
                    <div class="alert alert-info" role="alert">
                        Please note: A charge of ten thousand naira will be deducted as a booking fee for your appointment.
                    </div>
                    <form id="paymentForm">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Email Address</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email-address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9">
                                <input class="form-control" type="number" id="amount" value="10000" hidden required >
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();

            // Getting data from local storage
            const formDataJSON = localStorage.getItem('appointmentData');
            const formData = JSON.parse(formDataJSON);
            const title = formData.title;
            const department = formData.department;
            const doctor = formData.doctor;
            const appointment_date = formData.appointment_date;
            const appointment_time = formData.appointment_time;

            let handler = PaystackPop.setup({
                key: '{{ env('PAYSTACK_PUBLIC_KEY') }}',
                email: document.getElementById("email-address").value,
                amount: document.getElementById("amount").value * 100,
                ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                metadata: {},
                onClose: function() {
                    console.log('Payment window closed.');
                },
                callback: function(response) {
                    if (response.status === 'success') {
                        // Redirect to payment success route with query parameters
                        const redirectUrl = "{{ route('payment.success') }}";
                        const queryParams =
                            `?title=${title}&department=${department}&doctor=${doctor}&appointment_date=${appointment_date}&appointment_time=${appointment_time}&amount_paid=${response.amount / 100}&currency=${response.currency}&reference=${response.reference}`;
                        window.location.href = redirectUrl + queryParams;
                    } else {
                        // Redirect to payment failure route
                        // You can handle payment failure here
                        console.log('Payment failed.');

                    }
                }
            });

            handler.openIframe();
        }
    </script>
@endsection
