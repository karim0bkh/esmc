@extends('layouts.app')
@section('content')
    <head>
        <style>
            .cont {
            }
        </style>

    </head>
    <body >
    <div class="container" style="max-width: 700px;">
        <h1>Candidate ({{$application->name}}) :  </h1>
        <h6 style="color: red ;">Eligible : send an email to complete the needed documents.</h6>
        <h6 style="color: red ;">Non-Eligible : send a rejection email to the condidat.</h6>
        <br>
        <form action="{{ url('application') }}" method="POST" style="max-width:">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <label>Course :</label>
            <input style=" max-width: 300px;" type="text" name="name" value="{{$application->applied}}" class="form-control" disabled />
            <label>Full Name :</label>
            <input style=" max-width: 300px;" type="text" name="name" value="{{$application->name}}" class="form-control" disabled />
            <label>Address :</label>
            <input style=" max-width: 300px;" type="text" name="address" value="{{$application->address}}" class="form-control" disabled />
            <label>City :</label>
            <input style=" max-width: 300px;" type="text" name="city" value="{{$application->city}}" class="form-control" disabled />
            <label>Birth Date :</label>
            <input style=" max-width: 300px;" type="date" name="bdate" value="{{$application->bdate}}" class="form-control" disabled />
            <label>Phone : :</label>
            <input style=" max-width: 300px;" type="text" name="phone" value="{{$application->phone}}" class="form-control" disabled />

            <br>
            <textarea rows="4" cols="50" style="resize: none; white-space: pre-line ; "  disabled >
                {{$application->acd}}
            </textarea>
            <br>
            <textarea rows="4" cols="50" style="resize: none; white-space: pre-line ;" id="acd" disabled>
                {{$application->pro}}
            </textarea>
            <br>
            <br>
            @if (Route::is('addmission_view'))

            <a href="/accepter/{{$application->id}}" class="btn btn-outline-success btn-block">eligible</a>
            <a href="/refuser/{{$application->id}}" class="btn btn-outline-danger btn-block">non-eligible</a>
            @elseif (Route::is('addmission_view_ac'))
                <a href="/accepter" class="btn btn-outline-dark btn-block">retour</a>
            @else
                <a href="/refuser" class="btn btn-outline-dark btn-block">retour</a>
            @endif

        </form>
    </div>

    </body>
    <!-- JavaScript -->
    </html>
@endsection
