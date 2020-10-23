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
                     <h1 class="text-center"> Céer  la sous  section {{$titlesection->name}}</h1>
                    <form action="{{route('sousection.store', $titlesection->id)}}" method="post" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                             <label >Titre</label>
                             <input name="title" type="text" placeholder="Ajoteur une titre" class="form-control @error('title') is-invalid @enderror">
                             @error('title')
                                <div class="invalid-feedback">
                                    {{$errors->first('title')}}
                                </div>
                             @enderror
                         </div>
                         <div class="form-group">
                             <label >Contenue</label>
                             <textarea name="content" type="text" placeholder="Ajoteur la contenue" class="form-control @error('content') @enderror"></textarea>
                             @error('content')
                                <div class="invalid-feedback">
                                    {{$errors->first('content')}}
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
                         <button class="btn btn-primary">Céeer</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
