<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/register.css') }}">

</head>

<body>
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="{{ asset('build/assets/images/register.jpg') }}" alt="Sample photo"
                                    class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;
                      height: 100%;"
                                    loading="lazy" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-4 text-uppercase">Student registration form</h3>
                                    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            @error('firstname')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            @error('lastname')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-md-6 mb-3">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="form3Example1m"
                                                        class="form-control form-control-lg" name="firstname" />
                                                    <label class="form-label" for="form3Example1m">First name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="form3Example1n"
                                                        class="form-control form-control-lg" name="lastname" />
                                                    <label class="form-label" for="form3Example1n">Last name</label>
                                                </div>
                                            </div>
                                        </div>

                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div data-mdb-input-init class="form-outline mb-3">

                                            <input type="email" id="form3Example8"
                                                class="form-control form-control-lg" name="email" />
                                            <label class="form-label" for="form3Example8">Email</label>
                                        </div>
                                        @error('gender')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-0 me-4">Gender: </h6>

                                            <div class="form-check form-check-inline mb-0 me-3">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="femaleGender" value="female" />
                                                <label class="form-check-label" for="femaleGender">Female</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0 me-3">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="maleGender" value="male" />
                                                <label class="form-check-label" for="maleGender">Male</label>
                                            </div>



                                        </div>


                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div data-mdb-input-init class="form-outline mb-3">

                                            <input type="password" id="form3Example9"
                                                class="form-control form-control-lg" name="password" />
                                            <label class="form-label" for="form3Example9">Password</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-3">

                                            <input type="password" id="form3Example90"
                                                class="form-control form-control-lg" name="password_confirmation" />
                                            <label class="form-label" for="form3Example90">Confirm Password</label>
                                        </div>
                                        @error('code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div data-mdb-input-init class="form-outline mb-3">

                                            <input type="text" id="form3Example97"
                                                class="form-control form-control-lg" name="code" />
                                            <label class="form-label" for="form3Example97">Permission code</label>
                                        </div>
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div data-mdb-input-init class="form-outline mb-3">

                                            <input type="file" id="form3Example99"
                                                class="form-control form-control-lg" name="image" />
                                        </div>


                                        <div class="d-flex justify-content-end pt-3">
                                            <button type="button" class="btn btn-light btn-lg">Reset all</button>
                                            <input type="submit" class="btn btn-primary btn-lg ms-2"
                                                value="Register" />
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
</body>

</html>
