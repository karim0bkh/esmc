@extends('layouts.side')
@section('cont')

    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>Course</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Birthdate</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($formation as $students)
                @if($students->status == 0)

                    <tr>
                    <td>{{$students->id}}</td>
                        <td>{{$students->applied}}</td>
                        <td>{{$students->name}}</td>
                    <td>{{$students->email}}</td>
                    <td>{{$students->phone}}</td>
                    <td>{{$students->bdate}}</td>
                    <td class="text-center">
                        <a href="/addmission/{{$students->id}}" class="btn btn-primary btn-sm">See application</a>
                    </td>
                </tr>
                @endif

            @endforeach
            </tbody>
        </table>
        <!--
        You can use Tailwind CSS Pagination as like here:
        {!! $formation->withQueryString()->links() !!}
            -->

            {!! $formation->withQueryString()->links('pagination::bootstrap-5') !!}
        <div>
@endsection
