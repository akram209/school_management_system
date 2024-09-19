@extends('layouts.app')
@section('title', 'Students')
@section('title of sidebar', 'Settings')


@section('content')
    <style>
        .table {
            top: 20% !important;
            width: 70% !important;
            left: 15% !important;
        }

        td:nth-child(6) {
            width: 120px !important;
        }
    </style>
    <div class="attendence-info">
        <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form>
        <input type="date" id="date" name="date" class="form-control">
    </div>
    <table class="table align-middle mb-4 bg-white">
        <thead class="bg-light">
            <tr>
                <th style="padding-right: 10% !important "> attendent</th>
                <th>Profile</th>
                <th>Email</th>
                <th>User ID</th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Fee</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                            style="border: black 1px solid !important">
                    </div>
                </td>
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

            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                            style="border: black 1px solid !important">
                    </div>
                </td>
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

            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value=""
                            id="flexCheckDefault"style="border: black 1px solid !important">
                    </div>
                </td>
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

            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value=""
                            id="flexCheckDefault"style="border: black 1px solid !important">
                    </div>
                </td>
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

            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value=""
                            id="flexCheckDefault"style="border: black 1px solid !important">
                    </div>
                </td>
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

            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value=""
                            id="flexCheckDefault"style="border: black 1px solid !important">
                    </div>
                </td>
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

            </tr>
        </tbody>
    </table>
    <div class="d-grid gap-2 " style="position: absolute ; bottom: 30px ; right: 30% ;width: 40%">
        <button class="btn btn-primary" type="button">save</button>
    </div>

@endsection
