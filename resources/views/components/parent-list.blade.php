<ul>
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
            {{-- students fee by with students.fee --}}
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
