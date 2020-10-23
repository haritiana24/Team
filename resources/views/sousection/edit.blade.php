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
                    <h1 class="text-center">  Modifier {{$sousection->title}}</h1>
                    <form action="{{route('sousection.update', $sousection->id)}}" method="post" enctype="multipart/form-data">
                         @csrf
                         @method('PATCH')
                         <div class="form-group">
                             <label >Titre</label>
                            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?? $sousection->title}}">
                             @error('title')
                                <div class="invalid-feedback">
                                    {{$errors->first('title')}}
                                </div>
                             @enderror
                         </div>
                         <div class="form-group">
                             <label >Contenue</label>
                            <textarea name="content" type="text" class="form-control @error('content') @enderror">{{old('content') ?? $sousection->content}}</textarea>
                             @error('content')
                                <div class="invalid-feedback">
                                    {{$errors->first('content')}}
                                </div>
                             @enderror
                         </div>
                         <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" value="{{old('image') ?? $sousection->image}}">
                                    <label class="custom-file-label" for="inputGroupFile01">Selectioner l'image</label>
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{$errors->first('image')}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                         <button class="btn btn-success">Modifier</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
