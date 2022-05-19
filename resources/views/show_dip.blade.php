@extends('layouts.app')
@section('content')
    <body>
    <h1 class="text-center"> {{ $diplome->name }} </h1>
    <div class="container-fluid">
        <div class="row text-center">

            <div class="col-sm-2"></div>

            <div class="col-sm-8">
                <div class="card text-center">

                    <div class="card-header">
                        <img src="../imgs/{{ $diplome->img_name }}" class="rounded mx-auto d-block mt-5 " alt="Responsive image" height="350" width="350">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $diplome->price }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Date : {{ $diplome->datee }}</h6>

                        <label><h4>Details : </h4></label>
                        <p class="card-text">{{ $diplome->details }}</p>
                    </div>
                    <div class="card-footer">
                        {{ $diplome->prof }}
                    </div>

                </div>
                @guest
                    <div class="card text-center">
                        <a href="/diplomes" class="btn btn-danger">Retour</a>
                    </div>
                @endguest
                @if(Auth::check())
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-sm-5"></div>

                            <div class="col-sm-2">
                                <br>
                                <div class="card text-center">
                                    <a href="/apply/dip/{{$diplome->id }}/{{encrypt(Auth::user()->name )}}" class="btn btn-success">apply as {{ Auth::user()->name }}</a>
                                </div>
                                <br>
                                <div class="card text-center">
                                    <a href="/diplomes" class="btn btn-danger">retour</a>
                                </div>
                                <br>
                            </div>
                            <div class="col-sm-5"></div>

                        </div>
                    </div>
                @endif

            </div>
            <div class="col-sm-2"></div>

        </div>
    </div>
    </body>


@endsection
