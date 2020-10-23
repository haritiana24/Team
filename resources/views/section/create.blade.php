@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @extends("includes.sedbar")
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                            <h1 class="card-title text-center">Créer  une nouvelle section sur {{$header->titleSection->name}}</h1>
                        <form action="{{route('section.store', $header->titleSection->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Ajouter une titre </label>
                                <input name="titre" type="text" placeholder="Titre..." class="form-control @error('titre') is-invalid @enderror">
                                @error('titre')
                                    <div class="invalid-feedback">
                                        {{$errors->first('titre')}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ajouter une contenue </label>
                                <textarea name="contenue" class="form-control @error('contenue') is-invalid @enderror" rows="10" col="20" placeholder="Contenue"></textarea>
                                @error('contenue')
                                    <div class="invalid-feedback">
                                        {{$errors->first('contenue')}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="description"  placeholder="Déscription..." class="form-control @error('description') is-invalid @enderror">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{$errors->first('description')}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror">
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
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="0">Hors ligne</option>
                                    <option value="1">En ligne</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{$errors->first('status')}}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary">Céer la setion </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

