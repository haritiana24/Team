@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @extends("includes.sedbar")
            </div>
            <div class="col-md-10">
                <h1 class="text-center">Créer  une nouvelle logo de la site </h1>
                <form action="{{route('logo.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="name" class="custom-file-input @error('name') is-invalid @enderror">
                            <label class="custom-file-label" for="inputGroupFile01">Selectioner l'image</label>
                            @error('name')
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary">Modifier le logo</button>
                </form>
            </div>
        </div>
    </div>

@endsection

