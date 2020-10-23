@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @extends("includes.sedbar")
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="text-center">Barre de navigation (section)  </h1>
                        <ul>
                            @foreach($header as $item)
                                <li><a href="{{route('header.show', $item->id)}}">{{$item->items}}</a></li>
                            @endforeach
                        </ul>
                        <a href="{{route("header.create")}}" class="btn btn-primary">Crée une  section</a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('logo.create')}}" class="btn btn-success">Ajouter une logo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

