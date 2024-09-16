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
                        <ul>
                            <li>
                                <a href="#"> <i class="fa-solid fa-people-roof"></i> <span class="nav-text">Your
                                        Child Class</span>
                                </a>

                                <ul>
                                    <li><a href=""><i class="fa-solid fa-newspaper"></i></i><span> Akram
                                            </span></a>
                                    </li>
                                    <li><a href=""><i class="fa-solid fa-newspaper"></i></i><span> Ahmed
                                            </span></a>
                                    </li>
                                    <li><a href=""><i class="fa-solid fa-newspaper"></i></i><span> Ayman
                                            </span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-person-breastfeeding"></i>
                                    <span class="nav-text">Your Children</span>
                                </a>
                                <ul>
                                    <li><a href=""><i class="fa-solid fa-child"></i></i></i><span> Akram
                                            </span></a>
                                    </li>
                                    <li><a href=""><i class="fa-solid fa-child"></i></i></i><span> Ahmed
                                            </span></a>
                                    </li>
                                    <li><a href=""><i class="fa-solid fa-child"></i></i></i><span> Ayman
                                            </span></a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-comment-dollar"></i>
                                    <span class="nav-text">Your Fee</span>
                                </a>
                                <ul>
                                    <li>
                                    <li><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                class="fa-solid fa-child"></i></i></i><span> Akram
                                            </span></a>
                                    </li>
                                    <li><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                class="fa-solid fa-child"></i></i></i><span> Ahmed
                                            </span></a>
                                    </li>
                                    <li><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                class="fa-solid fa-child"></i></i></i><span> Ayman
                                            </span></a>
                                    </li>
                            </li>
                        </ul>

                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-clipboard-user"></i>
                                <span class="nav-text">Attendance</span>
                            </a>
                            <ul>


                                <li><a href=""><i class="fa-solid fa-child"></i></i></i><span> Akram
                                        </span></a>
                                </li>
                                <li><a href=""><i class="fa-solid fa-child"></i></i></i><span> Ahmed
                                        </span></a>
                                </li>
                                <li><a href=""><i class="fa-solid fa-child"></i></i></i><span> Ayman
                                        </span></a>
                                </li>

                            </ul>

                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-file-import"></i> <span class="nav-text">Assignments</span>
                            </a>
                            <ul>
                                <li><a href=""><i class="fa-solid fa-child"></i></i></i><span> Akram
                                        </span></a>
                                </li>
                                <li><a href=""><i class="fa-solid fa-child"></i></i></i><span> Ahmed
                                        </span></a>
                                </li>
                                <li><a href=""><i class="fa-solid fa-child"></i></i></i><span> Ayman
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            </form>

                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span class="nav-text">Logout</span>
                            </a>
                            <ul>

                            </ul>
                        </li>
                        </ul>
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
