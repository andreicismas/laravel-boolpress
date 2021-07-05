@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <a class="pb-5 " href="{{ route('admin.posts.index') }}">Torna alla home</a>
</div>
@include("partials.components.errors")
<div class="container">
    <form action="{{ route('admin.posts.update', $post) }}" method="post" id="postform">
        @csrf
        @method('PATCH')

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
            <input type="text" class="form-control" id="motivo" name="motivo" aria-describedby="topicHelp" placeholder="Inserisci l'argomento" value="{{old('motivo',  $post->motivo)}}"">
            <small id=" topicHelp" class="form-text text-muted">Inserisci  l'argomento del Post</small>
        </div>

        <input type="submit" value="Invia"><br>
    </form>



</div>



@endsection
