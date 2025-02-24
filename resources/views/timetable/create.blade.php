@extends('layouts.app')
@section('title', 'Create Timetable')
@section('title of sidebar', 'Dashboard')
<style>
    .container {
        position: absolute;
        top: 20%;
        left: 10%;
        border: 1px solid rgb(187, 183, 183);
        border-radius: 10px;
        padding: 10px;
    }

    select {
        height: 50px !important;
        margin-left: -3px !important;
    }
</style>




@section('content')
    <div class="container" style="position: absolute; top: 20%; left: 10%">
        <h3 style="text-align: center">Create Timetable</h3>
  



        @livewire('class-teacher-subject')

    </div>
@endsection
