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
    <link rel="stylesheet" href="{{ asset('css/event_detail.css') }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid vh-100 px-0 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex position-relative flex-column overflow-auto" id="app">
                <div class="d-flex position-relative background-banner-image-container" style="background-image: url({{ asset('images/'.$selected_event->banner_path) }})">
                    <img src="{{ asset('images/'.$selected_event->banner_path) }}" alt="{{ $selected_event->name }}" class="banner-image">
                    <div class="position-absolute w-100 h-100 top-0 left-0" style="background: linear-gradient(0deg, {{ $selected_event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                    <a href="/home" class="btn-action-top btn-action-top-left"><i class="bx bx-chevron-left fs-4"></i></a>
                    <img src="{{ asset('images/like-outline.png') }}" alt="" id="btn-like" class="btn-action-top btn-action-top-small btn-action-top-right position-absolute">

                    @if(session()->get('message') != null)
                    <div class="d-inline-flex justify-content-center position-absolute mt-7 mx-4 z-index-2">
                        <div class="alert-theme alert-danger-theme">
                            <i class='bx bxs-info-circle alert-theme-icon'></i>
                            <span class="alert-theme-text">{{ session()->get('message') }}</span>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="d-flex flex-column background-primary bottom-sheet">
                    <div class="d-flex justify-content-center">
                        <span class="bottom-sheet-handle"></span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-inline-flex flex-column flex-grow-1">
                            <h3 class="event-name fw-bold mb-0">{{ $selected_event->name }}</h3>
                        </div>
                        <select name="" id="combo-ticket-category" class="combo-box">
                            @foreach($selected_event->event_ticket_categories as $item)
                                @if($loop->index == 0)
                                    <option value="{{ $item->id }}" selected>{{ $item->category }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->category }}</option>
                                @endif
                            @endforeach
                            {{-- <option value="">Cat 1</option>
                            <option value="">Cat 2</option>
                            <option value="">Cat 3</option>
                            <option value="" selected>Cat 4</option> --}}
                        </select>
                    </div>
                    <div class="d-inline-flex mt-2">
                        <span class="event-price py-2 px-3" id="lbl-price">IDR {{ str_replace(',', '.', number_format($selected_event->event_ticket_categories[0]->price, 0)) }}</span>
                    </div>
                    <div class="d-inline-flex flex-column mt-4">
                        <p class="fw-bold fs-5 mb-1">Description</p>
                        <p class="text-description">{{ $selected_event->description }}</p>
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-inline-flex event-description-icon-container">
                                <i class="bx bx-map fs-4"></i>
                            </div>
                            <div class="d-inline-flex flex-column ps-3 flex-grow-1">
                                <p class="event-description-icon-text-top mb-0">{{ $selected_event->city_and_province }}</p>
                                <p class="event-description-icon-text-bottom mb-0">{{ $selected_event->place }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <div class="d-inline-flex event-description-icon-container">
                                <i class="bx bx-calendar fs-4"></i>
                            </div>
                            <div class="d-inline-flex ps-3 flex-grow-1">
                                <div class="d-flex flex-grow-1 flex-column">
                                    <p class="event-description-icon-text-top mb-0">
                                        {{ $selected_event->start_date->format('d M Y') }}

                                        @if($selected_event->start_date != $selected_event->end_date)
                                            - {{ $selected_event->end_date->format("d M Y") }}
                                        @endif
                                    </p>
                                    <p class="event-description-icon-text-bottom mb-0">{{ $selected_event->start_time->format('H:i') }} - {{ $selected_event->end_time->format('H:i') }}</p>
                                </div>
                                <img src="{{ asset('images/right.png') }}" alt="" class="cursor-pointer" id="btn-choose-date">
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <div class="d-inline-flex event-description-icon-container">
                                <i class="bx bx-group fs-4"></i>
                            </div>
                            <div class="d-inline-flex ps-3 flex-grow-1">
                                <div class="d-flex flex-grow-1 flex-column">
                                    <p class="event-description-icon-text-top mb-2">Qty</p>
                                    <p class="event-description-icon-text-bottom mb-0">
                                        <div class="d-flex">
                                            <button class="btn btn-secondary" id="btn-min">-</button>
                                            <input type="number" min="1" class="mx-3 form-control input text-center" value="1" readonly id="txt-qty">
                                            <button class="btn btn-secondary" id="btn-plus">+</button>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-5">
                        <form action="buy" method="POST" id="form-buy-ticket">
                            @csrf
                            <input type="text" class="d-none" id="form-txt-event-ticket-category-id" name="event_ticket_category_id" value="{{ $selected_event->event_ticket_categories[0]->id }}">
                            <input type="text" class="d-none" id="form-txt-date" name="date" value="{{ $selected_event->start_date->format('Y-m-d') }}">
                            <input type="number" class="d-none" id="form-txt-qty" name="qty" value="1">
                        </form>
                        <button class="btn-pink btn-pink-bold" type="submit" id="btn-buy-ticket">Buy Ticket</button>
                    </div>
                </div>

                <dialog id="dialog-choose-date" class="dialogs p-4">
                    <div id="dialog-choose-date-content">
                        <h3 class="dialog-header">Choose Date</h3>
                        <p class="mb-4 dialog-description">Please select the date you want to buy</p>
                        <div id="calendar-choose-date"></div>
                        <button class="btn-pink mt-3" id="btn-confirm-select-date">Select Date</button>
                    </div>
                </dialog>

                <dialog id="dialog-no-account" class="dialogs">
                    <div id="dialog-no-account-content" class="p-4">
                        <h3 class="dialog-header">Sorry..</h3>
                        <p class="mb-4 dialog-description">You have to login to your account first to buy the ticket</p>

                        <a href="/login" class="btn-pink d-flex align-items-center justify-content-center">
                            Login to Account
                            <i class="bx bx-user icon-btn"></i>
                        </a>
                    </div>
                </dialog>
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
<script>

    const btnLike = document.querySelector("#btn-like");
    const btnChooseDate = document.querySelector("#btn-choose-date");
    const dialogChooseDate = document.querySelector("#dialog-choose-date");
    const dialogChooseDateContent = document.querySelector("#dialog-choose-date-content");
    const calendarChooseDate = document.querySelector("#calendar-choose-date");
    const btnConfirmSelectDate = document.querySelector("#btn-confirm-select-date");
    const comboTicketCategory = document.querySelector("#combo-ticket-category");
    const lblPrice = document.querySelector("#lbl-price");
    const btnBuyTicket = document.querySelector("#btn-buy-ticket");
    const dialogNoAccount = document.querySelector("#dialog-no-account");
    const dialogNoAccountContent = document.querySelector("#dialog-no-account-content");
    const btnMin = document.querySelector("#btn-min");
    const btnPlus = document.querySelector("#btn-plus");
    const txtQty = document.querySelector("#txt-qty");

    const formBuyTicket = document.querySelector("#form-buy-ticket");
    const formTxtQty = document.querySelector("#form-txt-qty");
    const formTxtEventTicketCategoryID = document.querySelector("#form-txt-event-ticket-category-id");
    const formTxtDate = document.querySelector('#form-txt-date');

    const userID = @json($user_id);
    const selectedEvent = @json($selected_event);

    let isLiked = false;
    let isFirstLoad = true;

    btnLike.addEventListener("click", () =>
    {
        btnLike.src = !isLiked ? "/images/like-solid.png" : "/images/like-outline.png";
        isLiked = !isLiked;
    });

    const selectedEventStartDate = selectedEvent.start_date.split("T")[0];
    const selectedEventEndDate = selectedEvent.end_date.split("T")[0];

    let userSelectedDate = new Date(selectedEventStartDate);
    let userSelectedDateString = userSelectedDate.getFullYear() + "-" + ("0"+ (userSelectedDate.getMonth() + 1)).slice(-2) + "-" + ("0" + userSelectedDate.getDate()).slice(-2);
    
    const calendar = new Calendar(
        {
            id: '#calendar-choose-date',
            calendarSize: 'small',
            theme: 'glass',
            dateChanged: (currentDate, DateEvents) =>
            {
                if(isFirstLoad)
                {
                    isFirstLoad = false;
                }
                else
                {
                    userSelectedDate = currentDate;
                    userSelectedDateString = userSelectedDate.getFullYear() + "-" + ("0"+ (userSelectedDate.getMonth() + 1)).slice(-2) + "-" + ("0" + userSelectedDate.getDate()).slice(-2);
                    formTxtDate.value = userSelectedDateString;
                }
            }
        }
    );

    const comboTicketCategory_Change = () =>
    {
        const ticketCategoryID = comboTicketCategory.value;
        const query = selectedEvent.event_ticket_categories.filter(x => x.id == ticketCategoryID)[0];

        txtQty.value = "1";
        formTxtQty.value = "1";

        if(query.available == 0)
        {
            btnBuyTicket.innerText = "Sold Out";
            btnBuyTicket.disabled = true;
            btnBuyTicket.classList.add('btn-pink-disabled');
        }
        else
        {
            btnBuyTicket.innerText = "Buy Ticket";
            btnBuyTicket.disabled = false;
            btnBuyTicket.classList.remove('btn-pink-disabled');
        }

        formTxtEventTicketCategoryID.value = ticketCategoryID;
        lblPrice.innerText = "IDR " + query.price.toLocaleString('en-US').replaceAll(',', '.');
    };

    comboTicketCategory.addEventListener("change", comboTicketCategory_Change);

    btnChooseDate.addEventListener("click", () =>
    {
        dialogChooseDate.showModal();
        calendar.setDate(userSelectedDate);
    });

    btnConfirmSelectDate.addEventListener("click", () =>
    {
        dialogChooseDate.close();
    })

    dialogChooseDate.addEventListener("click", () =>
    {
        dialogChooseDate.close();
    });

    dialogChooseDateContent.addEventListener("click", (event) =>
    {
        event.stopPropagation();
    });

    btnBuyTicket.addEventListener("click", () =>
    {
        if(userID == null)
        {
            dialogNoAccount.showModal();
            return;
        }

        // Validation
        const startDate = new Date(selectedEventStartDate);
        const endDate = new Date(selectedEventEndDate);
        if(userSelectedDate > endDate || userSelectedDate < startDate)
        {
            alert("Selected date is invalid");
            return;
        }

        const dateNow = new Date();
        dateNow.setHours(0, 0, 0, 0);
        if(userSelectedDate < dateNow)
        {
            alert("Selected date is invalid");
            return;
        }

        formBuyTicket.submit();
    });

    dialogNoAccount.addEventListener("click", () =>
    {
        dialogNoAccount.close();
    });

    dialogNoAccountContent.addEventListener("click", (event) =>
    {
        event.stopPropagation();
    });

    btnMin.addEventListener("click", () =>
    {
        let qty = parseInt(txtQty.value);
        if(qty - 1 < 1)
        {
            return;
        }

        txtQty.value = qty - 1;
        formTxtQty.value = txtQty.value;
    });

    btnPlus.addEventListener("click", () =>
    {
        let qty = parseInt(txtQty.value);

        if(selectedEvent.event_type_id == 1)
        {
            if(qty + 1 > 2)
            {
                return;
            }
        }
        else
        {
            const ticketCategoryID = comboTicketCategory.value;
            const ticketCategory = selectedEvent.event_ticket_categories.filter(x => x.id == ticketCategoryID)[0];

            if(qty + 1 > ticketCategory.available)
            {
                return;
            }
        }

        txtQty.value = qty + 1;
        formTxtQty.value = txtQty.value;
    });

    comboTicketCategory_Change();

</script>
</html>