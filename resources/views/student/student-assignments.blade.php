@extends('layouts.app')
@section('title', 'Assignments')
@section('title of sidebar', 'Settings')
<style>
    input[type="file"] {
        display: none;

    }

    .fa-solid {
        cursor: pointer;
        width: 25%;
        font-size: 30px;
        border-radius: 10px;
    }

    .fa-solid:hover {
        color: rgb(100, 100, 100);
        background-color: rgb(255, 250, 250);
    }

    .modal {
        position: absolute !important;
        z-index: 1050 !important;
        height: 35vh !important;
        width: 30vw !important;
        overflow: hidden !important;
        left: 25% !important;
        border-radius: 10px !important;
        background-color: rgba(255, 255, 255, 0) !important;

        /* Bootstrap's default z-index for modals */
    }

    /* Optional: Center modal vertically */
    .modal-dialog {

        align-items: center !important;
        height: 100vh;
        width: 200vw !important;

    }

    .modal-content {
        width: 100%;
        left: 20% !important;
        bottom: 10px !important;


    }


    /* Optional: Adjust modal backdrop if needed */
    .modal-backdrop {
        z-index: 1040 !important;
        /* Ensure the backdrop is below the modal */
    }

    .modal-body {

        height: 100%;
        width: 100%;
    }
</style>

@section('content')
    @if ($assignments->count() > 0)
        @if (session('success'))
            <div class="alert alert-success"
                style="text-align: center;position: absolute; width: 60%; height: 50px; top: 6%; left: 20%">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger"
                style="text-align: center;position: absolute; width: 60%; height: 50px; top: 6%; left: 20%">
                {{ session('error') }}
            </div>
        @endif
        @if ($upcoming)
            <div class="card" style="width: 50rem; margin: auto;   margin-bottom: 2%; top: 100px !important">
                <h5 class="card-title" style="text-align: center"> Upcoming Assignments</h5>

            </div>

            {{-- Loop through upcoming exams --}}
            @foreach ($assignments as $key => $assignment)
                @if (\Carbon\Carbon::parse($assignment->deadline)->gte(now()))
                    <!-- Check for upcoming exams -->
                    <div class="card" style="width: 50rem; margin: auto;   margin-bottom: 10%;  top: 100px !important">
                        <div class="card-header">
                            {{ $assignment->title }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $assignment->subject->name }}</h5>
                            <p class="card-text" style="text-align: left"> Description: {{ $assignment->description }}</p>
                            <p class="card-text" style="text-align: left">Type: {{ $assignment->type }}</p>
                            @if ($assignment->type == 'online')
                                @if ($student[$key]->pivot->path !== null)
                                    <a style="text-align: left; float: top ; margin-left: 5px"
                                        href="{{ route('assignment.view', ['assignment' => $assignment->id, 'student' => $student[$key]->pivot->student_id]) }}"
                                        target="_blank">
                                        <i class="fa-regular fa-file-pdf"></i>
                                    </a>
                                    <a class="text-danger" style="text-align: left; float: right; margin-right: 95%;"
                                        href="#" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $assignment->id }}-{{ $student[$key]->pivot->student_id }}">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>

                                    {{-- Delete Modal --}}
                                    <div class="modal fade"
                                        id="deleteModal{{ $assignment->id }}-{{ $student[$key]->pivot->student_id }}"
                                        tabindex="10" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-body">
                                                    Are you sure you want to delete this assignment for the student?
                                                </div>
                                                <div class="modal-footer">
                                                    <form
                                                        action="{{ route('assignment.delete', ['assignment' => $assignment->id, 'student' => $student[$key]->pivot->student_id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="card-text" style="float: top">
                                        <div id="fileUpload{{ $assignment->id }}">
                                            <form
                                                action="{{ route('assignment.upload', [$student[$key]->pivot->student_id, $assignment->id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <input type="file" id="assignmentFile{{ $assignment->id }}"
                                                    name="assignmentFile" onchange="showButtons({{ $assignment->id }})"
                                                    aria-label="Upload Assignment" required>

                                                <!-- Clicking the icon will trigger the file input -->
                                                <i id="file{{ $assignment->id }}" class="fa-solid fa-cloud-arrow-up"
                                                    aria-hidden="true"
                                                    onclick="document.getElementById('assignmentFile{{ $assignment->id }}').click();"></i>

                                                @error('assignmentFile')
                                                    <span style="width: 100%;" class="alert alert-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror

                                                <!-- Buttons are hidden initially -->
                                                <div id="buttons{{ $assignment->id }}" style="display: none;">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="cancelUpload({{ $assignment->id }})">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </span>
                                @endif
                            @endif
                            <p class="card-text" style="text-align: left"> Deadline: {{ $assignment->deadline }}</p>
                            <div class="btn-group" style="float: right">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-expanded="false">
                                    mark
                                </button>
                                <ul class="dropdown-menu">
                                    @if ($student[$key] && $student[$key]->pivot->score !== null)
                                        <li style="text-align: center;">
                                            {{ $student[$key]->pivot->score }}/{{ $assignment->mark }}</li>
                                    @else
                                        <li style="text-align: center;"> not marked</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif

        @if ($past)
            <div class="card" style="width: 50rem; margin: auto;   margin-bottom: 2%; top: 50px !important">
                <h5 class="card-title" style="text-align: center"> Past Assignments</h5>

            </div>

            {{-- Loop through past exams --}}
            @foreach ($assignments as $key => $assignment)
                @if (\Carbon\Carbon::parse($assignment->deadline)->lt(now()))
                    <!-- Check for past exams -->
                    <div class="card" style="width: 50rem; margin: auto; top: 50px; margin-bottom: 5%">
                        <div class="card-header">
                            {{ $assignment->title }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $assignment->subject->name }}</h5>
                            <p class="card-text" style="text-align: left"> Description: {{ $assignment->description }}</p>
                            <p class="card-text" style="text-align: left">Type: {{ $assignment->type }}</p>

                            <p class="card-text" style="text-align: left"> Deadline: {{ $assignment->deadline }}</p>

                            <div class="btn-group" style="float: right">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-expanded="false">
                                    mark
                                </button>
                                <ul class="dropdown-menu">
                                    @if ($student[$key] && $student[$key]->pivot->score !== null)
                                        <li style="text-align: center;">
                                            {{ $student[$key]->pivot->score }}/{{ $assignment->mark }}</li>
                                    @else
                                        <li style="text-align: center;"> not marked</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @else
        <div class="accordion accordion-flush" id="accordionFlushExample"
            style="position: fixed !important; top: 20% !important; width: 80%; left: 10% ; border: 2px solid  #dee2e6;">
            <div class="accordion-item">
                <h3 style="text-align: center; background-color: #dee2e6">Your Assignments</h3>
                <p style="text-align: center">No Assignments Found</p>
            </div>
        </div>
    @endif




@endsection
