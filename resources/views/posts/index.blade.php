@extends('layouts.app')

@section('content')
   <div class="container">
       @foreach($post as $item)
           <h1>{{$item->title}}</h1>
           <p>{{$item->content}}</p>
       @endforeach
           {{$post->links()}}
   </div>
@endsection
