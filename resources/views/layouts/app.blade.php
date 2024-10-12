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
        @can('admin-list', Auth::user()->id)
            @livewire('admin-search')
        @endcan
        @can('teacher-list', Auth::user()->id)
            @livewire('teacher-search')
        @endcan
        @can('student-list', Auth::user()->id)
            @livewire('student-search')
        @endcan
        @can('parent-list', Auth::user()->id)
            @livewire('parent-search')
        @endcan
        @if (Auth::user()->role == 'student')
            <a href="{{ route('student.profile', Auth::user()->id) }}">
            @elseif (Auth::user()->role == 'teacher')
                <a href="{{ route('teacher.profile', Auth::user()->id) }}">
                @elseif (Auth::user()->role == 'parent')
                    <a href="{{ route('parent.profile', Auth::user()->id) }}">
                    @else
                        <a href="{{ route('admin.profile', Auth::user()->id) }}">
        @endif
        @if (Auth::user()->image)
            <img src="{{ asset('storage/images/' . Auth::user()->image) }}" class="rounded-circle" height="22"
                loading="lazy" />
        @else
            <img src="{{ asset('build/assets/images/profile.jpg') }}" class="rounded-circle" height="22"
                loading="lazy" />
        @endif
        <span class="nav-text" style="color: white; float: left">{{ Auth::user()->first_name }}
            {{ Auth::user()->last_name }} ({{ Auth::user()->role }})</span>

        </a>


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
                    @can('admin-list', Auth::user()->id)
                        <x-admin-list :userId="Auth::user()->id" />
                    @endcan
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    @include('../includes.scripts')
</body>

</html>
