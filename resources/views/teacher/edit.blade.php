@extends('layouts.app')
@section('title', 'Edit Teacher')
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
        <h3 style="text-align: center">Edit Teacher</h3>
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif

        <form class="row g-3" method="POST" action="{{ route('teacher.update', $teacher->id) }}" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div class="row g-3">

                @error('first_name')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="first_name" class="form-control" id="inputCity" placeholder="first name"
                        style="width: 100%" title="first name" value="{{ old('first_name', $teacher->user->first_name) }}">
                </div>
                @error('last_name')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="last_name" class="form-control" id="inputCity" placeholder="last name"
                        style="width: 100%" title="first name" value="{{ old('last_name', $teacher->user->last_name) }}">
                </div>
            </div>

            <div class="row g-3">

                @error('email')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="email" name="email" class="form-control" id="inputCity" placeholder="email"
                        style="width: 100%" title="email" value="{{ old('email', $teacher->user->email) }}">
                </div>
                @error('password')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="password" name="password" class="form-control" id="inputCity" placeholder="password"
                        style="width: 100%" title="password">
                </div>
            </div>
            <div class="row g-3">

                @error('qualification')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="qualification" class="form-control" id="inputCity"
                        placeholder="qualification" style="width: 100%" title="qualification"
                        value="{{ old('qualification', $teacher->qualification) }}">
                </div>
            </div>

            <div class="row g-3">
                @error('gender')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <select class="form-select" name="gender" aria-label="Default select example"
                        style="height: 50px; margin-left: -3px; margin-top: -5px" title="gender"
                        value="{{ old('gender', $teacher->user->gender) }}">
                        <option selected disabled hidden>gender</option>
                        <option value="male" {{ old('gender', $teacher->user->gender) == 'male' ? 'selected' : '' }}>male
                        </option>
                        <option value="female" {{ old('gender', $teacher->user->gender) == 'female' ? 'selected' : '' }}>
                            female</option>
                    </select>
                </div>
                @error('experience_years')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="number" name="experience_years" class="form-control" id="inputCity"
                        placeholder="experience_years" style="width: 100%" title="experience_years"
                        value="{{ old('experience_years', $teacher->experience_years) }}">
                </div>
            </div>

            <div class="row g-3">
                @error('phone')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="phone" class="form-control" id="inputCity" placeholder="phone"
                        style="width: 100%" title="phone" value="{{ old('phone', $teacher->phone) }}">
                </div>
                @error('address')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="address" class="form-control" id="inputCity" placeholder="address"
                        style="width: 100%" title="address" value="{{ old('address', $teacher->address) }}">
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
                @error('salary')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="number" name="salary" class="form-control" id="inputCity" placeholder="salary"
                        style="width: 100%" title="salary" min="0"
                        value="{{ old('salary', $teacher->salary) }}">
                </div>
                @error('status')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <select class="form-select" name="status" aria-label="Default select example"
                        style="height: 50px; margin-left: -3px; margin-top: -5px" title="paid">
                        <option selected disabled hidden>paid</option>
                        <option value="paid" {{ old('status', $teacher->status) == 'paid' ? 'selected' : '' }}>paid
                        </option>
                        <option value="unpaid" {{ old('status', $teacher->status) == 'unpaid' ? 'selected' : '' }}>unpaid
                        </option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="width: 100%">update</button>
            </div>
    </div>
@endsection
