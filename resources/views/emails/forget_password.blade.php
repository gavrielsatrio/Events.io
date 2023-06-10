<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password Email</title>
</head>

<body style="padding: 0; margin: 0; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
    <div style="display: grid; width: 100%; min-height: 100vh; background-color: gainsboro;">
        <div style="display:inline-block; padding: 2.5rem; background-color: white; border-radius: 4px; box-shadow: 0px 0px 16px 4px rgba(0, 0, 0, 0.1); margin: auto;">
            <h2 style="margin: 0; margin-bottom: 1rem;">Password Reset</h2>
            <p style="margin: 0; margin-bottom: 0.5rem;">Hi, {{ $user->getFullName() }}</p>
            <p style="margin: 0; margin-bottom: 2rem;">We're sending you this email because you requested a password reset.</p>

            <p style="margin: 0; margin-bottom: 2rem;">Here's your new password : <span style="font-weight: bold;">{{ $newPassword }}</span></p>
            
            <p style="margin: 0; margin-bottom: 0.5rem;">Warm regards,</p>
            <p style="margin: 0; margin-bottom: 0.5rem; font-weight: bold;">Events.io team</p>
        </div>
    </div>
</body>

</html>