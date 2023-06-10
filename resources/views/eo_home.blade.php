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
    <link rel="stylesheet" href="{{ asset('css/eo_home.css') }}">

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
                    <div class="d-inline-flex align-items-center justify-content-between">
                        <div class="d-inline-flex flex-column">
                            <h3 class="text-app-name">Events.io</h3>
                            <p class="mb-0 text-description">Your events partner</p>
                        </div>
                        <a class="bx bx-user fs-4" href="/eo-account" id="btn-profile"></a>
                    </div>
                    <div class="d-inline-flex flex-column mt-3">
                        <h6 class="mb-0 fw-bold text-subheader">Your Events</h6>
                        <div class="d-inline-flex mt-2 eo-home-card-container">
                            <a class="position-relative d-inline-flex align-items-center justify-content-center rounded-10-px eo-home-card-shadow me-4 text-decoration-none" href="/add-event-proposal" id="btn-add-event">
                                <i class="bx bx-plus text-white fs-3" id="btn-add-event-icon"></i>
                            </a>
                            @foreach($events as $event)
                                <a class="position-relative rounded-10-px eo-home-card-shadow me-4" href="/eo-event/{{ $event->id }}">
                                    <img src="{{ asset('images/'.$event->thumbnail_path) }}" alt="{{ $event->name }}" class="eo-home-card-images-small rounded-10-px">
                                    <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                    <p class="position-absolute mb-0 eo-home-card-title">{{ $event->name }}</p>
                                </a>
                            @endforeach
                            {{-- <a class="position-relative rounded-10-px eo-home-card-shadow" href="event">
                                <img src="{{ asset('images/blackpink-banner2.png') }}" alt="Blackpink" class="eo-home-card-images-small rounded-10-px">
                                <div class="position-absolute eo-home-card-gradient-cover-black w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 eo-home-card-title">Born Pink World Tour</p>
                            </a>
                            <a class="position-relative rounded-10-px eo-home-card-shadow ms-4" href="event">
                                <img src="{{ asset('images/love-on-tour.png') }}" alt="Harry Styles" class="eo-home-card-images-small rounded-10-px">
                                <div class="position-absolute eo-home-card-gradient-cover-black w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 eo-home-card-title">Love On Tour</p>
                            </a> --}}
                        </div>
                    </div>
                    <div class="d-inline-flex flex-column mt-3">
                        <h6 class="mb-0 fw-bold text-subheader">Ticket Sales Graph</h6>
                        <canvas class="mt-3 background-secondary rounded-10-px p-3 shadow-sm" id="graph-ticket-sales"></canvas>
                    </div>
                    <div class="d-inline-flex flex-column mt-3">
                        <h6 class="mb-0 fw-bold text-subheader">Latest Events</h6>
                        <div class="d-inline-flex mt-2 eo-home-card-container">
                            @foreach($latest_events as $event)
                                <a class="position-relative rounded-10-px eo-home-card-shadow me-4" href="/eo-event/{{ $event->id }}">
                                    <img src="{{ asset('images/'.$event->thumbnail_path) }}" alt="{{ $event->name }}" class="eo-home-card-images-small rounded-10-px">
                                    <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                    <p class="position-absolute mb-0 eo-home-card-title">{{ $event->name }}</p>
                                </a>
                            @endforeach
                            {{-- <a class="position-relative rounded-10-px eo-home-card-shadow" href="event">
                                <img src="{{ asset('images/blackpink-banner2.png') }}" alt="Blackpink" class="eo-home-card-images-small rounded-10-px">
                                <div class="position-absolute eo-home-card-gradient-cover-black w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 eo-home-card-title">Born Pink World Tour</p>
                            </a>
                            <a class="position-relative rounded-10-px eo-home-card-shadow ms-4" href="event">
                                <img src="{{ asset('images/love-on-tour.png') }}" alt="Harry Styles" class="eo-home-card-images-small rounded-10-px">
                                <div class="position-absolute eo-home-card-gradient-cover-black w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 eo-home-card-title">Love On Tour</p>
                            </a>
                            <a class="position-relative rounded-10-px eo-home-card-shadow ms-4" href="event">
                                <img src="{{ asset('images/indonesia-master-2023.png') }}" alt="Indonesia Master 2023" class="eo-home-card-images-small rounded-10-px">
                                <div class="position-absolute eo-home-card-gradient-cover-black w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 eo-home-card-title">Indonesia Master 2023</p>
                            </a>
                            <a class="position-relative rounded-10-px eo-home-card-shadow ms-4" href="event">
                                <img src="{{ asset('images/blackpink-banner2.png') }}" alt="Blackpink" class="eo-home-card-images-small rounded-10-px">
                                <div class="position-absolute eo-home-card-gradient-cover-black w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 eo-home-card-title">Born Pink World Tour</p>
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex justify-content-around bottom-nav">
                    <a href="/eo-home" class="bottom-nav-icons bottom-nav-icons-selected text-decoration-none">
                        <i class="bx bxs-home fs-3"></i>
                    </a>
                    <a href="/eo-calendar" class="bottom-nav-icons text-decoration-none">
                        <i class="bx bx-calendar fs-3"></i>
                    </a>
                    <a href="/eo-events" class="bottom-nav-icons text-decoration-none">
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    Chart.defaults.color = '#FFFFFF';

    const ticketSales = @json($ticket_sales);
    const graphLabels = [];
    const graphData = [];

    ticketSales.forEach((item) =>
    {
        graphLabels.push(item.month_year);
        graphData.push(item.total);
    });

    const graphTicketSales = document.querySelector("#graph-ticket-sales");
    new Chart(graphTicketSales, 
    {
        type: 'line',
        data: 
        {
            labels: graphLabels,
            datasets: 
            [
                {
                    label: 'Number of ticket sold',
                    data: graphData,
                    borderWidth: 1,
                    borderColor: '#FFFFFF',
                    backgroundColor: '#FFFFFF',
                    color: '#FFFFFF'
                }
            ]
        },
        options: 
        {
            plugins:
            {
                legend:
                {
                    display: false
                }
            },
            scales: 
            {
                y: 
                {
                    beginAtZero: false
                }
            }
        }
    });

</script>
</html>