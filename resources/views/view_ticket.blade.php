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
    <link rel="stylesheet" href="{{ asset('css/view_ticket.css') }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid vh-100 px-0 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex position-relative flex-column overflow-auto" id="app">
                <div class="d-inline-flex">
                    <a href="/account/active-ticket" class="me-3"><i class="bx bx-chevron-left fs-3 text-white btn-back"></i></a>
                    <div class="ms-1">
                        <h3 class="mb-2 text-header">Ticket</h3>
                        <p class="mb-0 text-description">Below are the details of your ticket</p>
                    </div>
                </div>
                <div class="d-inline-flex justify-content-center mt-5">
                    <div class="card d-flex mx-4 shadow-lg" id="ticket-card">
                        <div class="card-body px-4">
                            <div class="w-100 p-4 pb-5" id="qr-code-container"></div>
                            <div class="horizontal-line-dashed position-relative" id="ticket-card-divider"></div>

                            <div class="mt-3">
                                <p class="ticket-card-lbl-field">Order Number</p>
                                <p class="ticket-card-lbl-value">{{ $transaction->order_number }}</p>

                                <p class="ticket-card-lbl-field">Event</p>
                                <p class="ticket-card-lbl-value">{{ $transaction->event->name }}</p>

                                <p class="ticket-card-lbl-field">Artist</p>
                                <p class="ticket-card-lbl-value">{{ $transaction->event->artist }}</p>

                                <p class="ticket-card-lbl-field">Date</p>
                                <p class="ticket-card-lbl-value">{{ $transaction->selected_date->format('d F Y') }}</p>

                                <p class="ticket-card-lbl-field">Qty</p>
                                <p class="ticket-card-lbl-value">{{ $transaction->qty }} ticket(s)</p>
                            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>

    const transaction = @json($transaction);

    const qrCodeContainer = document.querySelector("#qr-code-container");
    const qrCode = new QRCode(qrCodeContainer, transaction.order_number.toString());

</script>
</html>