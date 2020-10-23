@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-2">
            @include("includes.sedbar")
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">

                    @if($titlesection)
                        <a href="{{route('sousection.create', $titlesection->id)}}" class="btn btn-primary">Crée une sous section</a>
                        <a href="{{route('section.index')}}" class="btn">Annuler</a>
                        @else
                        <h1 class="text-center"> Sous section </h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
