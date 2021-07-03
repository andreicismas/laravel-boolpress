<form action="{{ route('admin.posts.destroy', $id) }}" method="post" class="eraser">
  @csrf
  @method('DELETE')

  <input class="btn btn-primary" type="submit" value="Cancella">
</form>