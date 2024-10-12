@extends('layouts.app')
@section('title', ' Students')
@section('title of sidebar', 'Dashboard')
@section('content')
    <style>
        .table {
            width: 90% !important;
            left: 5% !important;
            top: 15% !important;
            height: 80vh !important;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2) !important;
        }

        td:nth-child(6) {
            width: 120px !important;
        }

        input[type="search"] {
            margin-top: -15px
        }

        input {
            width: 300px !important;
            height: 30px !important;
            border-radius: 5px !important;
            border: 1px solid rgb(32, 90, 227)
        }

        input:focus {
            outline: none !important;
            border: 1px solid rgb(183, 204, 247) !important;

        }
    </style>
    <div style="position: absolute; top: 40px; left: 40%">
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif
    </div>
    @livewire('student-list')
@endsection
