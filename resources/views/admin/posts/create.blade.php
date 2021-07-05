@extends('layouts.app')

@section('content')
<h1>crea post</h1>

<div class="row justify-content-center">
    <a class="pb-5 " href="{{ route('admin.posts.index') }}">Torna alla home</a>
</div>
@include("partials.components.errors")
<div class="container">
    <form action="{{ route('admin.posts.store') }}" method="post" id="postform">
        @csrf

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

        <input type="submit" value="Invia"><br>
    </form>



</div>



@endsection
