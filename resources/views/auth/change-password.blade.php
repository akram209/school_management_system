<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change</title>
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
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <!-- Password Field -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="password" class="form-control" name="password"
                    autocomplete="current-password" />
                <label class="form-label" for="password">New Password</label>
            </div>
            <x-input-error :messages="$errors->get('password')" class="alert alert-danger" role="alert" />

            <!-- Confirm Password Field -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="confirm_password" class="form-control" name="confirm_password"
                    autocomplete="current-password" />
                <label class="form-label" for="confirm_password">Confirm Password</label>
            </div>
            <x-input-error :messages="$errors->get('confirm_password')" class="alert alert-danger" role="alert" />

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
</body>

</html>
