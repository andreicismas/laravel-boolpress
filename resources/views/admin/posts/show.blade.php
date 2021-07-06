@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <a class="pb-5" href="{{ route('admin.posts.index') }}">Torna alla home</a>
        <a class="pb-5" href="{{ route('admin.posts.create') }}">crea post</a>
    </div>
    
                

    <div class="card" style="width: 18rem;">
         <img src="{{ asset('img\unnamed.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->detagli}}</p>
            
            <p class="card-text">name-- {{$post->user->name}} <br> email--{{$post->user->email}} </p>
            <p class="card-text">{{$post->motivo}}</p>
            <p class="card-text">{{$post->category ? $post->category->name : '--' }}</p>
             


            <a href="{{route("admin.posts.edit", $post->id)}}" class="btn btn-primary">modifica</a>


            @include('partials.components.deleteBtn', ["id" => $post->id])
            
        </div>
    </div>
    

@endsection
