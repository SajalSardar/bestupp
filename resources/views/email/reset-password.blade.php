<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align:center">Welcome To Maditam</h1>
    <div
        style=" background: #dfdfdf66;
        width: 100%;
        border-radius: 5px;
        padding: 10px;
        margin:0 auto;"
        >
        <h3>Hello!</h3>
        <p>
            You are receiving this email because we received a password reset request for your account.
        </p>
        <div
            style=" text-align: center;
            overflow: hidden;
            padding: 20px;"
            >
            <a
            href="{{ url('password/reset/' . $token) }}?email={{ $email }}"
            style="background: #ddd;
                padding: 10px 20px;
                border-radius: 4px;
                color: rgb(24, 24, 24);
                text-decoration: none;
                font-weight: 700;"
                >
                Click for Rest
            </a>
        </div>
        <p>This password reset link will expire in 60 minutes.</p>
        <p>If you did not request a password reset, no further action is required.</p>
        <p>Regards,</p>
        <p>{{ config('app.name') }}</p>

        <hr>

        <p>
            If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:
            <a href="{{ url('password/reset/' . $token) }}?email={{ $email }}">
                {{ url('password/reset/' . $token) }}?email={{ $email }}
            </a>
        </p>
    </div>
</body>
</html>
