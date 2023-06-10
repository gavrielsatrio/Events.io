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

    <link rel="stylesheet" href="{{ asset('css/add_event_proposal.css') }}">
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
                <div class="d-inline-flex">
                    <a href="/eo-home" class="me-3"><i class="bx bx-chevron-left fs-3 text-white btn-back"></i></a>
                    <div class="ms-1">
                        <h3 class="mb-2 text-header">Event Proposal</h3>
                        <p class="mb-0 text-description">Request your event</p>
                    </div>
                </div>
                <div class="d-inline-flex flex-column mt-5">
                    <form action="/add-event-proposal/request" method="POST" enctype="multipart/form-data" id="form-add-event-proposal">
                        @csrf
                        <div>
                            <label for="name" class="label-input">Event Name</label>
                            <input type="text" name="name" class="form-control input" placeholder="Event Name" id="name" autocomplete="off" required>
                        </div>
                        <div class="mt-3">
                            <label for="event_type" class="label-input">Event Type</label>
                            <select name="event_type" class="form-select input" id="event_type" autocomplete="off" required>
                                @foreach($event_types as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="artist" class="label-input">Artist</label>
                            <input type="text" name="artist" class="form-control input" placeholder="Artist" id="artist" autocomplete="off" required>
                        </div>
                        <div class="mt-3">
                            <label for="description" class="label-input">Description</label>
                            <textarea name="description" class="form-control input" placeholder="Description" id="description" autocomplete="off" required></textarea>
                        </div>
                        <div class="mt-3">
                            <label for="city_and_province" class="label-input">City and Province</label>
                            <input type="text" name="city_and_province" class="form-control input" placeholder="City and Province" id="city_and_province" autocomplete="off" required>
                        </div>
                        <div class="mt-3">
                            <label for="place" class="label-input">Place</label>
                            <input type="text" name="place" class="form-control input" placeholder="Place" id="place" autocomplete="off" required>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="start_date" class="label-input">Start Date</label>
                                <input type="date" name="start_date" class="form-control input" id="start_date" autocomplete="off" required>
                            </div>
                            <div class="col-6">
                                <label for="end_date" class="label-input">End Date</label>
                                <input type="date" name="end_date" class="form-control input" id="end_date" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="start_time" class="label-input">Start Time</label>
                                <input type="time" name="start_time" class="form-control input" id="start_time" autocomplete="off" required>
                            </div>
                            <div class="col-6">
                                <label for="end_time" class="label-input">End Time</label>
                                <input type="time" name="end_time" class="form-control input" id="end_time" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="thumbnail" class="label-input">Thumbnail Image</label>
                            <input type="file" name="thumbnail" class="form-control" id="thumbnail" autocomplete="off" required accept="image/*">
                        </div>
                        <div class="mt-3">
                            <label for="banner" class="label-input">Banner Image</label>
                            <input type="file" name="banner" class="form-control" id="banner" autocomplete="off" required accept="image/*">
                        </div>

                        <input type="text" class="d-none" id="form-txt-gradient-cover-color" name="gradient_cover_color">

                        <div class="mt-3">
                            <label for="supporting_documents" class="label-input mb-0">Supporting Documents</label>
                            <label for="supporting_documents" class="label-input d-block text-muted">STDP, SKDP, etc</label>
                            <input type="file" name="supporting_documents" class="form-control" id="supporting_documents" autocomplete="off" required>
                        </div>
                        <button class="btn-pink mt-5" type="submit">Request</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
<script>

    const colorThief = new ColorThief();

    const rgbToHex = (r, g, b) => '#' + [r, g, b].map(x => {
        const hex = x.toString(16)
        return hex.length === 1 ? '0' + hex : hex
    }).join('');

    const thumbnail = document.querySelector("#thumbnail");
    thumbnail.addEventListener('change', (event) =>
    {
        const fileImage = window.URL.createObjectURL(thumbnail.files[0]);
        const img = document.createElement('img');
        img.src = fileImage;

        img.addEventListener("load", () =>
        {
            const colors = colorThief.getColor(img);

            document.querySelector("#form-txt-gradient-cover-color").value = rgbToHex(colors[0], colors[1], colors[2]);
        });
    });

    const formAddEventProposal = document.querySelector("#form-add-event-proposal");
    formAddEventProposal.addEventListener('submit', (event) =>
    {
        const startDate = new Date(document.querySelector("#start_date").value);
        const endDate = new Date(document.querySelector("#end_date").value);

        if(startDate > endDate)
        {
            alert('Event date range invalid');
            event.preventDefault();
            return false;
        }

        return true;
    });

</script>
</html>