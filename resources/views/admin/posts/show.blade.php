@extends('layouts.app')

@section('content')

<h1>Paggina unica</h1>

   <div class="pb-5 row justify-content-center">
         <a class="mr-5 btn btn-primary" href="{{ route('posts.index') }}">post publici</a>
         
        <a class="mr-5 btn btn-primary " href="{{ route('admin.posts.create') }}">crea nuovo post</a>
        <a class="mr-5 btn btn-primary" href="{{ route('admin.tags.index') }}">tags</a>
</div>
    
                

    <div class="card" style="width: 18rem;">

            @if($post->cover_url)
                <img src="{{ asset('storage/'. $post->cover_url) }}" class="card-img-top" alt="...">
            @endif
                    
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->detagli}}</p>
            <p class="card-text">name-- {{$post->user->name}} <br> email--{{$post->user->email}} </p>
            <p class="card-text">{{$post->motivo}} </p> 
            <p class="card-text">{{$post->category ? $post->category->name : '--' }}</p>

        <div class="row"> 
            <a  title="edit" href="{{route("admin.posts.edit", $post->id)}}" class="mr-2 btn btn-outline-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a href="">  @include('partials.components.deleteBtn', ["id" => $post->id])</a>
        </div>
          
            <br>
            @foreach($post->tags as $tag)
               <span class="badge badge-secondary">{{$tag->name}}</span> 
            @endforeach


            
        </div>
    </div>
    

@endsection
