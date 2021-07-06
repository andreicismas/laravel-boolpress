@extends('layouts.app')

@section( 'content')

<div class="container">
            <a class=" btn btn-primary" href="{{ route('admin.posts.index') }}">Torna alla home</a>
            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">crea nuovo post</a>
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Tutte le categorie</h1>
      
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
          @foreach ($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ count($category->posts) }}</td>
           
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection