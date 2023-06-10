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

    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('css/sign_up.css')}}">    

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
                    <h1 class="labelH1 mb-2">Sign Up</h1>
                    <h2 class="labelH2">Register your account here</h2>
                </div>

                @if(session()->get('message') != null)
                    <div class="d-inline-flex justify-content-center mt-5">
                        <div class="alert-theme alert-danger-theme">
                            <i class='bx bxs-info-circle alert-theme-icon'></i>
                            <span class="alert-theme-text">{{ session()->get('message') }}</span>
                        </div>
                    </div>
                @endif

                <form class="form mt-5" action="/sign-up/{{ $role }}/create" method="POST" id="form-sign-up">
                    @csrf
                    <div class= "row">
                        <div class="col-6">
                            <label for="first name" class="label-input">First Name</label>
                            <input type="Fname" name="firstname" class="form-control input" id="fname" placeholder="First Name" autocomplete="off" required>
                        </div>
                        <div class="col-6">
                            <label for="last name" class="label-input">Last Name</label>
                            <input type="name"  name="lastname" class="form-control input" id="lname"  placeholder="Last Name" autocomplete="off" required>
                        </div>
                    </div>

                    <div class= "inemail mt-3">
                        <label for="femail" class="label-input">Email</label>
                        <input type="email"  name="email" class="form-control input" placeholder="Email" id="femail" autocomplete="off" required>
                    </div>

                    <div class="dob mt-3">
                        <label for="ttl" class="label-input">Date of Birth</label>
                        <input type="Date" name="date_of_birth" class="form-control input" id="fdob" autocomplete="off" required>
                    </div>

                    <div class="inphone mt-3">
                        <label for="fphone" class="label-input">Phone Number</label>
                        <input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="15" name="phone_number" class="form-control input" placeholder="Phone Number" id="fphonenumber" autocomplete="off" required>
                    </div>

                    <div class= "inpassword mt-3">
                        <label for="fpassword" class="label-input">Password</label>
                        <input type="password" name="password" class="form-control input" placeholder= "Password" id="fpassword" autocomplete="off" required>
                    </div>

                    <div class= "inpassword mt-3">
                        <label for="fconfpassword" class="label-input">Confirm Password</label>
                        <input type="password" name="conf_password" class="form-control input" placeholder= "Confirm Password" id="fconfpassword" autocomplete="off" required>
                    </div>

                    <div class="d-flex justify-content-center mt-5">
                        <button id="btn-sign-up" type="submit" class="btn-pink">Sign Up</button>
                    </div>
                </form>

                <div class="footer mt-3 text-center">
                    <p class="account d-inline-block">Already have an account?</p>
                    <a href="/login" class="fw-bold">Login</a>
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

    const formSignUp = document.querySelector("#form-sign-up");
    const formBtnSubmit = document.querySelector("#form-btn-submit");
    const txtPassword = document.querySelector("#fpassword");
    const txtConfPassword = document.querySelector("#fconfpassword");
    const dtpDateOfBirth = document.querySelector("#fdob");
    const btnSignUp = document.querySelector("#btn-sign-up");

    formSignUp.addEventListener("submit", (event) =>
    {
        if(txtConfPassword.value != txtPassword.value)
        {
            event.preventDefault();
            alert("Confirm password doesn't match");
            return false;
        }

        const dateOfBirth = new Date(dtpDateOfBirth.value);
        dateOfBirth.setHours(0, 0, 0, 0);

        const dateNow = new Date();
        dateNow.setHours(0, 0, 0, 0);

        if(dateOfBirth > dateNow)
        {
            event.preventDefault();
            alert("Date of birth is invalid");
            return false;
        }

        return true;
    });

</script>
</html>