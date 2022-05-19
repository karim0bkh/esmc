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
            @foreach($diplome as $diplomes)
                <tr>
                    <td>{{$diplomes->id}}</td>
                    <td>{{$diplomes->name}}</td>
                    <td>{{$diplomes->desc}}</td>
                    <td>{{$diplomes->prof}}</td>
                    <td>{{$diplomes->price}}</td>
                    <td>{{$diplomes->datee}}</td>
                    <td class="text-center">
                        <a href="{{ route('diplomes.edit', $diplomes->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('diplomes_delete', encrypt($diplomes->id)) }}" method="post" style="display: inline-block">
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
        {!! $diplome->withQueryString()->links() !!}
            -->

            {!! $diplome->withQueryString()->links('pagination::bootstrap-5') !!}
        <div>
@endsection
