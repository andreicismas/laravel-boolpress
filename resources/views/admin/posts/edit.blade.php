@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <a class="pb-5 " href="{{ route('admin.posts.index') }}">Torna alla home</a>
</div>
@include("partials.components.errors")
<div class="container">
      @if($post->cover_url)
            <img src="{{ asset('storage/'. $post->cover_url) }}" class=".img-fluid" alt="...">
         @endif
    <form action="{{ route('admin.posts.update', $post) }}" method="post" id="postform" enctype="multipart/form-data">
        @csrf
        @method('PUT')

          <div  class="form-group">
            <label for="title"><i class="fa fa-arrow-down" aria-hidden="true"></i>Carica la tua Img di copertina </label>
            <input class="form-control-file" type="file" name="postCover" id="" accept=".jpg,.png" >
        </div>

         

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Inserisci il titolo" value="{{old('title',  $post->title)}}">
            <small id="titleHelp" class="form-text text-muted">Inserisci  il titolo del Post</small>
        </div>


        <div class="form-group">
            <label for="detagli">Details</label>
            <textarea class="form-control" id="detagli" name="detagli" rows="5" aria-describedby="contentHelp" placeholder="Inserisci il contenuto">{{old('detagli', $post->detagli)}}</textarea>
            <small id="contentHelp" class="form-text text-muted">Inserisci il contenuto del Post</small>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="authorHelp" placeholder="Inserisci l'autore" value="{{old('name',  $post->name)}}">
            <small id="authorHelp" class="form-text text-muted">Inserisci  l'autore del Post</small>
        </div>

        <div class="form-group">
            <label for="motivo">Reason of post</label>
            <input type="text" class="form-control" id="motivo" name="motivo" aria-describedby="topicHelp" placeholder="Inserisci l'argomento" value="{{old('motivo',  $post->motivo)}}">
            <small id=" topicHelp" class="form-text text-muted">Inserisci  l'argomento del Post</small>
        </div>    

        <div class="form-group">
            <label >Categories</label>
            <select name="" id="">
                <option value="">select category</option>
                @foreach($categories as $category)

                    <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                    
                @endforeach
            </select>
            <small id=" topicHelp" class="form-text text-muted">Inserisci  l'argomento del Post</small>
        </div>

        <div class="formgroup">
            <label for="">tags</label> <br>
            <div class="form-check">
                @foreach($tags as $tag)

               
                <label for="" class="form-check-label">{{$tag->name}}
                     <input name="tags[]"  class="form-check form-check-inline" type="checkbox"  value="{{$tag->id}}" 
                      {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                       
                    
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

        <input type="submit" value="Invia"><br>
    </form>



</div>



@endsection
