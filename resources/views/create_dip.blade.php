@extends('layouts.side')
@section('cont')

    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ESMC</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

<div class="card push-top">
    <div class="card-header">
        Add User
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <form method="post" action="/diplomes/store" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                <label for="image">image</label>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                <label for="desc">desc</label>
                <input type="text" class="form-control" name="desc"/>
            </div>
            <div class="form-group">
                <label for="prof">prof</label>
                <input type="text" class="form-control" name="prof"/>
            </div>
            <div class="form-group">
                <label for="prof">price</label>
                <input type="text" class="form-control" name="price"/>
            </div>
            <div class="form-group">
                <label for="prof">details</label>
                <textarea  type="text" class="form-control" name="details"> </textarea>
            </div>

            <div class="form-group">
                <label for="datee">date</label>
                <input type="date" class="form-control" name="datee"/>
            </div>
            <br>
            <button type="submit" class="btn btn-block btn-danger">ajouter diplome</button>
        </form>
    </div>
</div>
</body>
</html>
@endsection
