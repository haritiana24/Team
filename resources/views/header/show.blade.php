@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @extends("includes.sedbar")
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3">
                        <h1 class="text-center">{{$header->items}}</h1>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-primary" href="{{route("header.edit", $header)}}">Modifier</a>
                    </div>
                    <div class="col-md-3">
                        <form action="{{route('header.destroy' , $header)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

