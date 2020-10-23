@extends('layouts.app')
@section('title', "S'enregister")
@section('content')
<div class="container">
    <div class="col-md-2">
        @include('includes.sedbar')
    </div>
    <div class="col-md-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{$admin->user }}</div>
                    <div class="card-body">
                        <h1>{{$admin->user}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
