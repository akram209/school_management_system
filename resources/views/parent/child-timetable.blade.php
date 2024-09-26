@extends('layouts.app')
@section('title', 'Child Timetable')
@section('title of sidebar', 'Settings')
<style>
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
        padding: 1rem !important;
        border-top: 1px solid #dee2e6;
    }

    .table-bordered {
        height: 47% !important;
        width: 80% !important;
        left: 10% !important;
        top: 13% !important;
    }
</style>




@section('content')


    <div class="container">
        <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Time
                        </th>
                        <th class="text-uppercase">Sunday</th>
                        <th class="text-uppercase">Monday</th>
                        <th class="text-uppercase">Tuesday</th>
                        <th class="text-uppercase">Wednesday</th>
                        <th class="text-uppercase" style="width: 17.7% !important">Thursday</th>

                    </tr>
                </thead>
                <tbody>
                    @if ($student->class)
                        @foreach ($student->class->timetable as $time)
                            <tr>
                                <td>{{ $time->start_time }}-{{ $time->end_time }}</td>

                                <td class="{{ $time->day_name == 'sunday' ? '' : 'bg-light-gray' }}">
                                    @if ($time->day_name == 'sunday')
                                        <span
                                            class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">{{ $time->subject->name }}</span>
                                        <div class="margin-10px-top font-size14">{{ $time->date }}</div>
        </div>
        <div class="font-size13 text-light-gray">
            {{ $time->teacher->first_name . ' ' . $time->teacher->last_name }}</div>
        @endif
        </td>
        <td class="{{ $time->day_name == 'monday' ? '' : 'bg-light-gray' }}">
            @if ($time->day_name == 'monday')
                <span
                    class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">{{ $time->subject->name }}</span>
                <div class="margin-10px-top font-size14">{{ $time->date }}
                </div>
                <div class="font-size13 text-light-gray">
                    {{ $time->teacher->first_name . ' ' . $time->teacher->last_name }}</div>
            @endif
        </td>
        <td class="{{ $time->day_name == 'tuesday' ? '' : 'bg-light-gray' }}">
            @if ($time->day_name == 'tuesday')
                <span
                    class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">{{ $time->subject->name }}</span>
                <div class="margin-10px-top font-size14">{{ $time->date }}
                </div>
                <div class="font-size13 text-light-gray">
                    {{ $time->teacher->first_name . ' ' . $time->teacher->last_name }}</div>
            @endif
        </td>
        <td class="{{ $time->day_name == 'wednesday' ? '' : 'bg-light-gray' }}">
            @if ($time->day_name == 'wednesday')
                <span
                    class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">{{ $time->subject->name }}</span>
                <div class="margin-10px-top font-size14">{{ $time->date }}
                </div>
                <div class="font-size13 text-light-gray">
                    {{ $time->teacher->first_name . ' ' . $time->teacher->last_name }}</div>
            @endif
        </td>
        <td class="{{ $time->day_name == 'thursday' ? '' : 'bg-light-gray' }}">
            @if ($time->day_name == 'thursday')
                <span
                    class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">{{ $time->subject->name }}</span>
                <div class="margin-10px-top font-size14">{{ $time->date }}
                </div>
                <div class="font-size13 text-light-gray">
                    {{ $time->teacher->first_name . ' ' . $time->teacher->last_name }}</div>
            @endif
        </td>

        </tr>
        @endforeach
        @endif

        </tbody>
        </table>
    </div>
    </div>
@endsection
