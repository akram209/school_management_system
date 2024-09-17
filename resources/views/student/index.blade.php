@extends('layouts.app')
@section('title', 'Students')
@section('title of sidebar', 'Settings')

{{-- @section('card-body')
    <div class="profile-card-body">
        <p>Student ID</p>
        <p>Full Name</p>
        <p>Email</p>
        <p>Gender</p>
        <p>Class</p>
        <p>Join Date</p>



    </div>
    </div>
@endsection --}}
@section('content')
    <table class="table align-middle mb-4 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Profile</th>
                <th>Email</th>
                <th>User ID</th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Fee</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />

                    </div>
                </td>
                <td>
                    example@example.com

                </td>
                <td>
                    2023001
                </td>
                <td>
                    1001
                </td>
                <td>
                    John Smith
                </td>
                <td>
                    paid
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm btn-rounded">
                        show
                    </button>
                    <button type="button" class="btn btn-success btn-sm btn-rounded">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-rounded">
                        Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />

                    </div>
                </td>
                <td>
                    example@example.com

                </td>
                <td>
                    2023001
                </td>
                <td>
                    1001
                </td>
                <td>
                    John Smith
                </td>
                <td>
                    paid
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm btn-rounded">
                        show
                    </button>
                    <button type="button" class="btn btn-success btn-sm btn-rounded">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-rounded">
                        Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />

                    </div>
                </td>
                <td>
                    example@example.com

                </td>
                <td>
                    2023001
                </td>
                <td>
                    1001
                </td>
                <td>
                    John Smith
                </td>
                <td>
                    paid
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm btn-rounded">
                        show
                    </button>
                    <button type="button" class="btn btn-success btn-sm btn-rounded">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-rounded">
                        Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />

                    </div>
                </td>
                <td>
                    example@example.com

                </td>
                <td>
                    2023001
                </td>
                <td>
                    1001
                </td>
                <td>
                    John Smith
                </td>
                <td>
                    paid
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm btn-rounded">
                        show
                    </button>
                    <button type="button" class="btn btn-success btn-sm btn-rounded">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-rounded">
                        Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />

                    </div>
                </td>
                <td>
                    example@example.com

                </td>
                <td>
                    2023002
                </td>
                <td>
                    1002
                </td>
                <td>
                    Sarah Johnson
                </td>
                <td>
                    paid
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm btn-rounded">
                        show
                    </button>
                    <button type="button" class="btn btn-success btn-sm btn-rounded">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-rounded">
                        Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/3.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />

                    </div>
                </td>
                <td>
                    example@example.com

                </td>
                <td>
                    2023003
                </td>
                <td>
                    1003
                </td>
                <td>
                    Michael Brown
                </td>
                <td>
                    unpaid
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm btn-rounded">
                        show
                    </button>
                    <button type="button" class="btn btn-success btn-sm btn-rounded">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-rounded">
                        Delete
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="student-number">
        <div class="teacher-subject-header">
            <h3>Students number</h3>

        </div>
        <div>
            <p>300</p>
            <h5 style="display: inline-block ; margin-right: 50px; margin-left: 30px">40 males </h5>
            <h5 style="display: inline-block">260 females </h5>
        </div>

        <div class="teacher-subject-body">

        </div>

    </div>
    <div class="new-student-number">
        <div class="teacher-subject-header">
            <h3>New students number</h3>

        </div>
        <div>
            <p>10</p>
            <h5 style="display: inline-block ; margin-right: 50px; margin-left: 30px">5 males </h5>
            <h5 style="display: inline-block">5 females </h5>
        </div>

        <div class="teacher-subject-body">

        </div>

    </div>
@endsection
