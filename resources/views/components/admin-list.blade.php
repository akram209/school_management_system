@if ($admin)
    <ul>


        <li>
            <a href="{{ route('class.index') }}">

                <i class="fa-solid fa-people-roof"></i> <span class="nav-text">
                    Classes
                </span>
            </a>

        </li>
        <li>
            <a href="{{ route('subject.index') }}">

                <i class="fa-solid fa-book"></i> <span class="nav-text">
                    Subjects
                </span>
            </a>


        </li>
        <li>
            <a href="#">

                <i class="fa-solid fa-chalkboard-user"></i> <span class="nav-text">
                    Teachers
                </span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('teacher.create') }}">
                        <i class="fa-solid fa-plus"></i> <span>Add Teacher</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('teacher.index') }}">
                        <i class="fa-solid fa-border-all"></i> <span>All Teachers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.teacher.assign') }}">
                        <i class="fa-solid fa-border-all"></i> <span>Classes and Subject</span>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="#">

                <i class="fa-solid fa-graduation-cap"></i></i> <span class="nav-text">

                    Students
                </span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('student.create') }}">
                        <i class="fa-solid fa-plus"></i> <span>Add Student</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('student.index') }}">
                        <i class="fa-solid fa-border-all"></i> <span>All Students</span>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="#">

                <i class="fa-solid fa-person-breastfeeding"></i> <span class="nav-text">

                    Parents
                </span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('parent.create') }}">
                        <i class="fa-solid fa-plus"></i> <span>Add Parent</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('parent.index') }}">
                        <i class="fa-solid fa-border-all"></i> <span>All Parents</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.parent.assign') }}">
                        <i class="fa-solid fa-border-all"></i> <span> assign children</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">

                <i class="fa-solid fa-people-roof"></i> <span class="nav-text">
                    Exams
                </span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('exam.create') }}">
                        <i class="fa-solid fa-plus"></i> <span>Add Exams</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('exam.index') }}">
                        <i class="fa-solid fa-border-all"></i> <span>All Exams</span>
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="#">

                <i class="fa-solid fa-file-import"></i> <span class="nav-text">
                    Assignments
                </span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('assignment.create') }}">
                        <i class="fa-solid fa-plus"></i> <span>Add Assignment</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('assignment.index') }}">
                        <i class="fa-solid fa-border-all"></i> <span>All Assignments</span>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href=" {{ route('admin.permissions') }}">

                <i class="fa-solid fa-hand"></i><span class="nav-text">
                    Permissions
                </span>
            </a>
            <ul>


            </ul>
        </li>
        <li>
            <a href="{{ route('admin.students-attendence') }}">
                <i class="fa-solid fa-clipboard-user"></i><span class="nav-text">Student Attendance</span>
            </a>
            <ul>


            </ul>
        </li>
        <li>
            <a href="{{ route('admin.teachers-attendence') }}">
                <i class="fa-solid fa-clipboard-user"></i><span class="nav-text"> Teacher Attendance</span>
            </a>
            <ul>

            </ul>

        </li>
        <li>
            <a href="#">

                <i class="fa-solid fa-calendar-days"></i> <span class="nav-text">
                    Timetable
                </span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('timetable.create') }}">
                        <i class="fa-solid fa-plus"></i> <span>Add Timetable</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('timetable.index') }}">
                        <i class="fa-solid fa-border-all"></i> <span>All Timetables</span>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="#">

                <i class="fa-regular fa-envelope"></i> <span class="nav-text">
                    Notification
                </span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.notification.create') }}">
                        <i class="fa-solid fa-plus"></i> <span>Add Notification</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.notification.index') }}">
                        <i class="fa-solid fa-border-all"></i> <span>All Notifications</span>
                    </a>
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
@endif
