<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Events.io</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid vh-100 px-0 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex position-relative flex-column overflow-auto" id="app">
                <div class="d-inline-flex align-items-center">
                    <a href="/home" class="me-3"><i class="bx bx-chevron-left fs-3 text-white btn-back"></i></a>
                    <h3 class="mb-0 text-header">Payment Details</h3>
                </div>
                <div class="d-inline-flex flex-column justify-content-center mt-5">
                    <h3 class="mb-0 text-description fw-light text-center">Remaining time to finish your payment</h3>
                    <div class="d-flex flex-row justify-content-center mt-3">
                        <div class="d-flex align-items-center justify-content-center time-text time-text-hour">0</div>
                        <div class="d-flex align-items-center justify-content-center time-text time-text-hour">0</div>
                        <div class="d-flex align-items-center justify-content-center time-colon">:</div>
                        <div class="d-flex align-items-center justify-content-center time-text time-text-minute">0</div>
                        <div class="d-flex align-items-center justify-content-center time-text time-text-minute">0</div>
                        <div class="d-flex align-items-center justify-content-center time-colon">:</div>
                        <div class="d-flex align-items-center justify-content-center time-text time-text-second">0</div>
                        <div class="d-flex align-items-center justify-content-center time-text time-text-second">0</div>
                    </div>
                </div>
                <div class="d-inline-flex flex-column mt-3">
                    <h6 class="mb-0 fw-bold text-subheader">Payment Method</h6>
                    <div class="d-flex mt-3 overflow-auto" id="payment-method-container">
                        <div class="payment-method" name="BCA">
                            <img src="{{ asset('images/bca.jpg') }}" alt="" class="payment-method-images" name="BCA">
                        </div>
                        <div class="payment-method" name="Mandiri">
                            <img src="{{ asset('images/mandiri.png') }}" alt="" class="payment-method-images" name="Mandiri">
                        </div>
                        <div class="payment-method" name="BRI">
                            <img src="{{ asset('images/bri.png') }}" alt="" class="payment-method-images" name="BRI">
                        </div>
                        <div class="payment-method" name="GoPay">
                            <img src="{{ asset('images/gopay.png') }}" alt="" class="payment-method-images" name="GoPay">
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex flex-column mt-3">
                    <h6 class="mb-0 fw-bold text-subheader mb-2">Promo Code</h6>
                    <form action="/payment/{{ $transaction->id }}/apply-promo" method="POST">
                        @csrf
                        <div class="row d-flex align-items-center">
                            <div class="col">
                                <input type="text" class="form-control text-uppercase" name="code" autocomplete="off" value="{{ (session()->get('message') != null ? (session()->get('message') == "Promo successfully applied" ? session()->get('promo')->code : "") : "") }}">
                            </div>
                            <div class="col">
                                <button class="btn-pink">Apply Promo</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-inline-flex text-muted mt-2" id="lbl-status">
                    @if(session()->get('message') != null)
                        {{ session()->get('message') }}

                        {{-- @if(session->get('message') == "Promo successfully applied")

                        @endif --}}
                    @endif
                </div>
                <div class="d-inline-flex flex-column mt-5">
                    <h5 class="text-center">Your Ticket Receipt</h5>
                    <div class="card d-flex mx-4" id="payment-card">
                        <div class="card-body px-4">
                            <div class="position-relative shadow-sm">
                                <img src="{{ asset("images/".$transaction->event->banner_path) }}" alt="" class="w-100" id="payment-card-img">
                                <div class="position-absolute w-100 h-100 top-0 left-0 rounded-5-px" style="background: linear-gradient(0deg, {{ $transaction->event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                            </div>
                            <table class="table table-borderless mt-4">
                                <tr>
                                    <td class="payment-card-lbl-field">Order Number</td>
                                    <td class="text-end payment-card-lbl-value">{{ $transaction->order_number }}</td>
                                </tr>
                                <tr>
                                    <td class="payment-card-lbl-field">Event</td>
                                    <td class="text-end payment-card-lbl-value">{{ $transaction->event->name }}</td>
                                </tr>
                                <tr>
                                    <td class="payment-card-lbl-field">Artist</td>
                                    <td class="text-end payment-card-lbl-value">{{ $transaction->event->artist }}</td>
                                </tr>
                                <tr>
                                    <td class="payment-card-lbl-field">Date</td>
                                    <td class="text-end payment-card-lbl-value">{{ $transaction->selected_date->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="payment-card-lbl-field">Qty</td>
                                    <td class="text-end payment-card-lbl-value">{{ $transaction->qty }} ticket(s)</td>
                                </tr>
                                <tr>
                                    <td class="payment-card-lbl-field">Price</td>
                                    <td class="text-end payment-card-lbl-value">IDR {{ str_replace(',', '.', number_format($transaction->event_ticket_category->price * $transaction->qty, 0)) }}</td>
                                </tr>
                                <tr>
                                    <td class="payment-card-lbl-field">Service Tax (3%)</td>
                                    <td class="text-end payment-card-lbl-value">IDR {{ str_replace(',', '.', number_format(($transaction->event_ticket_category->price * $transaction->qty) * 0.03, 0)) }}</td>
                                </tr>
                                <tr>
                                    <td class="payment-card-lbl-field">Promo Discount</td>
                                    <td class="text-end payment-card-lbl-value">IDR 
                                        @if(session()->get('message') != null)
                                            @if(session()->get('message') == "Promo successfully applied")
                                                {{ str_replace(',', '.', number_format($transaction->event_ticket_category->price * $transaction->qty * session()->get('promo')->discount_percentage / 100, 0)) }}
                                            @else
                                                0
                                            @endif
                                        @else
                                            0
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <div class="horizontal-line-dashed position-relative" id="payment-card-divider"></div>
                            <div class="d-flex align-items-center px-2 mt-3 pb-3">
                                <div class="d-flex flex-column flex-grow-1">
                                    <p class="text-primary-theme payment-card-lbl-field mb-0">You have to Pay</p>
                                    <p class="text-primary-theme mb-0">
                                        <span id="payment-card-lbl-price">
                                            @if(session()->get('message') != null)
                                                @if(session()->get('message') == "Promo successfully applied")
                                                    {{ str_replace(',', '.', number_format(($transaction->event_ticket_category->price * $transaction->qty) + ($transaction->event_ticket_category->price * $transaction->qty * 0.03) - ($transaction->event_ticket_category->price * $transaction->qty * session()->get('promo')->discount_percentage / 100), 0)) }}
                                                @else
                                                    {{ str_replace(',', '.', number_format(($transaction->event_ticket_category->price * $transaction->qty) + ($transaction->event_ticket_category->price * $transaction->qty * 0.03), 0)) }}
                                                @endif
                                            @else
                                                {{ str_replace(',', '.', number_format(($transaction->event_ticket_category->price * $transaction->qty) + ($transaction->event_ticket_category->price * $transaction->qty * 0.03), 0)) }}
                                            @endif
                                        </span>
                                        <span id="payment-card-lbl-price-cents">,00</span>
                                        <span id="payment-card-lbl-currency" class="payment-card-lbl-field ms-1">IDR</span>
                                    </p>
                                </div>
                                <div class="d-flex">
                                    <i class="bx bx-receipt text-primary-theme fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex mt-4">
                    <form action="/payment/{{ $transaction->id }}/pay" method="POST" id="form-payment">
                        @csrf
                        <input type="text" class="d-none" name="payment_method" id="form-txt-payment-method" value="">
                        <input type="text" class="d-none" name="promo_id" id="form-txt-promo-id" value="{{ (session()->get('message') != null ? (session()->get('message') == "Promo successfully applied" ? session()->get('promo')->id : "NULL") : "NULL") }}">
                    </form>
                    <button class="btn-pink" id="btn-pay-now">Pay Now</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script> --}}
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.7/dayjs.min.js"></script>
<script>

    const transaction = @json($transaction);
    
    const paymentMethods = document.querySelectorAll(".payment-method");

    let dateNow = dayjs();
    const startPayDate = dayjs(transaction.start_pay_date.replace("Z", "+07:00"));
    const deadlinePayDate = startPayDate.add(1, 'day');

    const timeTextRemainingTimeHour = document.querySelectorAll(".time-text-hour");
    const timeTextRemainingTimeMinute = document.querySelectorAll(".time-text-minute");
    const timeTextRemainingTimeSecond = document.querySelectorAll(".time-text-second");

    const formPayment = document.querySelector("#form-payment");
    const formTxtPaymentMethod = document.querySelector("#form-txt-payment-method");
    const btnPayNow = document.querySelector("#btn-pay-now");

    const showDeadline = () =>
    {
        dateNow = dayjs();

        let remainingTimeTotalSecond = deadlinePayDate.diff(dateNow, 'second');
        let remainingTimeHour = Math.floor(remainingTimeTotalSecond / 3600).toString().padStart(2, "0");
        let remainingTimeMinute = Math.floor((remainingTimeTotalSecond - (remainingTimeHour * 3600)) / 60).toString().padStart(2, "0");
        let remainingTimeSecond = (remainingTimeTotalSecond - (remainingTimeHour * 3600) - (remainingTimeMinute * 60)).toString().padStart(2, "0");

        timeTextRemainingTimeHour[0].innerHTML = remainingTimeHour[0];
        timeTextRemainingTimeHour[1].innerHTML = remainingTimeHour[1];

        timeTextRemainingTimeMinute[0].innerHTML = remainingTimeMinute[0];
        timeTextRemainingTimeMinute[1].innerHTML = remainingTimeMinute[1];

        timeTextRemainingTimeSecond[0].innerHTML = remainingTimeSecond[0];
        timeTextRemainingTimeSecond[1].innerHTML = remainingTimeSecond[1];
    };

    paymentMethods.forEach((item) =>
    {
        item.addEventListener("click", () =>
        {
            paymentMethods.forEach((x) =>
            {
                x.classList.remove('payment-method-selected');
            });

            item.classList.add('payment-method-selected');
            formTxtPaymentMethod.value = item.getAttribute('name');
        });
    });

    btnPayNow.addEventListener("click", () =>
    {
        if(formTxtPaymentMethod.value == "")
        {
            alert("Choose your payment method");
            return;
        }

        formPayment.submit();
    });

    showDeadline();

    const timerFinishPayment = setInterval(showDeadline, 1000);

</script>
</html>