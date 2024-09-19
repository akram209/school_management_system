@extends('layouts.app')
@section('title', 'Students')
@section('title of sidebar', 'Settings')


@section('content')
    <style>
        #footer {
            position: absolute !important;
            width: 80% !important;
            height: 27% !important;
            left: 10% !important;
            top: 95% !important;
        }
    </style>
    <form class="d-flex" role="search" id="search-teacher">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

    </form>
    <h3 id="teacher-list">
        Teacher List
    </h3>
    <table class="table align-middle mb-4 bg-white"
        style=" position: absolute !important; width: 80% !important; height: 30% !important; left: 10% !important; top: 15% !important ">
        <thead class="bg-light">
            <tr>
                <th style="padding-right: 100px !important ">Profile</th>
                <th>Email</th>
                <th>Teacher ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>subject</th>
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
                <td>example@example.com</td>
                <td>1001</td>
                <td>John Smith</td>
                <td>Male</td>
                <td>Grade 10</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>


            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>

                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1003</td>
                <td>Michael Brown</td>
                <td>Male</td>
                <td>Grade 9</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/3.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1004</td>
                <td>Emily Davis</td>
                <td>Female</td>
                <td>Grade 12</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/4.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1005</td>
                <td>James Wilson</td>
                <td>Male</td>
                <td>Grade 10</td>

            </tr>
        </tbody>

    </table>
    <form class="d-flex" role="search" id="search-student">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    </form>
    <h3 id="student-list">
        Student List
    </h3>



    <table class="table align-middle mb-4 bg-white"
        style=" position: absolute !important; width: 80% !important; height: 30% !important; left: 10% !important; top: 55% !important ">
        <thead class="bg-light">
            <tr>
                <th style="padding-right: 100px !important ">Profile</th>
                <th>Email</th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Class</th>
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
                <td>example@example.com</td>
                <td>1001</td>
                <td>John Smith</td>
                <td>Male</td>
                <td>Grade 10</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>


            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>

                <td>1002</td>
                <td>Sarah Johnson</td>
                <td>Female</td>
                <td>Grade 11</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1003</td>
                <td>Michael Brown</td>
                <td>Male</td>
                <td>Grade 9</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/3.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1004</td>
                <td>Emily Davis</td>
                <td>Female</td>
                <td>Grade 12</td>

            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/4.jpg" alt="Student Image"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>example@example.com</td>
                <td>1005</td>
                <td>James Wilson</td>
                <td>Male</td>
                <td>Grade 10</td>

            </tr>
        </tbody>
    </table>

    <table class="table align-middle mb-4 bg-white"
        style=" position: absolute !important; width: 80% !important; height: 27% !important; left: 10% !important; top: 90% !important ; ">
        <thead class="bg-light">
            <tr>
                <th style="padding-right: 10% !important ">subject</th>
                <th style="padding-right: 100% !important ">teacher</th>
                <th style="padding-right: 15% !important ">description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Math</td>
                <td>Mr. John Doe</td>
                <td style="width: 50%">Mathematics is the study of numbers, quantities, and shapes. It
                    is a science .</td>
            </tr>
            <tr>
            <tr>
                <td>Math</td>
                <td>Mr. John Doe</td>
                <td style="width: 50%">Mathematics is the study of numbers, quantities, and shapes. It is a science
                    .</td>
            </tr>

            <tr>
            <tr>
                <td>Math</td>
                <td>Mr. John Doe</td>
                <td style="width: 50%">Mathematics is the study of numbers, quantities, and shapes. It is a science
                    .</td>
            </tr>

            <tr>
                <td>Math</td>
                <td>Mr. John Doe</td>
                <td style="width: 50%">Mathematics is the study of numbers, quantities, and shapes. It is a science
                    .</td>
            </tr>
            <tr>
                <td>Math</td>
                <td>Mr. John Doe</td>
                <td style="width: 50%">Mathematics is the study of numbers, quantities, and shapes. It is a science
                    .</td>
            </tr>
            <tr>
                <td>Math</td>
                <td>Mr. John Doe</td>
                <td style="width: 50%">Mathematics is the study of numbers, quantities, and shapes. It is a science
                    .</td>
            </tr>



        </tbody>
    </table>
    <div id="footer">

    </div>
@endsection
