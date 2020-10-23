@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @extends("includes.sedbar")
            </div>
            <div class="col-md-10">
            <h1 class="text-center">Modifier la content de {{$footer->title}}</h1>
                <form action="{{route('footer.update', $footer->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?? $footer->title}}">
                         @error('title')
                            <div class="invalid-feedback">
                                {{$errors->first('title')}}
                            </div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10" col="30" >{{old('content') ?? $footer->content}}</textarea>
                         @error('content')
                            <div class="invalid-feedback">
                                {{$errors->first('content')}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" value="{{old('image') ?? $footer->image}}">
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

@endsection

