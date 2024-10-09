@extends('layouts.app')
@section('title', 'Send Notifications')
@section('title of sidebar', 'Dashboard')
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
    <div>
        <div class="container" style="position: absolute;">
            <h3 style="text-align: center">Send Notifications</h3>

            @if (session('success'))
                <div class="alert alert-success" style="text-align: center">
                    {{ session('success') }}
                </div>
            @endif




            <form class="row g-3" method="POST" action="{{ route('admin.notification.store') }}">
                @csrf
                <div class="row g-3">
                    <!-- Display validation errors -->
                    @error('email')
                        <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                    @enderror

                    <!-- Email input field -->

                    <div class="col">
                        <input type="email" name="email" class="form-control" id="inputAddress" placeholder="email"
                            style="width: 100%" title="email">

                    </div>
                    @error('title')
                        <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                    @enderror
                    <div class="col">
                        <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title"
                            style="width: 100%" title="title">
                    </div>


                </div>

                <div class="row g-3">
                    @error('type')
                        <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                    @enderror
                    <!-- type input field -->

                    <div class="col">
                        <select class="form-select" name="type" aria-label="Default select example"
                            style="height: 50px; margin-left: -5px" title="type">
                            <option selected disabled hidden>type</option>
                            <option value="information">information
                            </option>
                            <option value="warning">warning
                            </option>
                            <option value="danger">danger
                            </option>
                        </select>
                    </div>
                </div>
                <!-- Body input field -->
                @error('body')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="row g-3">

                    <div class="col">
                        <input type="textarea" name="body" class="form-control" id="inputAddress" placeholder="Body"
                            style="width: 100%" title="body">
                    </div>

                    <div class="row g-3">
                        <!-- Submit button -->
                        <div class="col">

                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
