@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include("includes.sedbar")
        </div>
        <div class="col-md-10">
            <h1 class="text-center">Gérer le footer</h1>
            <form action="{{route('footer.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Ajouter une titre">
                    @error('title')
                    <div class="invalid-feedback">
                        {{$errors->first('title')}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea  name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Ajouter une titre"> </textarea>
                    @error('content')
                    <div class="invalid-feedback">
                        {{$errors->first('content')}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror">
                            <label class="custom-file-label">Selectioner l'image</label>
                            @error('image')
                            <div class="invalid-feedback">
                                {{$errors->first('image')}}
                            </div>
                            @enderror
                        </div>
                </div>
                <button class="btn btn-primary">crée</button>
            </form>
        </div>
    </div>
</div>

@endsection
