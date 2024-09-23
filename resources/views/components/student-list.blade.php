<ul>
    <li>
        <a href="#">
            {{-- class name by class id in student  --}}
            <i class="fa-solid fa-people-roof"></i> <span class="nav-text">
                @if ($student->class)
                    {{ $student->class->name }}
                @endif
            </span>
        </a>
        <ul>
            {{-- student by class id in student --}}
            <li><a href="{{ route('student.class', $student->id) }}"><i class="fa-solid fa-users"></i><span> your
                        class info
                    </span></a></li>

        </ul>
    </li>

    <li>
        <a href="{{ route('student.parents', $student->id) }}">
            {{-- parent by student id  --}}
            <i class="fa-solid fa-person-breastfeeding"></i>
            <span class="nav-text">Your Parents</span>
        </a>
        <ul>

        </ul>
    </li>

    <li>
        <a href="{{ route('student.subjects', $student->id) }}">
            {{-- All subjects  --}}
            <i class="fa-solid fa-book"></i>
            <span class="nav-text">Subjects</span>
        </a>
        <ul>

        </ul>
    </li>
    <li>
        <a href="#">
            {{-- exams by class id  split to past and upcoming  --}}
            <i class="fa-solid fa-clipboard-list"></i> <span class="nav-text">Exams</span>
        </a>
        <ul>

        </ul>
    </li>
    <li>
        <a href="#">
            {{-- assignment by class id  split to past and present and form for online   --}}
            <i class="fa-solid fa-file-import"></i> <span class="nav-text">Assignments</span>
        </a>
        <ul>

        </ul>
    </li>

    <li>
        <a href="{{ route('student.attendences', $student->id) }}">
            {{-- assignment by student id   --}}
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
                {{-- fee by student id   --}}

                <a> <i class="fa-solid fa-credit-card"></i><span> {{ $student->fee->status }}</span></a>
            </li>
        </ul>

    </li>
    <li>
        <a href="#">
            <i class="fa-solid fa-gears"></i>
            <span class="nav-text">privacy settings</span>
        </a>
        <ul>
            {{-- user id --}}
            <li><a href=""> <i class="fa-regular fa-file-lines"></i><span>change
                        your info</span></a></li>
            <li><a href="all-professors.html"><i class="fa-solid fa-key"></i><span>change
                        password</span> </a></li>
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
