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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

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
                    <a href="/login" class="me-3"><i class="bx bx-chevron-left fs-3 text-white btn-back"></i></a>
                    <div class="ms-1">
                        <h3 class="mb-2 text-header">Forget Password</h3>
                        <p class="mb-0 text-description">We will send a new password to the email you give below</p>
                    </div>
                </div>

                @if(session()->get('status') != null)
                    @if(session()->get('status') != "success")
                        <div class="d-inline-flex justify-content-center mt-5">
                            <div class="alert-theme alert-danger-theme">
                                <i class='bx bxs-info-circle alert-theme-icon'></i>
                                <span class="alert-theme-text">{{ session()->get('message') }}</span>
                            </div>
                        </div>    
                    @else
                        <div class="d-inline-flex align-items-center justify-content-center flex-column flex-grow-1 mt-5 px-5">
                            <div class="d-inline-flex background-pink flex-column text-center justify-content-center align-items-center rounded-10-px p-4">
                                <i class="bx bx-lock-open fs-1"></i>
                                <h5 class="mt-4 fw-bold fs-5">{{ session()->get('header') }}</h5>
                                <p class="px-3 fw-light fs-6">{{ session()->get('description') }}</p>
                            </div>
                            <a class="btn-pink mt-4" href="/login">Back to Login</a>
                        </div>
                    @endif
                @endif

                <div class="d-inline-flex flex-column mt-5 {{ session()->get('status') != null ? (session()->get('status') == "success" ? "visually-hidden" : "") : "" }}">
                    <form action="/forget-password/send-email" method="POST">
                        @csrf
                        <label for="account_email" class="label-input">Account Email</label>
                        <input type="email" class="form-control input" name="account_email" placeholder="example@mail.com" id="account_email">

                        <label for="recovery_email" class="label-input mt-3">Recovery Email</label>
                        <input type="email" class="form-control input" name="recovery_email" placeholder="recovery@mail.com" id="recovery_email">

                        <button type="submit" class="btn-pink mt-4">Send Email</button>
                    </form>
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