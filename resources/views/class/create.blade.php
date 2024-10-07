@extends('layouts.app')
@section('title', 'Create Class')
@section('title of sidebar', 'Settings')
<style>
    .container {
        position: absolute;
        top: 20%;
        left: 35%;
        border: 1px solid rgb(187, 183, 183);
        border-radius: 10px;
        padding: 10px;
    }
</style>




@section('content')
    <div class="container" style="position: absolute; width: 30%">
        <h3 style="text-align: center">Create Class</h3>
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif

        <form class="row g-3" method="POST" action="{{ route('class.store') }}">
            @csrf
            <div class="row g-3">
                @error('name')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col-12"></div>
                <input type="text" name="name" class="form-control" id="inputAddress" placeholder="Class Name"
                    style="width: 100%" title="description">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="width: 100%">save</button>
            </div>
        </form>
    </div>
@endsection
