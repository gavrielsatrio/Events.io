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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/eo_calendar.css') }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid vh-100 px-0 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column position-relative" id="app">
                <div class="d-flex flex-column no-scrollbars app-content flex-grow-1">
                    <div class="d-inline-flex align-items-center justify-content-between">
                        <div class="d-inline-flex flex-column">
                            <h3 class="text-app-name">Calendar</h3>
                            <p class="mb-0 text-description">Your ongoing events</p>
                        </div>
                    </div>
                    <div class="d-inline-flex justify-content-center mt-5 px-3">
                        <div class="d-flex" id="calendar-eo-events"></div>
                    </div>

                    <div class="d-inline-flex flex-column background-secondary bottom-sheet" id="calendar-bottom-sheet">
                        <div class="d-flex justify-content-center">
                            <span class="bottom-sheet-handle"></span>
                        </div>
                        <div class="d-flex flex-column">
                            <p id="lbl-selected-date" class="mb-2"></p>
                            <div class="d-flex flex-column" id="calendar-events-container">
                                {{-- <div class="d-inline-flex mt-5">
                                    <span class="d-inline-flex calendar-events-indicator"></span>
                                    <span class="d-inline-flex flex-grow-1 px-3">{{ $event["name"] }}</span>
                                    <span class="d-inline-flex">{{ $event["start"] }}</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around bottom-nav">
                    <a href="/eo-home" class="bottom-nav-icons text-decoration-none">
                        <i class="bx bxs-home fs-3"></i>
                    </a>
                    <a href="/eo-calendar" class="bottom-nav-icons bottom-nav-icons-selected text-decoration-none">
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
<script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.7/dayjs.min.js"></script>
<script src="https://stevenlevithan.com/assets/misc/date.format.js"></script>
<script>

    const allEvents = @json($allEvents);
    const events = @json($events);
    const lblSelectedDate = document.querySelector("#lbl-selected-date");
    const calendarEventsContainer = document.querySelector("#calendar-events-container");

    let userSelectedDate = new Date();
    
    const LoadCalendarEvents = () =>
    {
        calendarEventsContainer.innerHTML = "";
    
        allEvents.filter((item) =>
        {
            const eventStartDate = new Date(item.start_date);
            eventStartDate.setHours(0, 0, 0, 0);

            const eventEndDate = new Date(item.end_date);
            eventEndDate.setHours(0, 0, 0, 0);

            const currentSelectedDate = new Date(userSelectedDate);
            currentSelectedDate.setHours(0, 0, 0, 0);

            return currentSelectedDate >= eventStartDate && currentSelectedDate <= eventEndDate;
        })
        .forEach((item) =>
        {
            const eventStartDate = new Date(item.start_date);
            const eventStartTime = dayjs(item.start_time.replace("Z", "+07:00"));

            calendarEventsContainer.innerHTML += 
            `<div class="d-inline-flex mt-5">
                <span class="d-inline-flex calendar-events-indicator"></span>
                <span class="d-inline-flex flex-grow-1 px-3">` + item.name + `</span>
                <span class="d-inline-flex">` + eventStartTime.format("HH:mm") + `</span>
            </div>`;
        });
    };

    const calendar = new Calendar(
        {
            id: '#calendar-eo-events',
            calendarSize: 'large',
            theme: 'glass',
            headerBackgroundColor: '#212227',
            dateChanged: (currentDate, DateEvents) =>
            {
                userSelectedDate = currentDate;
                lblSelectedDate.innerText = userSelectedDate.format("dddd, dd mmmm yyyy");
                LoadCalendarEvents();
            },
            eventsData: events
        }
    );
    calendar.setDate(userSelectedDate);

    LoadCalendarEvents();

</script>
</html>