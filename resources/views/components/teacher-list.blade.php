<ul>
    <li>
        <a href="{{ route('teacher.profile', Auth::user()->id) }}">
            <i class="fa-solid fa-user"></i><span class="nav-text">Profile</span>
        </a>
        <ul>

        </ul>
    </li>

    <li>
        <a href="#">
            <i class="fa-solid fa-people-roof"></i> <span class="nav-text">Your Classes</span>
        </a>
        <ul>
            @foreach ($teacher->classes as $class)
                <li><a href="{{ route('class.show', $class->id) }}"><i
                            class="fa-solid fa-users-between-lines"></i><span>{{ $class->name }}
                        </span></a></li>
            @endforeach

        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fa-solid fa-clipboard-user"></i><span class="nav-text">Attendance</span>
        </a>
        <ul>
            @foreach ($teacher->classes as $class)
                <li><a href="{{ route('teacher.take-attendence', $class->id) }}"><i
                            class="fa-solid fa-newspaper"></i></i><span> {{ $class->name }}
                        </span></a>
                </li>
            @endforeach
        </ul>
    </li>

    <li>
        <a href="#">

            <i class="fa-solid fa-file-import"></i> <span class="nav-text">Assignments</span>
        </a>
        <ul>
            {{-- form for assignment --}}
            <li><a href="{{ route('teacher.create-assignment', $teacher->id) }}"><i
                        class="fa-regular fa-file-lines"></i><span>
                        add assignment
                    </span></a></li>
            @foreach ($teacher->classes as $class)
                <li><a href="{{ route('teacher.assignments', $teacher->id) }}"><i
                            class="fa-solid fa-file-signature"></i>
                        <span> {{ $class->name }} assignment
                        </span></a></li>
            @endforeach
        </ul>
    </li>
    <li>
        <a href="#">
            {{-- form for assignment --}}

            <i class="fa-solid fa-clipboard-list"></i> <span class="nav-text">Exams</span>
        </a>
        <ul>
            <li><a href="{{ route('teacher.create-exam', $teacher->id) }}"><i
                        class="fa-regular fa-file-lines"></i><span> add
                        exam
                    </span></a></li>
            @foreach ($teacher->classes as $class)
                <li><a href="{{ route('teacher.exams', $teacher->id) }}"><i class="fa-solid fa-check-double"></i> <span>
                            {{ $class->name }}
                            exams
                        </span></a></li>
            @endforeach
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
