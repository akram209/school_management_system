@extends('layouts.app')
@section('title', 'Your Subjects')
@section('title of sidebar', 'Settings')
<style>
    input[type="search"] {
        margin-top: -5px;
    }
</style>


@section('content')
    @if (count($subjects) > 0)
        <div class="accordion accordion-flush" id="accordionFlushExample"
            style="position: fixed !important; top: 10% !important; width: 80%; left: 10% ; border: 2px solid  #dee2e6; ">
            <div class="accordion-item">
                <h3 style="text-align: center; background-color: #dee2e6">Subjects</h3>
                @foreach ($subjects as $key => $subject)
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false"
                            aria-controls="flush-collapse{{ $key }}">
                            {{ $subject->name }}
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p> Teacher Name : {{ $subject->teachers[0]->user->first_name }}
                                {{ $subject->teachers[0]->user->last_name }}</p>
                            @if ($subject->teachers[0]->user->image)
                                <img src="{{ asset('storage/images/' . $subject->teachers[0]->user->image) }}"
                                    style="width: 50px !important; height: 50px !important" alt="">
                            @else
                                <img src="{{ asset('build/assets/images/profile.jpg') }}"
                                    style="width: 50px !important; height: 50px !important" alt="">
                            @endif
                            <p>Description : {{ $subject->description }}</p>



                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="accordion accordion-flush" id="accordionFlushExample"
            style="position: fixed !important; top: 20% !important; width: 80%; left: 10% ; border: 2px solid  #dee2e6; ">
            <div class="accordion-item">
                <h3 style="text-align: center; background-color: #dee2e6">Your Subjects</h3>
                <p style="text-align: center">No Subjects Found</p>
            </div>
        </div>
    @endif

@endsection
