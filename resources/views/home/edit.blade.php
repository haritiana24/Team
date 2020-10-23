@extends('layouts.app')
@section('title', "S'enregister")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('includes.sedbar')
        </div>
        <div class="col-md-10">
            <form action="{{route('home.update', $admin)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" name="user" class="form-control @error('user') is-invalid @enderror" value="{{$admin->user}}">

                    @error('user')
                        <div class="invalid-feedback">
                            {{$errors->first('user')}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{$admin->description}}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{$errors->first('description')}}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
