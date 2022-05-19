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
        @if($application->status == 0)
            <h1 style="color: black ;font-weight: bold	;">pending</h1>
        @elseif($application->status == 1)
            <h1 style="color: green ;font-weight: bold	;">accepted</h1>
        @else
            <h1 style="color: red; font-weight: bold	;">refused</h1>
        @endif
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

                <a href="/my-applications/{{ encrypt(Auth::user()->id) }}" class="btn btn-outline-dark btn-block">retour</a>


        </form>
    </div>

    </body>
    <!-- JavaScript -->
    </html>
@endsection
