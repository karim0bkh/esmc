@extends('layouts.app')
@section('content')
<head>
<style>
    .cont {
    }
</style>
</head>
<body>
<div class="container" style="max-width: 700px;">
    <h1>Postulez ({{$application->name}}) :  </h1>
    <h6 style="color: red ;">PS : vous recevrez un e-mail avec vos résultats d'admission pour nous fournir le document nécessaire pour terminer votre candidature !</h6>
    <br>
    @php
        $url = url()->previous();
        $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
    @endphp


@if($route == 'formations_show')
        <form action="{{ route('application', $application->id) }}" method="POST" style="max-width:">
            @else
                <form action="{{ route('application2', $application->id) }}" method="POST" style="max-width:">
                    @endif        @csrf
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
        <label>Full Name :</label>
        <input style=" max-width: 300px;" type="text" name="name" placeholder="Enter full name..." class="form-control" />
        <label>Address :</label>
        <input style=" max-width: 300px;" type="text" name="address" placeholder="Enter address..." class="form-control" />
        <label>City :</label>
        <input style=" max-width: 300px;" type="text" name="city" placeholder="Enter city..." class="form-control" />
        <label>Birth Date :</label>
        <input style=" max-width: 300px;" type="date" name="bdate" placeholder="Enter birth date..." class="form-control" />
        <label>Phone : :</label>
        <input style=" max-width: 300px;" type="text" name="phone" placeholder="Enter phone..." class="form-control" />

        <br>
        <table class="table table-bordered" id="dynamicAddRemove1" style="max-width: 600px ;">
            <tr>
                <th>Academic carreer</th>
                <th>ADD</th>
            </tr>
            <tr >
                <td><input type="text" name="addMoreInputFields1[0][acd]" placeholder="Enter subject" class="form-control" />
                </td>
                <td><button type="button" name="add" id="dynamic-ar1" class="btn btn-outline-primary">Add Subject</button></td>
            </tr>
        </table>
        <table class="table table-bordered" id="dynamicAddRemove2" style="max-width: 600px ;">
            <tr>
                <th>professional carreer</th>
                <th>ADD</th>
            </tr>
            <tr>
                <td><input type="text" name="addMoreInputFields2[0][pro]" placeholder="Enter subject" class="form-control" />
                </td>
                <td><button type="button" name="add" id="dynamic-ar2" class="btn btn-outline-primary">Add Subject</button></td>
            </tr>
        </table>

        <button type="submit" class="btn btn-outline-success btn-block">Save</button>
    </form>
</div>

</body>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar1").click(function () {
        ++i;
        $("#dynamicAddRemove1").append('<tr><td><input type="text" name="addMoreInputFields1[' + i +
            '][acd]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
    var j = 0;
    $("#dynamic-ar2").click(function () {
        ++j;
        $("#dynamicAddRemove2").append('<tr><td><input type="text" name="addMoreInputFields2[' + i +
            '][pro]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
</html>
@endsection
