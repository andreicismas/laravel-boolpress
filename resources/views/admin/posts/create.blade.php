@extends('layouts.app')

@section('content')
<h1>crea post</h1>

<div class="row justify-content-center">
    <a class="pb-5 " href="{{ route('admin.posts.index') }}">Torna alla home</a>
</div>
@include("partials.components.errors")
<div class="container">
    <form action="{{ route('admin.posts.store') }}" method="post" id="postform" enctype="multipart/form-data">
        @csrf
       

        {{-- <div  class="form-group">
            <label for="title"><i class="fa fa-arrow-down" aria-hidden="true"></i>Carica la tua Img di copertina </label>
            <input class="form-control-file" type="file" name="postCover" id="" >
        </div> --}}

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Inserisci il titolo">
            <small id="titleHelp" class="form-text text-muted">Inserisci  il titolo del Post</small>
        </div>


        <div class="form-group">
            <label for="content">Details</label>
            <textarea class="form-control" id="content" name="detagli" rows="5" aria-describedby="contentHelp" placeholder="Inserisci il contenuto"></textarea>
            <small id="contentHelp" class="form-text text-muted">Inserisci  il contenuto del Post</small>
        </div>

        <div class="form-group">
            <label for="author">Name</label>
            <input type="text" class="form-control" id="author" name="name" aria-describedby="authorHelp" placeholder="Inserisci il nome">
            <small id="authorHelp" class="form-text text-muted">Inserisci  l'autore del Post</small>
        </div>

        <div class="form-group">
            <label for="topic">Reason of post</label>
            <input type="text" class="form-control" id="topic" name="motivo" aria-describedby="topicHelp" placeholder="Inserisci l'argomento">
            <small id="topicHelp" class="form-text text-muted">Inserisci  il motivo  del Post</small>
        </div>
         <div class="formgroup">
            <label for="">tags</label> <br>
            <div class="form-check">
                @foreach($tags as $tag)

               
                <label for="" class="form-check-label">{{$tag->name}}
                     <input name="tags[]"  class="form-check form-check-inline" type="checkbox"  value="{{$tag->id}}" 
                      >
                </label>
                    
                @endforeach
            </div>


            {{-- <select name="tags[]" class="from-control" id=""  multiple hight="5">
             <option value="">select category</option>
                @foreach($tags as $tag )
                <option value="{{$tag->id}}">{{$tag->name}}</option>
                    
                @endforeach
            </select>
         --}}

         
        </div>

         <div class="form-group">
            <label >Categories</label>
            <select name="category_id" >
                <option value="">select category</option>
                @foreach($categories as $category)

                <option value="{{$category->id}}">
                    {{$category->name}}
                </option>
                    
                @endforeach
            </select>
            <small id=" topicHelp" class="form-text text-muted">Inserisci  l'argomento del Post</small>
        </div>

        <input type="submit" value="Invia"><br>
    </form>



</div>



@endsection
