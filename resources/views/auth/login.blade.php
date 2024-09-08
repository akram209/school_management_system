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
        <h2 class="text-center mb-3">Login</h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div style="margin-top:10px" data-mdb-input-init class="form-outline mb-4  ">

                <input type="email" id="email" class="form-control" value="" name="email" />
                <label class="form-label" for="email">Email address</label>
            </div>
            <x-input-error :messages="$errors->get('email')" class="alert alert-danger" role="alert" />

            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="password" class="form-control" name="password"
                    autocomplete="current-password" />
                <label class="form-label" for="password">Password</label>
            </div>
            <x-input-error :messages="$errors->get('password')" class="alert alert-danger" role="alert" />

            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember" />
                        <label class="form-check-label" for="remember_me"> Remember me </label>
                    </div>
                </div>

                <div class="col">
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Sign
                in</button>

            <div class="text-center">
                <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
</body>

</html>
