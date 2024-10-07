@extends('layouts.app')
@section('title', 'Classes')
@section('title of sidebar', 'Dashboard')


@section('content')
    <style>
        .table {
            width: 80% !important;
            left: 10% !important;
            top: 15% !important;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2) !important;
        }

        td:nth-child(6) {
            width: 120px !important;
        }

        input[type="search"] {
            margin-top: -15px
        }
    </style>
    @livewire('class-list')
@endsection
