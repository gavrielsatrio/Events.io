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
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid px-0 vh-100 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column overflow-auto" id="app">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-inline-flex flex-column">
                        <h3 class="text-app-name">Events.io</h3>
                        <p class="mb-0 text-description">Your events partner</p>
                    </div>
                    <i class="bx bx-user fs-4" id="btn-account"></i>
                    {{-- <img src="{{ asset('images/account.png') }}" alt="" id="btn-account"> --}}
                </div>
                <div class="d-inline-flex position-relative align-items-center mt-4">
                    <img src="{{ asset('images/search.png') }}" alt="" class="position-absolute ms-2">
                    <input type="text" class="form-control input-with-icon" placeholder="Search event name or artist name" id="txt-search">
                </div>
                <div class="d-inline-flex flex-column" id="main-section-container">
                    <div class="d-inline-flex flex-column">
                        <h6 class="mb-0 fw-bold text-subheader">Fast Selling Ticket</h6>
                        <div class="d-inline-flex mt-2 home-card-container">
                            @foreach($fast_selling_ticket_event as $event)
                                <a class="position-relative rounded-10-px home-card-shadow {{ $loop->index > 0 ? "ms-4" : "" }}" href="/event/{{ $event->id }}">
                                    <img src="{{ asset("images/".$event->thumbnail_path) }}" alt="{{ $event->name }}" class="home-card-images-small rounded-10-px">
                                    <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                    <p class="position-absolute mb-0 home-card-title">{{ $event->name }}</p>
                                </a>
                            @endforeach
                            {{-- <a class="position-relative rounded-10-px home-card-shadow" href="event">
                                <img src="{{ asset('images/blackpink.png') }}" alt="Blackpink" class="home-card-images-small rounded-10-px">
                                <div class="position-absolute home-card-gradient-cover-pink w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 home-card-title">Born Pink World Tour</p>
                            </a>
                            <div class="position-relative rounded-10-px home-card-shadow ms-4">
                                <img src="{{ asset('images/nct-dream.png') }}" alt="NCT Dream" class="home-card-images-small rounded-10-px">
                                <div class="position-absolute home-card-gradient-cover-orange w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 home-card-title">NCT Dream</p>
                            </div>
                            <div class="position-relative rounded-10-px home-card-shadow ms-4">
                                <img src="{{ asset('images/blackpink.png') }}" alt="Blackpink" class="home-card-images-small rounded-10-px">
                                <div class="position-absolute home-card-gradient-cover-pink w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 home-card-title">Born Pink World Tour</p>
                            </div> --}}
                        </div>
                    </div>
                    <div class="d-inline-flex flex-column mt-3">
                        <h6 class="mb-0 fw-bold text-subheader">Don't Miss These Promo</h6>
                        <div class="d-inline-flex mt-2 home-card-container">
                            @foreach($promo_event as $event)
                                <a class="position-relative rounded-10-px home-card-shadow {{ $loop->index > 0 ? "ms-4" : "" }}" href="/event/{{ $event->id }}">
                                    <img src="{{ asset("images/".$event->thumbnail_path) }}" alt="{{ $event->name }}" class="home-card-images-small rounded-10-px">
                                    <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                    <p class="position-absolute mb-0 home-card-title">{{ $event->name }}</p>
                                </a>
                            @endforeach
                            {{-- <div class="position-relative rounded-10-px home-card-shadow">
                                <img src="{{ asset('images/indonesia-master-2023.png') }}" alt="Indonesia Master 2023" class="home-card-images-small rounded-10-px">
                                <div class="position-absolute home-card-gradient-cover-yellow w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 home-card-title">Indonesia Master 2023</p>
                            </div>
                            <div class="position-relative rounded-10-px home-card-shadow ms-4">
                                <img src="{{ asset('images/beli-2-dapat-3.png') }}" alt="Beli 2 Dapat 3" class="home-card-images-small rounded-10-px">
                                <div class="position-absolute home-card-gradient-cover-purple w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 home-card-title">Beli 2 Dapat 3</p>
                            </div>
                            <div class="position-relative rounded-10-px home-card-shadow ms-4">
                                <img src="{{ asset('images/blackpink.png') }}" alt="Blackpink" class="home-card-images-small rounded-10-px">
                                <div class="position-absolute home-card-gradient-cover-pink w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 home-card-title">Born Pink World Tour</p>
                            </div> --}}
                        </div>
                    </div>
                    <div class="d-inline-flex flex-column mt-3">
                        <h6 class="mb-0 fw-bold text-subheader">Popular in Your Area</h6>
                        <div class="d-inline-flex mt-2 home-card-container">
                            @foreach($popular_event as $event)
                                <a class="position-relative rounded-10-px home-card-shadow {{ $loop->index > 0 ? "ms-4" : "" }}" href="/event/{{ $event->id }}">
                                    <img src="{{ asset("images/".$event->thumbnail_path) }}" alt="{{ $event->name }}" class="home-card-images-large rounded-10-px">
                                    <div class="position-absolute home-card-gradient-cover-purple w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                    <p class="position-absolute mb-0 home-card-title">{{ $event->name }}</p>
                                </a>
                            @endforeach
                            {{-- <div class="position-relative rounded-10-px home-card-shadow">
                                <img src="{{ asset('images/jazz-festival.png') }}" alt="Jazz Festival" class="home-card-images-large rounded-10-px">
                                <div class="position-absolute home-card-gradient-cover-purple w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 home-card-title">Jazz Festival</p>
                            </div>
                            <div class="position-relative rounded-10-px home-card-shadow ms-4">
                                <img src="{{ asset('images/stand-up-comedy.png') }}" alt="Stand Up Comedy" class="home-card-images-large rounded-10-px">
                                <div class="position-absolute home-card-gradient-cover-orange w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 home-card-title">Stand Up Comedy</p>
                            </div>
                            <div class="position-relative rounded-10-px home-card-shadow ms-4">
                                <img src="{{ asset('images/jazz-festival.png') }}" alt="Jazz Festival" class="home-card-images-large rounded-10-px">
                                <div class="position-absolute home-card-gradient-cover-purple w-100 h-100 top-0 left-0 rounded-10-px"></div>
                                <p class="position-absolute mb-0 home-card-title">Jazz Festival</p>
                            </div> --}}
                        </div>
                    </div>
                    <div class="d-inline-flex flex-column mt-3">
                        <h6 class="mb-0 fw-bold text-subheader">Recommended for U</h6>
                        <div class="d-inline-flex mt-2 home-card-container">
                            @if(count($recommended_event) >= 3)
                                <a class="position-relative rounded-10-px home-card-shadow" href="/event/{{ $recommended_event[0]->id }}">
                                    <img src="{{ asset("images/".$recommended_event[0]->thumbnail_path) }}" alt="{{ $recommended_event[0]->name }}" class="home-card-images-extra-large rounded-10-px">
                                    <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $recommended_event[0]->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                    <p class="position-absolute mb-0 home-card-title">{{ $recommended_event[0]->name }}</p>
                                </a>
                                <div class="d-inline-flex flex-column ms-4 justify-content-between">
                                    <a class="position-relative rounded-10-px home-card-shadow home-card-recommended" href="/event/{{ $recommended_event[1]->id }}">
                                        <img src="{{ asset('images/'.$recommended_event[1]->thumbnail_path) }}" alt="{{ $recommended_event[1]->name }}" class="home-card-images-small rounded-10-px d-flex">
                                        <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $recommended_event[1]->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                        <p class="position-absolute mb-0 home-card-title">{{ $recommended_event[1]->name }}</p>
                                    </a>
                                    <a class="position-relative rounded-10-px home-card-shadow home-card-recommended" href="/event/{{ $recommended_event[2]->id }}">
                                        <img src="{{ asset('images/'.$recommended_event[2]->thumbnail_path) }}" alt="{{ $recommended_event[2]->name }}" class="home-card-images-small rounded-10-px">
                                        <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $recommended_event[2]->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                        <p class="position-absolute mb-0 home-card-title">{{ $recommended_event[2]->name }}</p>
                                    </a>
                                </div>
                            @elseif(count($recommended_event) >= 2)
                                <a class="position-relative rounded-10-px home-card-shadow" href="/event/{{ $recommended_event[0]->id }}">
                                    <img src="{{ asset("images/".$recommended_event[0]->thumbnail_path) }}" alt="{{ $recommended_event[0]->name }}" class="home-card-images-extra-large rounded-10-px">
                                    <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $recommended_event[0]->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                    <p class="position-absolute mb-0 home-card-title">{{ $recommended_event[0]->name }}</p>
                                </a>
                                <div class="d-inline-flex flex-column ms-4 justify-content-between">
                                    <a class="position-relative rounded-10-px home-card-shadow home-card-recommended" href="/event/{{ $recommended_event[1]->id }}">
                                        <img src="{{ asset('images/'.$recommended_event[1]->thumbnail_path) }}" alt="{{ $recommended_event[1]->name }}" class="home-card-images-small rounded-10-px d-flex">
                                        <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $recommended_event[1]->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                        <p class="position-absolute mb-0 home-card-title">{{ $recommended_event[1]->name }}</p>
                                    </a>
                                </div>
                            @elseif(count($recommended_event) >= 1)
                                <a class="position-relative rounded-10-px home-card-shadow" href="/event/{{ $recommended_event[0]->id }}">
                                    <img src="{{ asset("images/".$recommended_event[0]->thumbnail_path) }}" alt="{{ $recommended_event[0]->name }}" class="home-card-images-extra-large rounded-10-px">
                                    <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $recommended_event[0]->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                    <p class="position-absolute mb-0 home-card-title">{{ $recommended_event[0]->name }}</p>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="d-inline-flex flex-column mt-3">
                        <h6 class="mb-0 fw-bold text-subheader">Upcoming Events</h6>
                        <div class="d-inline-flex mt-2 home-card-container">
                            <a class="position-relative rounded-10-px home-card-shadow w-100" href="/event/{{ $upcoming_event->id }}">
                                <img src="{{ asset('images/'.$upcoming_event->thumbnail_path) }}" alt="{{ $upcoming_event->name }}" class="home-card-images-full rounded-10-px">
                                <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, {{ $upcoming_event->gradient_cover_color }}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                                <p class="position-absolute mb-0 home-card-title">{{ $upcoming_event->name }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex flex-column visually-hidden" id="search-section-container">
                    <h6 class="mt-4 fw-bold text-subheader">Search Results</h6>
                    <div class="row" id="search-result-container">
                        
                    </div>
                </div>

                <dialog id="dialog-make-account-first" class="dialogs">
                    <div id="dialog-make-account-first-content" class="p-4">
                        <h3 class="dialog-header">Sorry..</h3>
                        <p class="mb-4 dialog-description">You have to login to your account first</p>

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
<script>

    const btnAccount = document.querySelector("#btn-account");

    const dialogMakeAccountFirst = document.querySelector("#dialog-make-account-first");
    const dialogMakeAccountFirstContent = document.querySelector("#dialog-make-account-first-content");
    const btnMakeAccount = document.querySelector("#btn-make-account");
    const txtSearch = document.querySelector("#txt-search");
    const mainSectionContainer = document.querySelector("#main-section-container");
    const searchSectionContainer = document.querySelector("#search-section-container");
    const searchResultContainer = document.querySelector("#search-result-container");
    const userID = @json($user_id);
    const allEvent = @json($all_event);

    btnAccount.addEventListener("click", () =>
    {
        if(userID == null)
        {
            dialogMakeAccountFirst.showModal();
        }
        else
        {
            window.location.href = "/account";
        }
    });

    dialogMakeAccountFirst.addEventListener("click", () =>
    {
        dialogMakeAccountFirst.close();
    })

    dialogMakeAccountFirstContent.addEventListener("click", (event) =>
    {
        event.stopPropagation();
    })

    txtSearch.addEventListener("input", () =>
    {
        searchResultContainer.innerHTML = "";

        if(txtSearch.value.trim() == "")
        {
            mainSectionContainer.classList.remove('visually-hidden');
            searchSectionContainer.classList.add('visually-hidden');
            return;
        }
        else
        {
            mainSectionContainer.classList.add('visually-hidden');
            searchSectionContainer.classList.remove('visually-hidden');
        }

        const query = allEvent.filter(item => item.name.toLowerCase().includes(txtSearch.value.toLowerCase()) || item.artist.toLowerCase().includes(txtSearch.value.toLowerCase()));
        query.forEach((item) =>
        {
            searchResultContainer.innerHTML += `
                <div class="col-6 mt-4">
                    <a class="position-relative rounded-10-px home-card-shadow" href="/event/${item.id}">
                        <img src="{{ asset('images/${item.thumbnail_path}') }}" alt="${item.name}" class="d-flex home-card-image-search rounded-10-px">
                        <div class="position-absolute w-100 h-100 top-0 left-0 rounded-10-px" style="background: linear-gradient(0deg, ${item.gradient_cover_color}, rgba(0, 0, 0, 0)); z-index: 1;"></div>
                        <p class="position-absolute mb-0 home-card-title">${item.name}</p>
                    </a>
                </div>
            `;
        });
    });

</script>
</html>