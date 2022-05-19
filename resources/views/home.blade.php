@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <h1>Welcome {{ Auth::user()->name }} !!</h1>
                        <img src="../imgs/bg3.png" class="rounded mx-auto d-block mt-5 " alt="Responsive image" height="350" width="350">
                        <a class="btn btn-primary" style="margin-left: 280px ; margin-top: 20px ; " href="/my-applications/{{ encrypt(Auth::user()->id) }}">See my applications</a>
                        <form action="/edit_user" method="">
                        <button type="submit" class="btn btn-block btn-danger" style="margin-left: 310px ; margin-top: 20px ; ">Edit profile</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
