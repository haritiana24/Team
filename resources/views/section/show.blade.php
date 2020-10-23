@extends('layouts.app')
@section('extra-js')
    <script>
        function toggleSousection(id) {
            let element = document.getElementById('replyCard-'+id)
            element.classList.toggle('d-none')
        }
    </script>
@endsection
@section('content')
    @if (isset($titleSection))
        <div class="container">
        <div class="row">
            <div class="col-md-2">
                 @include("includes.sedbar")
            </div>
                <div class="col-md-10">
                    <h1 class="card-title"> Liste de  contenue de  {{ isset($titleSection) ? $titleSection->name : ""}}</h1>
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Contenue</th>
                            <th>Description</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($sections)
                        @if (isset($sections->titlesection_id) && $sections->titlesection_id == 1)
                            <tr>
                                <td>{{$sections->id}}</td>
                                <td>{{$sections->titre}}</td>
                                <td>{{$sections->contenue}}</td>
                                <td>{{$sections->description}}</td>
                                <td>
                                    <img src="{{asset('storage') . '/' . $sections->image}}" alt="" width="100" height="100">
                                </td>
                                <td>
                                    <a href="{{route('section.edit', $sections->id)}}" class="btn btn-success">Modifie le section</a>
                                     <form action="{{route('section.destroy', $sections->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger my-3">Supprimer</button>
                                    </form>
                                </td>
                            </tr>

                            @else
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{$section->id}}</td>
                                        <td>{{$section->titre}}</td>
                                        <td>{{$section->contenue}}</td>
                                        <td>{{$section->description}}</td>
                                        <td>
                                            <img src="{{asset('storage') . '/' . $section->image}}" alt="" width="100" height="100">
                                        </td>
                                        <td>
                                            <a href="{{route('section.edit', $section->id)}}" class="btn btn-success">Modifie la section</a>
                                             <form action="{{route('section.destroy', $section->id)}}" method="post">
                                                 @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger my-3">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        @endif
                        @endif
                    </tbody>
                </table>

                <div class="row my-3">
                    <div class="col-md-6">
                        <a href="{{route('sousection.create', $titleSection->id)}}" class="btn btn-primary">Créer une sous  setion de  {{$titleSection->name}}</a>
                    </div>
                    <div class="co-md-6">
                        <button class="btn btn-info" onclick="toggleSousection({{$titleSection->id}})">Afficher la  sous section </button>
                    </div>
                </div>

                <div class="card d-none" id="replyCard-{{$titleSection->id}}">
                    <div class="card-body">
                    <h1 class="card-title"> Liste de  Sous contenue  de {{$titleSection->name}}</h1>
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
                            <tr>
                                @foreach ($titleSection->sousections as $sous)
                                    <td>{{$sous->id}}</td>
                                    <td>{{$sous->title}}</td>
                                    <td>{{$sous->content}}</td>
                                    <td>
                                        <img src="{{asset('storage') . '/' . $sous->image}}" alt="" width="100" height="100">
                                    </td>
                                    <td>
                                        <a href="{{route('sousection.edit', $sous->id)}}" class="btn btn-success">Modifer la sous section</a>
                                        <form action="{{route('sousection.destroy', $sous->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger my-3">Supprimer</button>
                                        </form>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @else
    <h1 class="alert alert-danger">The data is empty</h1>
    @endif

@endsection
