@extends('layouts.app')
@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="push-top" >
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div class="container" style="max-width: 950px; text-align: center;">
            <div class="row">
                <div class="col-sm-2"></div>
        <table class="table" style="border: #1a1e21">
            <thead>
            <tr class="table-warning">
                <td>Creation Time</td>
                <td>status</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Course</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $students)
                <tr>
                    <td>{{$students->created_at}}</td>
                    @if($students->status == 0)
                        <td style="color: black ;font-weight: bold	;">pending</td>
                    @elseif($students->status == 1)
                        <td style="color: green ;font-weight: bold	;">accepted</td>
                    @else
                        <td style="color: red; font-weight: bold	;">refused</td>
                    @endif
                    <td>{{$students->name}}</td>
                    <td>{{$students->email}}</td>
                    <td>{{$students->phone}}</td>
                    <td>{{$students->applied}}</td>
                    <td class="text-center">
                        <a href="{{ route('my-applications2', $students->id)}}" class="btn btn-primary btn-sm">View</a>
                                         </td>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <!--
        You can use Tailwind CSS Pagination as like here:
        {!! $applications->withQueryString()->links() !!}
                -->

                {!! $applications->withQueryString()->links('pagination::bootstrap-5') !!}
                <div class="col-sm-2"></div>

            </div>
        </div>
    </div>

        <div>
@endsection
