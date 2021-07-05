@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <a class="pb-5" href="{{ route('admin.posts.index') }}">Torna alla home</a>
</div>
                


    <div class="card" style="width: 18rem;">
         <img src="{{ asset('img\unnamed.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->detagli}}</p>
            <p class="card-text">{{$post->name}}</p>
            <p class="card-text">{{$post->motivo}}</p>
            <a href="{{route("posts.show", $post->id)}}" class="btn btn-primary">Dettagli</a>
            @include('partials.components.deleteBtn', ["id" => $post->id])
            
        </div>
    </div>
    

@endsection
