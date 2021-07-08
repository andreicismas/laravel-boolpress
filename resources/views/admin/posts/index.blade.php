@extends('layouts.app')

@section('content')


    <h1>Post con loggin  </h1>

<div class="pb-5 row justify-content-center">
         <a class="mr-5 btn btn-primary" href="{{ route('posts.index') }}">post publici</a>
         <a class="mr-5 btn btn-primary " href="{{ route('admin.posts.index') }}">Torna alla home</a>
        <a class="mr-5 btn btn-primary " href="{{ route('admin.posts.create') }}">crea nuovo post</a>
        <a class="mr-5 btn btn-primary" href="{{ route('admin.tags.index') }}">tags</a>
</div>
<div class="row justify-content-center">

</div>





    <table class="table table-dark">
        <thead>
            <tr>
                <th class="underline" scope="col">Titolo</th>
                <th class="underline" scope="col">Detagli</th>
                <th class="underline" scope="col">Name</th>
                <th class="underline" scope="col">Motivo</th>
                <th class="underline" scope="col">User Mail</th>
                <th class="underline" scope="col">Categoria</th>
                <th class="underline" scope="col">Tags</th>
                <th class="underline" scope="col">Azioni</th>
                
            </tr>
        </thead>
        
    @foreach($posts as $post)
        <tbody>
            <tr>
                <th  scope="col">{{$post->title}}</th>
                <th  scope="col">{{$post->detagli}}</th>
                <th  scope="col">{{$post->name}}</th>
                <th  scope="col">{{$post->motivo}}</th>
                <th  scope="col">{{$post->user->email}}</th>
                <th  scope="col">{{$post->category ? $post->category->name : '--' }}</th>
                <th  scope="col"> 
                    @foreach($post->tags as $tag)
                        <span class="badge badge-secondary">{{$tag->name}}</span> 
                    @endforeach
                </th>
                <th scope="col">
                         <a title="detagli" href="{{route("admin.posts.show", $post->id)}}" class="btn btn-outline-success">
                            <i class="fa fa-eye"    aria-hidden="true"></i>
                         </a>
                        <a title="edit" href="{{route("admin.posts.edit", $post->id)}}" class="btn btn-outline-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                        @include('partials.components.deleteBtn', ["id" => $post->id])
                </th>

            </tr>
        
        </tbody>
        
    @endforeach
    </table>




  
        {{-- <div class="card" style="width: 18rem;">
          <img src="{{ asset('img\unnamed.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->detagli}}</p>
            <p class="card-text">{{$post->name}}</p>
            <p class="card-text">{{$post->motivo}}</p>
            <p class="card-text">{{$post->user->email}}</p>
            <p class="card-text">{{$post->category ? $post->category->name : '--' }}</p>

            @foreach($post->tags as $tag)
               <span class="badge badge-secondary">{{$tag->name}}</span> 
            @endforeach
            

            <a href="{{route("admin.posts.show", $post->id)}}" class="btn btn-primary">Dettagli</a>
            <a href="{{route("admin.posts.edit", $post->id)}}" class="btn btn-primary">edit</a>
            @include('partials.components.deleteBtn', ["id" => $post->id])
    



            </div>
        </div> --}}


</div>

@endsection
