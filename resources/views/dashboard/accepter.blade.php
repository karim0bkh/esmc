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
                @if($students->status == 1)

                    <tr>
                        <td>{{$students->id}}</td>
                        <td>{{$students->applied}}</td>
                        <td>{{$students->name}}</td>
                        <td>{{$students->email}}</td>
                        <td>{{$students->phone}}</td>
                        <td>{{$students->bdate}}</td>
                        <td class="text-center">
                            <a href="/addmission/accepter/{{$students->id}}/send-email" class="btn btn-success btn-sm">envoyer mail</a>
                            <a href="/addmission/accepter/{{$students->id}}/pdf" class="btn btn-danger btn-sm">PDF</a>
                            <a href="/addmission/accepter/{{$students->id}}" class="btn btn-primary btn-sm">See application</a>
                        </td>
                    </tr>
                @endif

            @endforeach
            </tbody>
        </table>

        <div>
@endsection
