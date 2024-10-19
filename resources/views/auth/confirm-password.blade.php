<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm</title>
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
        <h2 class="text-center mb-3">Confirm Password</h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf


            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="password" class="form-control" name="password"
                    autocomplete="current-password" />
                <label class="form-label" for="password">Password</label>
            </div>
            <x-input-error :messages="$errors->get('password')" class="alert alert-danger" role="alert" />



            <button type="submit" class="btn btn-primary btn-block mb-4"> confirm</button>


        </form>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
</body>

</html>
