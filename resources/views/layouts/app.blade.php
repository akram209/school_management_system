<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @include('../includes.style')

<body>
    <nav class="navbar navbar-dark bg-primary">

        <i class="bi bi-list" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
            aria-controls="offcanvasWithBothOptions"></i>
        <img src="{{ asset('build/assets/images/Screenshot 2024-09-11 174254.png') }}" class="rounded-circle"
            height="22" alt="Avatar" loading="lazy" />
    </nav>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5>@yield('title of sidebar')</h5>

            <button type="button" class="bi bi-arrow-bar-left" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <div>
                    @can('student-list', Auth::user()->id)
                        <x-student-list :userId="Auth::user()->id" />
                    @endcan

                    @can('teacher-list', Auth::user()->id)
                        <x-teacher-list :userId="Auth::user()->id" />
                    @endcan
                    @can('parent-list', Auth::user()->id)
                        <x-parent-list :userId="Auth::user()->id" />
                    @endcan
                    @can('admin')
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="profile-card">
        <div class="profile-card-header">

            <img src="{{ asset('build/assets/images/Screenshot 2024-09-11 174254.png') }}" alt="profile"
                class="profile-card-header-profile-img">
        </div>
        <hr>
        @yield('card-body')
        @yield('content')

        @include('../includes.scripts')
</body>

</html>
