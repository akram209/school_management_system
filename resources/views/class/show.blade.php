@extends('layouts.app')
@section('title', 'Class')
@section('title of sidebar', 'Dashboard')


@section('content')

    <style>
        input {
            width: 200px !important;
            height: 30px !important;
            border-radius: 5px !important;
            border: 1px solid rgb(32, 90, 227)
        }

        input:focus {
            outline: none !important;
            border: 1px solid rgb(183, 204, 247) !important;

        }

        table {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2) !important;
        }

        input[type="search"] {
            margin-top: -15px
        }
    </style>

    @livewire('class-teacher-list', ['classId' => $class->id])

    @livewire('class-student-list', ['classId' => $class->id])


    <div class="student-number"
        style=" position: absolute !important;
         left: 12% !important; top: 92% !important ; overflow:visible !important;height: 25vh">

        <div class="teacher-subject-header">
            <h4>Students </h4>

        </div>
        <div>
            <p>{{ $student_count }}</p>
            <h5 style="display: inline-block ;position:relative; left: 50px">
                {{ $male_students_count }} <i class="fa-solid fa-mars"></i>
            </h5>
            <h5 style="display: inline-block ;position:relative; left: 120px">
                {{ $female_students_count }} <i class="fa-solid fa-venus"> </i></h5>
        </div>

        <div class="teacher-subject-body">

        </div>

    </div>
    <div class="student-number"
        style=" position: absolute !important;
     left: 42% !important; top: 92% !important ; overflow:visible !important;height: 25vh">

        <div class="teacher-subject-header">
            <h4>Teachers </h4>

        </div>
        <div>
            <p>{{ $teacher_count }}</p>
            <h5 style="display: inline-block ;position:relative; left: 50px">
                {{ $male_teachers_count }} <i class="fa-solid fa-mars"></i>
            </h5>
            <h5 style="display: inline-block ;position:relative; left: 120px">
                {{ $female_teachers_count }} <i class="fa-solid fa-venus"> </i></h5>
        </div>

        <div class="teacher-subject-body">

        </div>

    </div>
    <div class="student-number"
        style=" position: absolute !important;
 left: 72% !important; top: 92% !important ; overflow:visible !important; height: 25vh">

        <div class="teacher-subject-header">
            <h4> Subjects </h4>

        </div>
        <div>
            <p>{{ $subject_count }}</p>

        </div>

        <div class="teacher-subject-body">

        </div>

    </div>

@endsection
