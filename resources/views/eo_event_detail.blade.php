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

    <link rel="stylesheet" href="{{ asset('css/eo_event_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid vh-100 px-0 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column overflow-auto" id="app">
                <div class="d-inline-flex flex-column position-relative overflow-hidden" id="top-image-container">
                    <img src="{{ asset('images/'.$event->banner_path) }}" alt="" id="top-image">
                    <div class="position-absolute" style="background: linear-gradient(0deg, {{ $event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;" id="top-image-linear-gradient"></div>
                    <h5 class="mb-0 position-absolute" id="event-name">{{ $event->name }}</h5>

                    <div class="d-inline-flex align-items-center position-relative" id="top-image-controls">
                        <a href="/eo-home" class="position-absolute top-0 left-0"><i class="bx bx-chevron-left fs-3 text-white btn-back"></i></a>
                        <h5 class="mb-0 text-center w-100 btn-back-pairing-text">Ticket Sales</h5>
                    </div>
                </div>
                <div class="d-inline-flex flex-column position-relative" id="bottom-content">
                    <div class="d-inline-flex w-100 justify-content-end">
                        <a href="/eo-event/{{ $event->id }}/add-promo-code" class="btn-pink-wrap-content" id="btn-add-promo-code">Add Promo Code</a>
                    </div>
                    <h5 class="mb-0 fw-bold text-subheader">Ticket Sold</h5>
                    <div class="row px-2 align-items-center">
                        <div class="col-6">
                            <table class="table table-borderless text-white mt-3">
                                @foreach($event_ticket_category as $item)
                                    <tr class="p-0">
                                        <td class="lbl-event-ticket-category p-0 py-1"><i class="bx bxs-circle me-2" style="color:{{ $colors[$loop->index] }}"></i>{{ $item->category }}</td>
                                        <td class="lbl-event-ticket-category p-0 py-1 text-end">{{ count($item->transactions) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="col-6 d-inline-flex justify-content-end">
                            <div id="pie-chart-container">
                                <canvas class="shadow-sm" id="pie-chart-ticket-sold"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="d-inline-flex flex-column mt-3">
                        <h5 class="mb-0 fw-bold text-subheader">Ticket Sales Graph</h5>
                        <canvas class="shadow-sm mt-3 background-secondary rounded-10-px p-3" id="graph-ticket-sales"></canvas>
                    </div>
                    <div class="d-inline-flex flex-column mt-3">
                        <h5 class="mb-0 fw-bold text-subheader">Total Revenue</h5>
                        @php
                            $totalRevenue = 0;
                            foreach($event_ticket_category as $item)
                            {
                                $totalRevenue += $item->transactions->sum('total_price');
                            }
                        @endphp
                        <h6 class="text-center mt-4">IDR {{ str_replace(',', '.', number_format($totalRevenue, 0)) }}</h6>
                        <table class="table table-borderless text-white mt-3">
                            @foreach($event_ticket_category as $item)
                                <tr>
                                    <td class="lbl-event-ticket-category px-3 py-1">{{ $item->category }}</td>
                                    <td class="lbl-event-ticket-category px-3 py-1 text-end">IDR {{ str_replace(',', '.', number_format($item->transactions->sum('total_price'), 0)) }}</td>
                                </tr>
                            @endforeach
                        </table>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    Chart.defaults.color = '#FFFFFF';

    const eventTicketCategory = @json($event_ticket_category);
    const eventTicketCategoryColors = @json($colors);

    const pieChartTicketSold = document.querySelector("#pie-chart-ticket-sold");
    new Chart(pieChartTicketSold, 
    {
        type: 'doughnut',
        data: 
        {
            labels: eventTicketCategory.map(x => x.category),
            datasets: 
            [
                {
                    label: 'Ticket Sold',
                    data: eventTicketCategory.map(x => x.transactions.length),
                    backgroundColor: eventTicketCategoryColors,
                    hoverOffset: 4
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
            }
        }
    });

    const ticketSales = @json($ticket_sales);
    const graphTicketSales = document.querySelector("#graph-ticket-sales");
    new Chart(graphTicketSales, 
    {
        type: 'line',
        data: 
        {
            labels: ticketSales.map(x => x.month_year),
            datasets: 
            [
                {
                    label: 'Number of ticket sold',
                    data: ticketSales.map(x =>  x.total),
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
            }
        }
    });

</script>
</html>