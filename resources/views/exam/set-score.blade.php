@extends('layouts.app')
@section('title', 'Set Score')
@section('title of sidebar', 'Settings')


@section('content')
    <style>
        .table {
            top: 18% !important;
            width: 70% !important;
            left: 15% !important;
        }

        td:nth-child(6) {
            width: 120px !important;
        }
    </style>
    <div class="attendence-info">

        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form>
    </div>
    <table class="table align-middle mb-4 bg-white">
        <thead class="bg-light">
            <tr>
                <th style="padding-right: 8% !important ">Profile</th>
                <th>Email</th>
                <th style="padding-left: 5% ">Student ID</th>
                <th>Full Name</th>

                <th>score</th>



            </tr>
        </thead>
        <tbody>
            @foreach ($students as $key => $student)
                <tr>

                    <td>
                        <div class="d-flex align-items-center">
                            <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                                style="width: 45px; height: 45px" class="rounded-circle" />

                        </div>
                    </td>
                    <td>
                        {{ $student->user->email }}

                    </td>

                    <td>
                        {{ $student->id }}
                    </td>
                    <td>
                        {{ $student->user->first_name . ' ' . $student->user->last_name }}
                    </td>

                    <td style="padding-left: 7% ">
                        <input type="number" id="score{{ $student->id }}" name="score{{ $student->id }}"
                            value="{{ old('score' . $student->id, $student->pivot->score) }}" min="0"
                            max="{{ $exam->mark }}" class="form-control" style="width: 100px">
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-grid gap-2 " style="position: absolute ; bottom: 30px ; right: 30% ;width: 40%">
        <button class="btn btn-primary" type="button">save</button>
    </div>

@endsection
