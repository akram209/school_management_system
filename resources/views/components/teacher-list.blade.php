<ul>
    <li>
        <a href="#">
            <i class="fa-solid fa-people-roof"></i> <span class="nav-text">Your Classes</span>
        </a>
        <ul>
            {{-- {{ $classes id by teacherid by with }} --}}
            <li><a href=""><i class="fa-solid fa-users-between-lines"></i><span>class 1
                    </span></a></li>
            <li><a href="edit-professor.html"><i class="fa-solid fa-users-between-lines"></i>
                    <span>class 2
                    </span></a></li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fa-solid fa-clipboard-user"></i><span class="nav-text">Attendance</span>
        </a>
        <ul>
            {{-- {{ $classes id by teacherid by with }} --}}
            <li><a href=""><i class="fa-solid fa-newspaper"></i></i><span> class 1
                    </span></a>
            </li>
            <li><a href=""><i class="fa-solid fa-newspaper"></i></i><span> class 2
                    </span></a>
            </li>
            <li><a href=""><i class="fa-solid fa-newspaper"></i></i><span> class 3
                    </span></a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            {{-- timetable by teacher id --}}
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
            {{-- form for assignment --}}
            <li><a href=""><i class="fa-regular fa-file-lines"></i><span> add Assignment
                    </span></a></li>
            {{-- all assignment by class id and subject id --}}
            <li><a href="edit-professor.html"><i class="fa-solid fa-file-signature"></i>
                    <span>all assignment
                    </span></a></li>
        </ul>
    </li>
    <li>
        <a href="#">
            {{-- form for assignment --}}

            <i class="fa-solid fa-clipboard-list"></i> <span class="nav-text">Exams</span>
        </a>
        <ul>
            <li><a href=""><i class="fa-regular fa-file-lines"></i><span> add Exam
                    </span></a></li>
            {{-- all exams by class id and subject id --}}

            <li><a href="edit-professor.html"><i class="fa-solid fa-check-double"></i> <span>all
                        Exams
                    </span></a></li>
        </ul>
    </li>
    {{-- <li>
        <a href="#">
            <i class="fa-solid fa-list-check"></i><span class="nav-text">Grades</span>
        </a>
        <ul>
            <li><a href=""><i class="fa-regular fa-file-lines"></i><span> Exam 1
                    </span></a></li>
            <li><a href="edit-professor.html"><i class="fa-regular fa-file-lines"></i> <span>
                        Exam
                        2
                    </span></a></li>
        </ul>
    </li> --}}
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
