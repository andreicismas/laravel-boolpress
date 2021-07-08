@extends('layouts.app')

@section( 'content')

<div class="container">
            <a class=" btn btn-primary" href="{{ route('admin.posts.index') }}">Torna alla home</a>
            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">crea nuovo post</a>
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Tutte i tag</h1>
      
      </div>
      <table class="table">
        <thead> 
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Count posti</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
          <tr>
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            
            <td>-{{ $tag->surname }}-</td>
            <td> <a href="{{route('admin.posts.filter',['tag'=>$tag->id])}}">{{count($tag->posts)  }}</a></td>

        

            {{-- ho provato a creare un post con tags ma non sono riuscito  --}}
           
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection