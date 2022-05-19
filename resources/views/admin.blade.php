@extends('layouts.side')

@section('cont')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1>Welcome {{ Auth::user()->name }} !!</h1>
                        {{ __('You are logged in as admin!') }}
                        <img src="../imgs/bg3.png" class="rounded mx-auto d-block mt-5 " alt="Responsive image" height="350" width="350">

                        <button type="submit" class="btn btn-block btn-danger" style="margin-left: 290px ; margin-top: 50px ; ">Edit profile</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
