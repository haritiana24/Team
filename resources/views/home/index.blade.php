@extends('layouts.app')


@section('content')
    <div id="wrapper">
		@include('includes.sedbar')
        <div id="page-content-wrapper">
            <div class="container-fluid">
				<h1>Liste des utilisateurs</h1>
                <div class="row">
					@foreach ($users as $user)
					<div class="col-md-3">
						<label for="nom">Name</label>
						({{$user->name}})
				    </div>
					<div class="col-md-4">
						<label for="nom">First Name</label>
						({{$user->username}})
					</div>
					<div class="col-md-5">
						<label for="nom">Email</label>
						({{$user->email}})
					</div>
					@endforeach  
                </div>
        </div>
    </div>
@endsection
