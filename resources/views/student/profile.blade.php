<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('build/assets/css/studentProfile.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/all.min.css') }}">

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
            <h5>Settings</h5>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <div>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-people-roof"></i> <span class="nav-text">Your Class</span>
                            </a>
                            <ul>
                                <li><a href="add-professor.html"><i class="fa-solid fa-users"></i><span>class
                                            teamates</span></a></li>
                                <li><a href="edit-professor.html"> <i class="fa-solid fa-people-group"></i> <span>class
                                            Teachers</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa-solid fa-person-breastfeeding"></i>
                                <span class="nav-text">Your Parents</span>
                            </a>
                            <ul>

                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa-solid fa-book"></i>
                                <span class="nav-text">Subjects</span>
                            </a>
                            <ul>

                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa-solid fa-clipboard-user"></i>
                                <span class="nav-text">Attendance</span>
                            </a>
                            <ul>

                            </ul>

                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-comment-dollar"></i>
                                <span class="nav-text">Your Fee</span>
                            </a>
                            <ul>
                                <li>
                                    <a> <i class="fa-solid fa-credit-card"></i><span>paid / unpaid</span></a>
                                </li>
                            </ul>

                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-gears"></i>
                                <span class="nav-text">privacy settings</span>
                            </a>
                            <ul>
                                <li><a href="add-professor.html"> <i class="fa-regular fa-file-lines"></i><span>change
                                            your info</span></a></li>
                                <li><a href="all-professors.html"><i class="fa-solid fa-key"></i><span>change
                                            password</span> </a></li>
                            </ul>
                        </li>
                    </ul>
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

        <div class="profile-card-body">
            <p>Student ID</p>
            <p>Full Name</p>
            <p>Email</p>
            <p>Gender</p>
            <p>Class</p>


        </div>
    </div>
    <div class="totel-attendence">
        <p id="attendence">Attendance</p>
        <div class="progress-circle">
            <svg class="progress-ring" width="120" height="120">
                <circle class="progress-attendence-ring__circle" stroke="blue" stroke-width="10" fill="transparent"
                    r="50" cx="60" cy="60" />
            </svg>
            <div class="progress-value">
                <span id="percentage-attendence"></span>
            </div>
        </div>
    </div>

    <div class="totel-absence">
        <p id="absence">Absence</p>
        <div class="progress-circle">
            <svg class="progress-ring" width="120" height="120">
                <circle class="progress-absence-ring__circle" stroke="blue" stroke-width="10" fill="transparent" r="50"
                    cx="60" cy="60" />
            </svg>
            <div class="progress-value">
                <span id="percentage-absence"></span>
            </div>
        </div>
    </div>
    <div class="totel-assignment">
        <p id="assignment">Assignment</p>
        <div class="progress-circle">
            <svg class="progress-ring" width="120" height="120">
                <circle class="progress-assignment-ring__circle" stroke="blue" stroke-width="10" fill="transparent"
                    r="50" cx="60" cy="60" />
            </svg>
            <div class="progress-value">
                <span id="percentage-assignment"></span>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Time
                        </th>
                        <th class="text-uppercase">Monday</th>
                        <th class="text-uppercase">Tuesday</th>
                        <th class="text-uppercase">Wednesday</th>
                        <th class="text-uppercase">Thursday</th>
                        <th class="text-uppercase">Friday</th>
                        <th class="text-uppercase">Saturday</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle">09:00am</td>
                        <td>
                            <span
                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Dance</span>
                            <div class="margin-10px-top font-size14">9:00-10:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td>
                            <span
                                class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                            <div class="margin-10px-top font-size14">9:00-10:00</div>
                            <div class="font-size13 text-light-gray">Marta Healy</div>
                        </td>

                        <td>
                            <span
                                class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">9:00-10:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td>
                            <span
                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Dance</span>
                            <div class="margin-10px-top font-size14">9:00-10:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td>
                            <span
                                class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Art</span>
                            <div class="margin-10px-top font-size14">9:00-10:00</div>
                            <div class="font-size13 text-light-gray">Kate Alley</div>
                        </td>
                        <td>
                            <span
                                class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            <div class="margin-10px-top font-size14">9:00-10:00</div>
                            <div class="font-size13 text-light-gray">James Smith</div>
                        </td>
                    </tr>

                    <tr>
                        <td class="align-middle">10:00am</td>
                        <td>
                            <span
                                class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">10:00-11:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td>
                            <span
                                class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Art</span>
                            <div class="margin-10px-top font-size14">10:00-11:00</div>
                            <div class="font-size13 text-light-gray">Kate Alley</div>
                        </td>
                        <td>
                            <span
                                class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                            <div class="margin-10px-top font-size14">10:00-11:00</div>
                            <div class="font-size13 text-light-gray">Marta Healy</div>
                        </td>
                        <td>
                            <span
                                class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            <div class="margin-10px-top font-size14">10:00-11:00</div>
                            <div class="font-size13 text-light-gray">James Smith</div>
                        </td>
                        <td class="bg-light-gray">

                        </td>
                    </tr>

                    <tr>
                        <td class="align-middle">11:00am</td>
                        <td>
                            <span
                                class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                        <td>
                            <span
                                class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                        <td>
                            <span
                                class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                        <td>
                            <span
                                class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                        <td>
                            <span
                                class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                        <td>
                            <span
                                class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('build/assets/js/studentProfile.js') }}"></script>

</body>

</html>
