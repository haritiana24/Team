@extends('layouts.app')
@section('title', "S'enregister")
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifer mes informations</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profiles.update' , $user) }}" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Déscription</label>
                                <textarea id="name" type="text" class="form-control @error('description') is-invalid @enderror" name="description"  autocomplete="description" autofocus> {{old('description') ?? $user->profile->description }}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="form-group">
                                <label for="url">Url</label>
                                <input id="name" type="text" class="form-control @error('url') is-invalid @enderror" name="url"  autocomplete="url" autofocus value="{{old('url') ?? $user->profile->url }}">

                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" id="validateCustomFile" name="image" class="custom-file-input @error('image') is-invalid @enderror">
                                    <label class="custom-file-label" for="validateCustomFile">Choisir une image</label>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Modifier mes informations</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
