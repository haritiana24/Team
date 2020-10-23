@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @extends("includes.sedbar")
            </div>
            <div class="col-md-10">
                <form action="{{route("header.update", $header )}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" name="items"  class="form-control @error('items') is-invalid @enderror"  value="{{old('items') ?? $header->items}}">
                        @error('items')
                            <div class="invalid-feedback">
                                {{$errors->first('message')}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success"> Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection

