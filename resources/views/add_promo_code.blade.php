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

    <link rel="stylesheet" href="{{ asset('css/add_promo_code.css') }}">
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
                    <a href="/eo-account" class="me-3"><i class="bx bx-chevron-left fs-3 text-white btn-back"></i></a>
                    <div class="ms-1">
                        <h3 class="mb-2 text-header">Add Promo Code</h3>
                        <p class="mb-0 text-description">Register your promo code</p>
                    </div>
                </div>
                @if(session()->get('message') != null)
                    <div class="d-inline-flex justify-content-center mt-5">
                        <div class="alert-theme alert-danger-theme">
                            <i class='bx bxs-info-circle alert-theme-icon'></i>
                            <span class="alert-theme-text">{{ session()->get('message') }}</span>
                        </div>
                    </div>
                @endif
                <div class="mt-4 w-100">
                    <form action="add-promo-code/add" method="POST" id="form-add-promo">
                        @csrf
                        <input type="text" name="event_id" value="{{ $event_id }}" class="d-none">

                        <div class="codeName mt-3">
                            <label for="codeNama" class="label-input">Promo Code</label>
                            <input type="text" name="code" class="form-control input text-uppercase" placeholder="Enter your promo code" id="fcode" autocomplete="off" required>
                        </div>
                        <div class="codeName mt-3">
                            <label for="codeNama" class="label-input">Discount Percentage</label>
                            <input type="number" name="discount_percentage" min="1" max="100" value="1" class="form-control input" id="fdiscountpercentage"  autocomplete="off" required>
                        </div>
                        <div class="date row mt-3">
                            <div class="col-6">
                                <label for="eventDatestart" class="label-input">Promo Code Period Start</label>
                                <input type="date" class="form-control input" id="fstartdate" name="start_date" required>
                            </div>
                            <div class="col-6">
                                <label for="eventDateEnd" class="label-input">Promo Code Period End</label>
                                <input type="date" class="form-control input" id="fenddate" name="end_date" required>
                            </div>
                        </div>
                        <div class="description d-flex flex-column mt-3">
                            <label for="tnc" class="label-input">Description</label>
                            <textarea name="description" id="ftnc" class="form-control input" placeholder="Description for your events" autocomplete="off" required></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-pink mt-5"> Request</button>
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
<script>

    const formAddPromo = document.querySelector("#form-add-promo");
    formAddPromo.addEventListener('submit', (event) =>
    {
        const startDate = new Date(document.querySelector("#fstartdate").value);
        const endDate = new Date(document.querySelector("#fenddate").value);

        if(startDate > endDate)
        {
            alert("Date range invalid");
            event.preventDefault();
            return false;
        }

        return true;
    });

</script>
</html>