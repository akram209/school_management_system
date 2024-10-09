@extends('layouts.app')
@section('title', 'Students')
@section('title of sidebar', 'Dashboard')


@section('content')
    <style>
        .table {
            top: 18% !important;
            width: 70% !important;
            left: 15% !important;
        }

        td:nth-child(6) {
            width: 120px !important;
        }

        input[type="search"] {
            margin-top: -15px
        }
    </style>
    @livewire('admin-student-attendence')


@endsection
