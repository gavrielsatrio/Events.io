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
    <link rel="stylesheet" href="{{ asset('css/eo_events.css') }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid vh-100 px-0 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column overflow-auto" id="app">
                <div class="d-inline-flex flex-column no-scrollbars app-content flex-grow-1">
                    <div class="d-inline-flex flex-column">
                        <h3 class="mb-2 text-header">All Events</h3>
                        <p class="mb-0 text-description">See all events that you organized</p>
                    </div>
                    <div class="d-inline-flex flex-column mt-4">
                        @foreach($events as $event)
                            <div class="d-inline-flex mb-4 event-card-container">
                                <div class="position-relative rounded-10-px event-card-shadow w-100">
                                    <img src="{{ asset('images/'.$event->thumbnail_path) }}" alt="{{ $event->name }}" class="event-card-images-full rounded-10-px">
                                    <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>

                                    <div class="position-absolute w-100 bottom-0 left-0 card-text p-3 event-description">
                                        
                                        <p class="mb-0 event-card-title">{{ $event->name }}</p>
                                        <p class="mb-0 d-flex justify-content-between">
                                            <span class="d-inline-flex event-card-artist">{{ $event->artist }}</span>
                                            <span class="d-inline-flex event-card-people-count align-items-center justify-content-center">{{ count($event->transactions) }}<i class="bx bx-user ms-2 events-people-count-icon"></i></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-inline-flex justify-content-around bottom-nav">
                    <a href="/eo-home" class="bottom-nav-icons text-decoration-none">
                        <i class="bx bxs-home fs-3"></i>
                    </a>
                    <a href="/eo-calendar" class="bottom-nav-icons text-decoration-none">
                        <i class="bx bx-calendar fs-3"></i>
                    </a>
                    <a href="/eo-events" class="bottom-nav-icons bottom-nav-icons-selected text-decoration-none">
                        <i class="bx bx-party fs-3"></i>
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