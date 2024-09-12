@extends('layouts.app')
@section('title', 'Teacher Profile')
@section('title of sidebar', 'Settings')
@section('list')
    <ul>
        <li>
            <a href="#">
                <i class="fa-solid fa-people-roof"></i> <span class="nav-text">Your Classes</span>
            </a>
            <ul>
                <li><a href="add-professor.html"><i class="fa-solid fa-users-between-lines"></i><span>class 1
                        </span></a></li>
                <li><a href="edit-professor.html"><i class="fa-solid fa-users-between-lines"></i> <span>class 2
                        </span></a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-clipboard-user"></i><span class="nav-text">Attendance</span>
            </a>
            <ul>
                <li><a href="add-professor.html"><i class="fa-solid fa-newspaper"></i></i><span> class 1
                        </span></a>
                </li>
                <li><a href="add-professor.html"><i class="fa-solid fa-newspaper"></i></i><span> class 2
                        </span></a>
                </li>
                <li><a href="add-professor.html"><i class="fa-solid fa-newspaper"></i></i><span> class 3
                        </span></a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-calendar-days"></i>
                <span class="nav-text">Timetable</span>
            </a>
            <ul>

            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-file-import"></i> <span class="nav-text">Assignments</span>
            </a>
            <ul>
                <li><a href="add-professor.html"><i class="fa-regular fa-file-lines"></i><span> add Assignment
                        </span></a></li>
                <li><a href="edit-professor.html"><i class="fa-solid fa-file-signature"></i> <span>all assignment
                        </span></a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-clipboard-list"></i> <span class="nav-text">Exams</span>
            </a>
            <ul>
                <li><a href="add-professor.html"><i class="fa-regular fa-file-lines"></i><span> add Exam
                        </span></a></li>
                <li><a href="edit-professor.html"><i class="fa-solid fa-check-double"></i> <span>all Exams
                        </span></a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-list-check"></i><span class="nav-text">Grades</span>
            </a>
            <ul>
                <li><a href="add-professor.html"><i class="fa-regular fa-file-lines"></i><span> Exam 1
                        </span></a></li>
                <li><a href="edit-professor.html"><i class="fa-regular fa-file-lines"></i> <span> Exam 2
                        </span></a></li>
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
        <p>Full Name</p>
        <p>Gender</p>
        <p>Qualification</p>
        <p>Excperience</p>
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
            <h3>Subject</h3>

        </div>

        <div class="teacher-subject-body">
            <img id="img-subject" src="{{ asset('build/assets/images/subject.png') }}" alt="">
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
@endsection
