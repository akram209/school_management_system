@extends('layouts.app')
@section('title', 'Exams')
@section('title of sidebar', 'Settings')


<style>
    input[type="search"] {
        margin-top: -5px;
    }
</style>

@section('content')

    @if ($exams->count() > 0)
        @if (session('success'))
            <div class="alert alert-success text-center"
                style="position: absolute !important; top: 50px !important; width: 60%; left: 20% ; padding: 10px !important;  border: 2px solid  #dee2e6;">
                {{ session('success') }}
            </div>
        @endif
        @if ($upcoming)
            <div class="card" style="width: 50rem; margin: auto;   margin-bottom: 2%; top: 100px !important">
                <h5 class="card-title" style="text-align: center"> Upcoming Exams</h5>

            </div>


            {{-- Loop through upcoming exams --}}
            @foreach ($exams as $key => $exam)
                @if (\Carbon\Carbon::parse($exam->date)->gte(now()))
                    <!-- Check for upcoming exams -->
                    <div class="card" style="width: 50rem; margin: auto;   margin-bottom: 10%;  top: 100px !important">
                        <div class="card-header">
                            {{ $exam->title }}
                            <a href="{{ route('teacher.edit-exam', [$teacher->id, $exam->id]) }}" class="btn btn-warning"
                                style="float: right; margin-left: 10px">edit</a>
                            <form action="{{ route('exam.destroy', $exam->id) }}" method="POST" style="float: right">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> delete</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $exam->subject->name }}</h5>
                            <p class="card-text" style="text-align: left"> Description: {{ $exam->description }}</p>
                            <p class="card-text" style="text-align: left">Type: {{ $exam->type }}</p>
                            <p class="card-text" style="text-align: left"> Date: {{ $exam->date }}</p>

                        </div>
                    </div>
                @endif
            @endforeach
        @endif

        @if ($past)
            <div class="card" style="width: 50rem; margin: auto;   margin-bottom: 2%; top: 50px !important">
                <h5 class="card-title" style="text-align: center"> Past Exams</h5>

            </div>

            {{-- Loop through past exams --}}
            @foreach ($exams as $key => $exam)
                @if (\Carbon\Carbon::parse($exam->date)->lt(now()))
                    <!-- Check for past exams -->
                    <div class="card" style="width: 50rem; margin: auto; top: 50px; margin-bottom: 5%">
                        <div class="card-header">
                            {{ $exam->title }}
                            <a href="{{ route('teacher.edit-exam', [$teacher->id, $exam->id]) }}" class="btn btn-warning"
                                style="float: right; margin-left: 10px">edit</a>
                            <form action="{{ route('exam.destroy', $exam->id) }}" method="POST" style="float: right">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> delete</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $exam->subject->name }}</h5>
                            <p class="card-text" style="text-align: left"> Description: {{ $exam->description }}</p>
                            <p class="card-text" style="text-align: left">Type: {{ $exam->type }}</p>
                            <p class="card-text" style="text-align: left"> Date: {{ $exam->date }}</p>
                            <a href="{{ route('exam.set-score', $exam->id) }}" class="btn btn-primary"
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
                <h3 style="text-align: center; background-color: #dee2e6">Your Exams</h3>
                <p style="text-align: center">No Exams Found</p>
            </div>
        </div>
    @endif




@endsection
