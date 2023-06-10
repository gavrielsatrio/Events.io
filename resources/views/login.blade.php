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
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid px-0 vh-100 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column overflow-auto" id="app">
                <div class="d-flex flex-column">
                    <h1 class="labelH1 mb-0">Login</h1>
                    <h2 class="labelH2">Welcome Back to Events.io</h2>
                </div>

                @if(session()->has('error_message'))
                    <div class="d-inline-flex justify-content-center mt-3">
                        <div class="alert-theme alert-danger-theme">
                            <i class='bx bxs-info-circle alert-theme-icon'></i>
                            <span class="alert-theme-text">{{ Session::get('error_message') }}</span>
                        </div>
                    </div>
                @endif

                <form class="form {{ session()->has('error_message') ? 'mt-4' : 'mt-5' }}" method="POST" action="{{ route('login.auth') }}">
                    @csrf
                    <div class= "inemail">
                        <label for="femail" class="label-input">Email </label>
                        <input type="email" name="email" class="form-control input mt-2" placeholder="Enter your email" id="femail" required autocomplete="off">
                    </div>

                    <div class= "inpassword mt-3">
                        <label for="fpassword" class="label-input">Password </label>
                        <input type="password" name="password" class="form-control input mt-2" placeholder= "Enter your password" id="fpassword" required autocomplete="off">
                    </div>

                    <div class="d-flex flex-column align-items-end mt-3">
                        <a href="/forget-password" class="forget">Forget Password?</a>
                    </div> 

                    <div class="d-flex flex-column align-items-center justify-content-center mt-5 px-5">
                        <button type="submit" class="btn-pink">Login</button>
                    </div>
                </form>
                <div class="footer text-center mt-3">
                    <p class="account mb-0 d-inline-block">Doesn't have an account?</p>
                    <a id="link-sign-up" class="fw-bold">Sign Up</a>
                </div>

                {{-- <div class = "socmed">
                    <a href="" class="social">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                        </svg>
                    </a>
                    <a href="" class="social">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                    </a>
                    <a href="" class="social">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-apple" viewBox="0 0 16 16">
                            <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"/>
                            <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"/>
                        </svg>
                    </a>
                </div> --}}
                

                <dialog id="dialog-sign-up" class="dialogs">
                    <div id="dialog-sign-up-content" class="p-4">
                        <h3 class="dialog-header">Sign Up</h3>
                        <p class="mb-0 dialog-description">Whoooa, newcomers....</p>
                        <p class="mb-4 dialog-description">Please select your role first!</p>

                        <button class="btn-pink" id="btn-sign-up-user">
                            I'm a User
                            <img src="{{ asset('images/account.png') }}" alt="" class="icon-btn">
                        </button>
                        <button class="btn-pink mt-3" id="btn-sign-up-eo">
                            I'm an Event Organizer
                            <img src="{{ asset('images/party.png') }}" alt="" class="icon-btn">
                        </button>
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

    const linkSignUp = document.querySelector("#link-sign-up");

    const dialogSignUp = document.querySelector("#dialog-sign-up");
    const dialogSignUpContent = document.querySelector("#dialog-sign-up-content");
    const btnSignUpUser = document.querySelector("#btn-sign-up-user");
    const btnSignUpEO = document.querySelector("#btn-sign-up-eo");

    linkSignUp.addEventListener("click", () =>
    {
        // dialogSignUp.showModal();
        window.location.href = "/sign-up/user";
    });

    dialogSignUp.addEventListener("click", () =>
    {
        dialogSignUp.close();
    });

    dialogSignUpContent.addEventListener("click", (event) =>
    {
        event.stopPropagation();
    });

    btnSignUpUser.addEventListener("click", () =>
    {
        window.location.href = "/sign-up/user";
        dialogSignUp.close();
    });

    btnSignUpEO.addEventListener("click", () =>
    {
        window.location.href = "/sign-up/event-organizer";
        dialogSignUp.close();
    });

</script>
</html>