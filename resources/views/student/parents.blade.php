@extends('layouts.app')
@section('title', 'Your Parents')
@section('title of sidebar', 'Settings')



@section('content')
    @if (count($parents) > 0)
        <div class="accordion accordion-flush" id="accordionFlushExample"
            style="position: fixed !important; top: 20% !important; width: 80%; left: 10% ; border: 2px solid  #dee2e6; ">
            <div class="accordion-item">
                <h3 style="text-align: center; background-color: #dee2e6">Your Parents</h3>
                @foreach ($parents as $key => $parent)
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false"
                            aria-controls="flush-collapse{{ $key }}">
                            {{ $parent->user->first_name }} {{ $parent->user->last_name }}
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <a href="{{ route('student.profile', $parent->user->id) }}">
                                <img src="{{ asset('storage/images/' . $parent->user->image) }}"
                                    style="width: 50px !important; height: 50px !important" alt="">
                            </a>
                            <p>Parent ID : {{ $parent->id }}</p>

                            <p>Gender : {{ $parent->user->gender }}</p>

                            <p>Join Date : {{ $parent->created_at->format('d/m/Y') }}</p>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="accordion accordion-flush" id="accordionFlushExample"
            style="position: fixed !important; top: 20% !important; width: 80%; left: 10% ; border: 2px solid  #dee2e6; ">
            <div class="accordion-item">
                <h3 style="text-align: center; background-color: #dee2e6">Your Parents</h3>
                <p style="text-align: center">No Parents Found</p>
            </div>
        </div>
    @endif

@endsection
