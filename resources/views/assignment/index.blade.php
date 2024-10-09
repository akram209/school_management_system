@extends('layouts.app')
@section('title', 'Assignments')
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
    <table class="table mb-5 align-middle bg-white ">
        <thead class="bg-light">
            <tr>

                <th style="padding-left: 5% ">Assignment Id</th>
                <th style=" padding-left:5%">Class</th>
                <th style=" padding-left:5%">Subject</th>
                <th>Title</th>
                <th>mark</th>
                <th>Deadline</th>
                <th style="padding-left: 5%">Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->id }}</td>
                    <td>{{ $assignment->class->name }}</td>
                    <td>{{ $assignment->subject->name }}</td>
                    <td>{{ $assignment->title }}</td>
                    <td>{{ $assignment->mark }}</td>
                    <td style="padding-right:  3%">{{ $assignment->deadline }}</td>
                    <td>{{ $assignment->type }}</td>

                    <td>
                        <div class="dropdown">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('assignment.edit', $assignment->id) }}">edit</a>
                                </li>
                                <li>
                                    <form action="{{ route('assignment.destroy', $assignment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">delete</button>
                                    </form>
                                </li>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('assignment.show', $assignment->id) }}">view</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
