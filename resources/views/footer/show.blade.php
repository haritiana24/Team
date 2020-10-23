@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                 @include("includes.sedbar")
            </div>
            <div class="col-md-10">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Contenue</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($footer))
                            <tr>
                                <td>{{$footer->id}}</td>
                                <td>{{$footer->title}}</td>
                                <td>{{$footer->content}}</td>
                                <td>
                                    <img src="{{asset('storage') . '/' . $footer->image}}" alt="" width="100" height="100">
                                </td>
                                <td>
                                    <a href="{{route('footer.edit', $footer->id)}}" class="btn btn-success">Modifie le section</a>
                                    <form action="{{route('footer.destroy', $footer->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger lg my-3">Supprimer</button>
                                    </form>
                                </td>
                            </tr> 
                        @endif 
                    </tbody>
                </table>
                        
            </div>
        </div>
    </div>

@endsection