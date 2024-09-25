@extends('layouts.app')
@section('title', 'Parent Profile')
@section('title of sidebar', 'Settings')




<div class="profile-card">
    <div class="profile-card-header">

        <img src="{{ asset('build/assets/images/Screenshot 2024-09-11 174254.png') }}" alt="profile"
            class="profile-card-header-profile-img">
    </div>
    <hr>
    <div class="profile-card-body">
        <p>Parent ID</p>
        <p>Full Name</p>
        <p>Gender</p>
        <p>Join Date</p>

    </div>
</div>

@section('content')
    <div class="teacher-info">
        <div class="teacher-info-header">
            <h3>Contact me</h3>
        </div>

        <div class="teacher-info-body">
            <p>address :</p>
            <hr>
            <p> phone : </p>
            <hr>
            <p>Email : </p>
        </div>

    </div>
    <div class="teacher-subject">
        <div class="teacher-subject-header">
            <h3>Your Children</h3>

        </div>
        <div class="teacher-info-body">
            <p style="text-align: center">Akram Hesham</p>
            <hr>
            <p style="text-align: center">Ahmed Hesham </p>
            <hr>
            <p style="text-align: center">Ayman Hesham</p>
        </div>

        <div class="teacher-subject-body">

        </div>

    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample"
        style="position: fixed !important; top: 40% !important; width: 60%; left: 10% ; border: 2px solid  #dee2e6;">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Akram
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                    <code>.accordion-flush</code> class. This is the first item's accordion body.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Ayman
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                    <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being
                    filled with some actual content.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Ahmed
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                    <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting
                    happening here in terms of content, but just filling up the space to make it look, at least at first
                    glance, a bit more representative of how this would look in a real-world application.
                </div>
            </div>
        </div>
    </div>

@endsection
