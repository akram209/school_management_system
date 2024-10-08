@extends('layouts.app')
@section('title', 'Send Permissions')
@section('title of sidebar', 'Settings')
<style>
    .container {
        position: absolute;
        top: 10%;
        left: 25%;
        width: 50% !important;
        border: 1px solid rgb(187, 183, 183);
        border-radius: 10px;
        padding: 10px;
    }
</style>




@section('content')
    @livewire('notification-form')
    @livewire('notifications')
@endsection
