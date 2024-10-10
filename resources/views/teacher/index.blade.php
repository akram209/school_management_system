@extends('layouts.app')
@section('title', ' Teachers')
@section('title of sidebar', 'Dashboard')
@section('content')
    <style>
        .table {
            width: 90% !important;
            left: 5% !important;
            top: 15% !important;
            height: 80vh !important;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2) !important;
        }

        td:nth-child(6) {
            width: 120px !important;
        }

        input[type="search"] {
            margin-top: -15px
        }
    </style>
    <div style="position: absolute; top: 40px; left: 40%">
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <table class="table align-middle mb-5 bg-white ">
        <thead class="bg-light">
            <tr>
                <th>Profile</th>
                <th style="padding-left: 5% ">Teacher Id</th>
                <th style=" padding-left:5%">Full Name</th>
                <th style=" padding-left:5%">gender</th>
                <th>status</th>
                <th>email</th>
                <th style="padding-left: 5%">experience</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($teachers as $teacher)
                <tr>
                    <td style=" padding-top: 0px ; padding-right: 10%; padding-bottom: 20px ">
                        <a href="{{ route('teacher.profile', $teacher->user_id) }}">
                            @if ($teacher->user->image != null)
                                <img src="{{ asset('storage/' . $teacher->user->image) }}" alt="" width="60">
                            @else
                                <img src="{{ asset('build/assets/images/profile.jpg') }}" alt="profile"
                                    class="profile-card-header-profile-img">
                            @endif
                        </a>
                    </td>


                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->user->first_name . ' ' . $teacher->user->last_name }}</td>
                    <td>{{ $teacher->user->gender }}</td>
                    <td style="padding-right:  3%">{{ $teacher->status }}</td>
                    <td>{{ $teacher->user->email }}</td>
                    <td style="padding-left:10%">{{ $teacher->experience_years }}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('teacher.edit', $teacher->id) }}">edit</a>
                                </li>
                                <li>
                                    <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">delete</button>
                                    </form>
                                </li>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('teacher.show', $teacher->id) }}">view</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
