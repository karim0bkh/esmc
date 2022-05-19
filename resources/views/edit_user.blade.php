    @extends('layouts.app')
@section('content')
    <style>

        .push-top {
            margin-top: 50px;
            max-width: 500px;
        }
    </style>
    <div class="card push-top container">
        <div class="card-header">
            Edit & Update
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
            <form method="post" action="{{ route('edit_profile3', $student->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $student->name }}"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $student->email }}"/>
                </div>
                <div class="form-group">
                    <label for="phone">Type</label>
                    <input type="tel" class="form-control" name="phone" value="{{ $student->type }}" disabled/>
                </div>
             <!--   <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" value="{{$student->password}}"/>
                </div>-->
                <br>
                <button type="submit" class="btn btn-block btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection
