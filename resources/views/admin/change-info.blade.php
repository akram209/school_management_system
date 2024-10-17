@extends('layouts.app')
@section('title', 'change info')
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
</style>




@section('content')
    <div class="container" style="position: absolute; top: 20%; left: 10%">
        <h3 style="text-align: center">Update Info</h3>
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif

        <form class="row g-3" method="POST" action="{{ route('admin.update-change-info') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">

                @error('first_name')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="first_name" class="form-control" id="inputCity" placeholder="first name"
                        style="width: 100%" title="first name" value="{{ old('first_name', Auth::user()->first_name) }}">
                </div>
                @error('last_name')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="last_name" class="form-control" id="inputCity" placeholder="last name"
                        style="width: 100%" title="first name" value="{{ old('last_name', Auth::user()->last_name) }}">
                </div>
            </div>




            <div class="row g-3">
                @error('gender')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <select class="form-select" name="gender" aria-label="Default select example"
                        style="height: 50px; margin-left: -3px; margin-top: -5px" title="gender">
                        <option selected disabled hidden>gender</option>
                        <option value="male" @if (old('gender', Auth::user()->gender) == 'male') selected @endif>male</option>
                        <option value="female" @if (old('gender', Auth::user()->gender) == 'female') selected @endif>female</option>
                    </select>
                </div>

            </div>


            <div class="row g-3">
                @error('image')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="file" name="image" class="form-control" id="inputCity" placeholder="image"
                        style="width: 100%" title="image">
                </div>

            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="width: 100%">save</button>
            </div>
        </form>
    </div>
@endsection
