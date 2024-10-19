@extends('layouts.app')
@section('title', ' Timetable')
@section('title of sidebar', 'Dashboard')
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
                        <th class="text-uppercase"> Time
                        </th>
                        <th class="text-uppercase">Sunday</th>
                        <th class="text-uppercase">Monday</th>
                        <th class="text-uppercase">Tuesday</th>
                        <th class="text-uppercase">Wednesday</th>
                        <th class="text-uppercase" style="width: 17.7% !important">Thursday</th>

                    </tr>
                </thead>
                <tbody>

                    {{-- Group timetable data by start_time --}}
                    @php
                        $timetables = $timetables->groupBy('start_time');
                    @endphp

                    @foreach ($timetables as $startTime => $time)
                        <tr>
                            {{-- Show Time Period --}}
                            <td>{{ $time->first()->start_time }} - {{ $time->first()->end_time }}</td>

                            {{-- Days --}}
                            <td>
                                @if ($sunday = $time->where('day_name', 'sunday')->first())
                                    <span
                                        class="text-white bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                        {{ $sunday->subject->name }}
                                    </span>
                                    <div class="font-size15 text-gray">{{ $sunday->teacher->user->first_name }}
                                        {{ $sunday->teacher->user->last_name }}</div>
                                @else
                                    <div class="font-size15 text-gray"></div>
                                @endif
                            </td>

                            <td>
                                @if ($monday = $time->where('day_name', 'monday')->first())
                                    <span
                                        class="text-white bg-black padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                        {{ $monday->subject->name }}
                                    </span>
                                    <div class="font-size15 text-gray">{{ $monday->teacher->user->first_name }}
                                        {{ $monday->teacher->user->last_name }}</div>
                                @else
                                    <div> </div>
                                @endif
                            </td>



                            <td>
                                @if ($tuesday = $time->where('day_name', 'tuesday')->first())
                                    <span
                                        class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                        {{ $tuesday->subject->name }}
                                    </span>
                                    <div class="font-size15 text-gray">{{ $tuesday->teacher->user->first_name }}
                                        {{ $tuesday->teacher->user->last_name }}</div>
                                @else
                                    <div class="font-size15 text-gray"></div>
                                @endif
                            </td>

                            <td>
                                @if ($wednesday = $time->where('day_name', 'wednesday')->first())
                                    <span
                                        class="text-white bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                        {{ $wednesday->subject->name }}
                                    </span>
                                    <div class="font-size15 text-gray">{{ $wednesday->teacher->user->first_name }}
                                        {{ $wednesday->teacher->user->last_name }}</div>
                                @else
                                    <div class="font-size15 text-gray"></div>
                                @endif
                            </td>

                            <td>
                                @if ($thursday = $time->where('day_name', 'thursday')->first())
                                    <span
                                        class="text-white bg-blue padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                        {{ $thursday->subject->name }}
                                    </span>
                                    <div class="font-size15 text-gray">{{ $thursday->teacher->user->first_name }}
                                        {{ $thursday->teacher->user->last_name }}</div>
                                @else
                                    <div class="font-size15 text-gray"></div>
                                @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
