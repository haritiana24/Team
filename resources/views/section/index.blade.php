@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include("includes.sedbar")
            </div>
            <div class="col-md-10">
                <h1 class="text-center">Liste de section de la site</h1>
                <ul style="display:flex; width:150px; justify-content:space-between; list-style:none">
                    @foreach ($headers as $header)
                        <li>
                            <a href="{{route('section.show', $header->titleSection->id)}}">{{$header->titleSection->name}}</a>
                        <li/>
                          @if($header->titleSection->name === $headers[0]->items && count($header->titleSection->sections) >= 1 )
                          <button disabled="disabled" class="btn btn-danger">X</button>
                          @else 
                            <a href="{{route("section.create", $header->id)}}"class="btn btn-success">+</a> 
                          @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
