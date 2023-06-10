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
    <link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}">

    {{-- <!-- PWA  -->
    <meta name="theme-color" content="#BF3861"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}"> --}}
</head>
<body>
    <div class="container-fluid px-0 vh-100 overflow-hidden">
        <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column overflow-auto" id="app">
                <div class="d-inline-flex">
                    <a href="/account" class="me-3"><i class="bx bx-chevron-left fs-3 text-white btn-back"></i></a>
                    <div class="ms-1">
                        <h3 class="mb-2 text-header">Edit Profile</h3>
                        <p class="mb-0 text-description">Edit your profile here</p>
                    </div>
                </div>
                <div class="mt-5">
                    <form action="edit-profile/save" method="POST" id="form-edit-profile">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label class="label-input">First Name</label>
                                <input type="text" name="firstname" class="form-control input" placeholder="First name" autocomplete="off" required value="{{ $user->firstname }}">
                            </div>
                            <div class="col-6">
                                <label class="label-input">Last Name</label>
                                <input type="text" name="lastname" class="form-control input" placeholder="Last name" autocomplete="off" required value="{{ $user->lastname}}">
                            </div>
                            <div class="col-12 mt-3">
                                <label class="label-input">Email</label>
                                <input type="email" name="email" class="form-control input" placeholder="Email" autocomplete="off" required value="{{ $user->email}}">
                            </div>
                            <div class="col-12 mt-3">
                                <label class="label-input">Password</label>
                                <input type="password" name="password" class="form-control input" placeholder="Password" autocomplete="off" required value="{{ $user->password}}">
                            </div>
                            <div class="col-12 mt-3">
                                <label class="label-input">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control input" placeholder="Date of Birth" autocomplete="off" required value="{{ $user->date_of_birth}}">
                            </div>
                            <div class="col-12 mt-3">
                                <label class="label-input">Phone Number</label>
                                <input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="15" name="phone_number" class="form-control input" placeholder="Phone Number" id="fphonenumber" autocomplete="off" required value="{{ $user->phone}}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button class="btn-pink" type="submit" id="btn-save">Save</button>
                        </div>
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

    const formEditProfile = document.querySelector("#form-edit-profile");
    const btnSave = document.querySelector("#btn-save");

    formEditProfile.addEventListener("submmit", (event) =>
    {
        return true;
    });

</script>
</html>