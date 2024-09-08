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
        <h6 class="alert alert-primary" role="alert">This is a secure area of the application. Please confirm your
            password before continuing.</h6> <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div style="margin-top:10px" data-mdb-input-init class="form-outline mb-4  ">

                <input type="email" id="email" class="form-control" value="" name="email" />
                <label class="form-label" for="email">Email address</label>

            </div>
            <x-input-error :messages="$errors->get('password')" class="alert alert-danger" role="alert" />

            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="password" class="form-control" name="password"
                    autocomplete="current-password" />
                <label class="form-label" for="password">Password</label>
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="password_confirmatio" class="form-control" name="password_confirmation"
                    equired autocomplete="new-password" />
                <label class="form-label" for="password">Password</label>

            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="alert alert-danger" role="alert" />



            <button type="submit" class="btn btn-primary btn-block mb-4">Reset Password</button>


        </form>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
</body>

</html>
