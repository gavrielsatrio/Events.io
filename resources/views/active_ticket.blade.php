<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <link rel="stylesheet" href="{{ asset("css/active_ticket.css") }}">
    <link rel="stylesheet" href="{{ asset("css/global.css") }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid px-0 vh-100 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column overflow-auto" id="app">
                <div class="d-inline-flex">
                    <a href="/account" class="me-3"><i class="bx bx-chevron-left fs-3 text-white btn-back"></i></a>
                    <div class="ms-1">
                        <h3 class="mb-2 text-header">Active Ticket</h3>
                        <p class="mb-0 text-description">Your active tickets will be listed here</p>
                    </div>
                </div>
                <div class="d-inline-flex flex-column mt-3">
                    @foreach($transactions as $transaction)
                        <a class="d-inline-flex mt-2 home-card-container" href="view-ticket/{{ $transaction->id }}">
                            <div class="position-relative rounded-10-px home-card-shadow w-100">
                                <img src="{{ asset('images/'.$transaction->event->thumbnail_path) }}" alt="{{ $transaction->event->name }}" class="home-card-images-full rounded-10-px">
                                <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $transaction->event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>

                                <div class="position-absolute w-100 bottom-0 left-0 card-text p-3">
                                    <p class="mb-0 home-card-title">{{ $transaction->event->name }}</p>
                                    <p class="mb-2 home-card-artist">{{ $transaction->event->artist }}</p>
                                    <p class="mb-0 home-card-qty-and-date d-flex justify-content-between">
                                        <span><i class="fa fa-ticket me-2"></i>{{ $transaction->qty }} ticket(s)</span>
                                        <span><i class="bx bx-calendar me-2"></i>{{ $transaction->selected_date->format('d M Y') }}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
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
</html>