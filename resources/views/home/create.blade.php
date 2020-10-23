@extends('layouts.app')
@section('title', "S'enregister")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        @include('includes.sedbar')
    </div>
    <div class="col-md-10">
        <form action="{{route('home.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label > Name </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                @error('name')
                    <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label > Usename </label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="User name">
                @error('name')
                <div class="invalid-feedback">{{$errors->first('username')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                @error('email')
                <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label > Password </label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password user">
                @error('password')
                <div class="invalid-feedback">{{$errors->first('password')}}</div>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label > Password </label>
                <select name="role_id" class="custom-select">
                    <option value="admin">Admin</option>
                    <option value="redacteur">Redactuer</option>
                </select>
                @error('role_id')
                <div class="invalid-feedback">{{$errors->first('role_id')}}</div>
                @enderror
            </div> --}}
            <button class="btn btn-primary">Créer</button>
        </form>
    </div>
    </div>
</div>
@endsection
