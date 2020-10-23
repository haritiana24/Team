@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @extends("includes.sedbar")
            </div>
            <div class="col-md-10">
                <h1 class="text-center">Créer  une nouvelle items</h1>
                <form action="{{route('header.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Inseree une nouvelle item</label>
                        <input type="text" name="items" class="form-control @error('items') is-invalid @enderror" placeholder="Ajouter une items ...">
                        @error('items')
                        <div class="invalid-feedback">
                            {{$errors->first('items')}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Valider</button>
                </form>
            </div>
        </div>
    </div>

@endsection

