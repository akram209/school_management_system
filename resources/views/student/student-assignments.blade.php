@extends('layouts.app')
@section('title', 'Assignments')
@section('title of sidebar', 'Settings')
<style>
    input[type="file"] {
        display: none;

    }

    #imageIcon {
        cursor: pointer;
        width: 25%;
        font-size: 30px;
        border-radius: 10px;
    }

    #imageIcon:hover {
        color: rgb(100, 100, 100);
        background-color: rgb(255, 255, 255);
    }
</style>

@section('content')
    @if ($assignments->count() > 0)
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
                                    <p class="card-text" style="text-align: left; float: top">
                                        submitted successfully
                                    </p>
                                @else
                                    <span class="card-text" style=" float: top">
                                        <div id="imageDiv">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" id="image" name="image">
                                                <i id="imageIcon" class="fa-solid fa-cloud-arrow-up"></i>
                                                <p id="imageError"></p>
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
