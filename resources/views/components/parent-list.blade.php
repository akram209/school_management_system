<ul>
    @if ($parent)

        <li>
            {{-- your childs classes by with students.class --}}
            <a href="#"> <i class="fa-solid fa-people-roof"></i> <span class="nav-text">Your
                    Child Class</span>
            </a>

            <ul>
                {{-- {{ $classes id by classid  }} --}}
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
                {{-- students profiles by with students id --}}
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
                <i class="fa-solid fa-calendar-days"></i>
                <span class="nav-text">Timetable</span>
            </a>
            <ul>
                @foreach ($parent->students as $student)
                    <li><a href="{{ route('student.timetable', $student->id) }}"><i
                                class="fa-solid fa-child"></i></i></i><span> {{ $student->user->first_name }}
                            </span></a>
                    </li>
                @endforeach

            </ul>
        </li>
        <li>
            <a href="#">
                {{-- attendance by with students ids --}}
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
                {{-- assignment students by students ids   --}}
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
                {{-- exams students by students ids   --}}
                <i class="fa-solid fa-file-import"></i> <span class="nav-text">Exams</span>
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
@endif
