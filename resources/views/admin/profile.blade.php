@extends('layouts.app')
@section('title', 'dashboard')
@section('title of sidebar', 'Dashboard')
{{-- <style>
    .table-bordered thead td,
    .table-bordered thead th {
        border-bottom-width: 2px;
        padding: 10px !important;

    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #dee2e6;

    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #dee2e6;
    }

    .tabl td,
    .table th {
        padding: .5rem !important;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table {
        position: fixed !important;
        width: 50% !important;
        height: 40% !important;
        top: 50% !important;
        left: 20% !important;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
</style> --}}

<div class="profile-card" style="height: 70vh">
    <div class="profile-card-header">
        @if ($user->image)
            <img src="{{ asset('storage/images/' . $user->image) }}" alt="profile"
                class="profile-card-header-profile-img">
        @else
            <img src="{{ asset('build/assets/images/profile.jpg') }}" alt="profile"
                class="profile-card-header-profile-img">
        @endif
    </div>
    <hr>
    <div class="profile-card-body">
        <p> Full Name: {{ $user->first_name }} {{ $user->last_name }}</p>
        <p> Gender: {{ $user->gender }}</p>
        <p> Join Date: {{ $user->created_at->format('d/m/Y') }}</p>
    </div>
</div>
