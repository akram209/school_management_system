@extends('layouts.app')
@section('title', 'Parent Profile')
@section('title of sidebar', 'Settings')

@section('list')
    <ul>
        <li>
            <a href="#"> <i class="fa-solid fa-people-roof"></i> <span class="nav-text">Your Child Class</span>
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
        <a href="#">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span class="nav-text">Logout</span>
        </a>
        <ul>

        </ul>
    </li>
    </ul>
@endsection

@section('card-body')

    <div class="profile-card-body">
        <p>Parent ID</p>
        <p>Full Name</p>
        <p>Gender</p>
        <p>Join Date</p>

    </div>
    </div>
@endsection
@section('content')
    <div class="teacher-info">
        <div class="teacher-info-header">
            <h3>Contact me</h3>
        </div>

        <div class="teacher-info-body">
            <p>address :</p>
            <hr>
            <p> phone : </p>
            <hr>
            <p>Email : </p>
        </div>

    </div>
    <div class="teacher-subject">
        <div class="teacher-subject-header">
            <h3>Your Children</h3>

        </div>
        <div class="teacher-info-body">
            <p style="text-align: center">Akram Hesham</p>
            <hr>
            <p style="text-align: center">Ahmed Hesham </p>
            <hr>
            <p style="text-align: center">Ayman Hesham</p>
        </div>

        <div class="teacher-subject-body">

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
    <!-- Modal -->
    <div style="transition: ease in out .5s; " class="modal fade" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
