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
                <td>Name</td>
                <td>Title</td>
                <td>Description</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($element as $formations)
                <tr>
                    <td>{{$formations->id}}</td>
                    <td>{{$formations->name}}</td>
                    <td>{{$formations->title}}</td>
                    <td>{{$formations->desc}}</td>


                    <td class="text-center">
                        <a href="{{ route('front.edit', $formations->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('front.destroy', $formations->id) }}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
            <p>Number of elements : {{$coun}}</p>
        <div>
@endsection
