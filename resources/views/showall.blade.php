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
                <td>Description</td>
                <td>Prof</td>
                <td>Prix</td>
                <td>Date</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($formation as $formations)
                <tr>
                    <td>{{$formations->id}}</td>
                    <td>{{$formations->name}}</td>
                    <td>{{$formations->desc}}</td>
                    <td>{{$formations->prof}}</td>
                    <td>{{$formations->price}}</td>
                    <td>{{$formations->datee}}</td>


                    <td class="text-center">
                        <a href="{{ route('formations.edit', $formations->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('formations_delete', encrypt($formations->id)) }}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <!--
        You can use Tailwind CSS Pagination as like here:
        {!! $formation->withQueryString()->links() !!}
            -->

            {!! $formation->withQueryString()->links('pagination::bootstrap-5') !!}
        <div>
@endsection
