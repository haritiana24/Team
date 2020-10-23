@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @extends("includes.sedbar")
            </div>
            <div class="col-md-10">
            <h1 class="text-center">Modifier la contenue de {{$section->titre}}</h1>
                <form action="{{route('section.update', $section->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input name="titre" type="text" class="form-control @error('titre') is-invalid @enderror" value="{{old('titre') ?? $section->titre}}">
                         @error('titre')
                            <div class="invalid-feedback">
                                {{$errors->first('titre')}}
                            </div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <textarea name="contenue" class="form-control @error('contenue') is-invalid @enderror" rows="10" col="30" >{{old('contenue') ?? $section->contenue}}</textarea>
                         @error('contenue')
                            <div class="invalid-feedback">
                                {{$errors->first('contenue')}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="description"  placeholder="Déscription..." class="form-control @error('description') is-invalid @enderror" value="{{old('description') ?? $section->description}}">
                         @error('description')
                            <div class="invalid-feedback">
                                {{$errors->first('description')}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" value="{{old('image') ?? $section->image}}">
                            <label class="custom-file-label" for="inputGroupFile01">Selectioner l'image</label>
                            @error('image')
                            <div class="invalid-feedback">
                                {{$errors->first('image')}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Mettre en ligne</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" value="{{old('status') ?? $section->status}}">
                            <option value="0">Hors ligne</option>
                            <option value="1">En ligne</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{$errors->first('status')}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Modifier</button>
                </form>
            </div>
        </div>
    </div>

@endsection

