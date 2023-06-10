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
    <link rel="stylesheet" href="{{ asset('css/after_payment.css') }}">

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
                    <h3 class="mb-0 text-header">Payment Status</h3>
                </div>
                <div class="d-inline-flex justify-content-center mt-5">
                    <div class="alert-theme alert-success-theme">
                        <i class='bx bxs-info-circle alert-theme-icon'></i>
                        <span class="alert-theme-text">Your Payment is Successful</span>
                    </div>
                </div>
                <div class="d-inline-flex mt-5">
                    <div class="card w-100" id="after-payment-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center justify-content-end">
                                    <img src="{{ asset('images/stars.png') }}" alt="">
                                    <div class="vertical-line-dashed ms-3"></div>
                                </div>
                                <div class="col-8">
                                    <div class="w-100 p-2" id="qr-code-container">
                                    </div>
                                    {{-- <img src="{{ asset('images/qr-code.png') }}" alt="" class="w-100"> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex flex-column mt-5">
                    <div class="card d-flex mx-4" id="after-payment-card-detail">
                        <div class="card-body px-4">
                            <div class="d-flex justify-content-center position-relative">
                                <img src="{{ asset('images/'.$transaction->event->banner_path) }}" alt="" class="shadow-sm" id="after-payment-card-detail-img">
                                <div class="position-absolute w-100 h-100 top-0 left-0 rounded-5-px" style="background: linear-gradient(0deg, {{ $transaction->event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                            </div>
                            <table class="table table-borderless mt-4">
                                <tr>
                                    <td class="after-payment-card-detail-lbl-field">Order Number</td>
                                    <td>:</td>
                                    <td class="after-payment-card-detail-lbl-value">{{ $transaction->order_number }}</td>
                                </tr>
                                <tr>
                                    <td class="after-payment-card-detail-lbl-field">Event</td>
                                    <td>:</td>
                                    <td class="after-payment-card-detail-lbl-value">{{ $transaction->event->name }}</td>
                                </tr>
                                <tr>
                                    <td class="after-payment-card-detail-lbl-field">Artist</td>
                                    <td>:</td>
                                    <td class="after-payment-card-detail-lbl-value">{{ $transaction->event->artist }}</td>
                                </tr>
                                <tr>
                                    <td class="after-payment-card-detail-lbl-field">Date</td>
                                    <td>:</td>
                                    <td class="after-payment-card-detail-lbl-value">{{ $transaction->selected_date->format('l, d M Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="after-payment-card-detail-lbl-field">Section</td>
                                    <td>:</td>
                                    <td class="after-payment-card-detail-lbl-value">{{ $transaction->event_ticket_category->category }}</td>
                                </tr>
                                <tr>
                                    <td class="after-payment-card-detail-lbl-field">Quantity</td>
                                    <td>:</td>
                                    <td class="after-payment-card-detail-lbl-value">{{ $transaction->qty }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    const transaction = @json($transaction);

    const qrCodeContainer = document.querySelector("#qr-code-container");
    const qrCode = new QRCode(qrCodeContainer, transaction.order_number.toString());

</script>
</html>