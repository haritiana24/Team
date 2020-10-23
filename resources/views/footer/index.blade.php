@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-2">
            @include("includes.sedbar")
        </div>
        <div class="col-md-10">
            <h1 class="text-center"> Gestion de footer </h1>
            <ul>
                @foreach ($footers as $footer)
                    <li><a href="{{route('footer.show', $footer->id)}}">{{$footer->title}}</a></li>
                @endforeach
            </ul>
        <a class="btn btn-primary" href="{{route('footer.create')}}">Ajouter une élement</a>
        </div>
    </div>
    </div>
@endsection
