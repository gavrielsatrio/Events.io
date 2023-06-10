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

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid px-0 vh-100 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column overflow-auto" id="app">
                <div class="d-inline-flex align-items-center">
                    <a href="/home" class="me-3"><i class="bx bx-chevron-left fs-3 text-white btn-back"></i></a>
                    <h3 class="mb-0 text-header">Account</h3>
                </div>
                <div class="image d-flex flex-column justify-content-center align-items-center mt-5">
                    <div id="show_bg">
                    <!-- <img src="image/goyoonjung.png" alt="" height="100" width="100"> -->
                    </div>
                    <h3 class="name">{{ $user->getFullName() }}</h3>
                </div>
                <div class="d-flex flex-column mt-5">
                    <a href="/account/edit-profile" class="d-flex w-100 profile-link justify-content-between py-4 text-decoration-none border-bottom-link">
                        <span>Edit Profile</span>
                        <span>
                            <i class="bx bx-chevron-right fs-4 d-flex"></i>
                        </span>
                    </a>
                </div>
                <div class="d-flex flex-column">
                    <a href="/account/active-ticket" class="d-flex w-100 profile-link justify-content-between py-4 text-decoration-none border-bottom-link">
                        <span>Your Active Ticket</span>
                        <span>
                            <i class="bx bx-chevron-right fs-4 d-flex"></i>
                        </span>
                    </a>
                </div>
                <div class="d-flex flex-column">
                    <a href="/account/order-payment" class="d-flex w-100 profile-link justify-content-between py-4 text-decoration-none border-bottom-link">
                        <span>Your Order Payment</span>
                        <span>
                            <i class="bx bx-chevron-right fs-4 d-flex"></i>
                        </span>
                    </a>
                </div>
                <div class="d-flex flex-column">
                    <a href="/account/order-history" class="d-flex w-100 profile-link justify-content-between py-4 text-decoration-none border-bottom-link">
                        <span>Order History</span>
                        <span>
                            <i class="bx bx-chevron-right fs-4 d-flex"></i>
                        </span>
                    </a>
                </div>
                <div class="d-flex flex-column">
                    <a href="/sign-out" class="d-flex w-100 profile-link justify-content-between py-4 text-decoration-none border-bottom-link">
                        <span>Sign Out</span>
                        <span>
                            <i class="bx bx-chevron-right fs-4 d-flex"></i>
                        </span>
                    </a>
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