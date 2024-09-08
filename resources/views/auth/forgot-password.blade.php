<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<link rel="stylesheet" href="{{ asset('build/assets/css/login.css') }}">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />

<body>
    <div class="container">
        <h6 class="alert alert-primary" role="alert">Forgot your password? No problem. Just let us know your email
            address and we will
            email you a password reset link that will allow you to choose a new one</h6>
        <x-auth-session-status class="alert alert-success" role="alert" :status="session('status')" />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div style="margin-top:10px" data-mdb-input-init class="form-outline mb-4  ">

                <input type="email" id="email" class="form-control" value="" name="email" />
                <label class="form-label" for="email">Email address</label>
            </div>






            <button type="submit" class="btn btn-primary btn-block mb-4">Email Password Reset Link</button>


        </form>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
</body>

</html>
