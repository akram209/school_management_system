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
        margin: 8px;
        font-size: 30px;
        border-radius: 10px;
    }

    #imageIcon:hover {
        color: rgb(100, 100, 100);
        background-color: rgb(255, 255, 255);
    }

    input[type="search"] {
        margin-top: -15px
    }
</style>

@section('content')
    @if (session('success'))
        <div class="alert alert-success text-center"
            style="position: absolute !important; top: 50px !important; width: 60%; left: 20% ; padding: 10px !important;  border: 2px solid  #dee2e6;">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger text-center"
            style="position: absolute !important; top: 50px !important; width: 60%; left: 20% ; padding: 10px !important;  border: 2px solid  #dee2e6;">
            {{ session('error') }}
        </div>
    @endif

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
                            <a href="{{ route('teacher.edit-assignment', [$teacher->id, $assignment->id]) }}"
                                class="btn btn-warning" style="float: right; margin-left: 10px">edit</a>
                            <form action="{{ route('assignment.destroy', $assignment->id) }}" method="POST"
                                style="float: right">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> delete</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $assignment->subject->name }}</h5>
                            <p class="card-text" style="text-align: left"> Description: {{ $assignment->description }}</p>
                            <p class="card-text" style="text-align: left">Type: {{ $assignment->type }}</p>
                            <p class="card-text" style="text-align: left"> Deadline: {{ $assignment->deadline }}</p>
                @endif


                </div>
                </div>
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
                            <a href="{{ route('teacher.edit-assignment', [$teacher->id, $assignment->id]) }}"
                                class="btn btn-warning" style="float: right; margin-left: 10px">edit</a>
                            <form action="{{ route('assignment.destroy', $assignment->id) }}" method="POST"
                                style="float: right">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> delete</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $assignment->subject->name }}</h5>
                            <p class="card-text" style="text-align: left"> Description: {{ $assignment->description }}</p>
                            <p class="card-text" style="text-align: left">Type: {{ $assignment->type }}</p>

                            <p class="card-text" style="text-align: left"> Deadline: {{ $assignment->deadline }}</p>

                            <a href="{{ route('assignment.set-score', $assignment->id) }}" class="btn btn-primary"
                                style="float: right">set score</a>
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
