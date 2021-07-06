@extends('layouts.app')

@section('content')

    <h1>post con loggin  </h1>


<div class="row justify-content-center">
        <a class="pb-5" href="{{ route('posts.index') }}">post publici</a>
    <a class=" " href="{{ route('admin.posts.index') }}">Torna alla home</a>
</div>
<div class="row justify-content-center">
    <a class=" " href="{{ route('admin.posts.create') }}">crea nuovo post</a>
</div>



<div class="row justify-content-center">


    @foreach($posts as $post)
  
    <div class="card" style="width: 18rem;">
          <img src="{{ asset('img\unnamed.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->detagli}}</p>
            <p class="card-text">{{$post->name}}</p>
            <p class="card-text">{{$post->motivo}}</p>
            <p class="card-text">{{$post->user->email}}</p>
            <p class="card-text">{{$post->category ? $post->category->name : '--' }}</p>

            
            <a href="{{route("admin.posts.show", $post->id)}}" class="btn btn-primary">Dettagli</a>
            <a href="{{route("admin.posts.edit", $post->id)}}" class="btn btn-primary">edit</a>



        </div>
    </div>
    @endforeach


</div>

@endsection
