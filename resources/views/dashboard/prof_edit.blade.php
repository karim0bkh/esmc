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
        <form method="post" action="{{ route('front_view_update', $element->id) }}" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                <label for="image">image</label>
                <input type="file" name="image" value="{{$element->image}}">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{$element->name}}"/>
            </div>
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" name="title" value="{{$element->title}}"/>
            </div>
            <div class="form-group">
                <label for="prof">Text</label>
                <textarea  type="text" class="form-control" name="desc"> {{$element->desc}} </textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-block btn-success">update</button>
        </form>
    </div>
</div>
</body>
</html>
@endsection
