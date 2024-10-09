@extends('layouts.app')
@section('title', 'Edit Student')
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
        <h3 style="text-align: center"> Edit Student</h3>
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif

        <form class="row g-3" method="POST" action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                @error('first_name')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="first_name" class="form-control" id="inputCity" placeholder="first name"
                        style="width: 100%" title="first name" value="{{ old('first_name', $student->user->first_name) }}">
                </div>
                @error('last_name')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="last_name" class="form-control" id="inputCity" placeholder="last name"
                        style="width: 100%" title="first name" value="{{ old('last_name', $student->user->last_name) }}">
                </div>
            </div>

            <div class="row g-3">
                @error('email')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="email" name="email" class="form-control" id="inputCity" placeholder="email"
                        style="width: 100%" title="email" value="{{ old('email', $student->user->email) }}">
                </div>
                @error('password')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="password" name="password" class="form-control" id="inputCity" placeholder="password"
                        style="width: 100%" title="password" value="{{ old('password') }}">
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
                        <option value="male" {{ old('gender', $student->user->gender) == 'male' ? 'selected' : '' }}>male
                        </option>
                        <option value="female" {{ old('gender', $student->user->gender) == 'female' ? 'selected' : '' }}>
                            female</option>
                    </select>
                </div>
                @error('class_id')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <select class="form-select" name="class_id" aria-label="Default select example"
                        style="height: 50px; margin-left: -3px; margin-top: -5px" title="class">
                        <option selected disabled hidden>classes</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}"
                                {{ old('class_id', $student->class_id) == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="row g-3">
                @error('image')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="file" name="image" class="form-control" id="inputCity" placeholder="image" </div>

                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary" style="width: 100%">save</button>
                </div>
        </form>
    </div>
@endsection
