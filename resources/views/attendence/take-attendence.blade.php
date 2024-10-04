@extends('layouts.app')
@section('title', 'Students')
@section('title of sidebar', 'Settings')


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
    </style>
    @livewire('take-attendence', ['class' => $class, 'teacher' => $teacher])


@endsection
