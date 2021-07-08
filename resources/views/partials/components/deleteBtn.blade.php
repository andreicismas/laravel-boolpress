<form action="{{ route('admin.posts.destroy', $id) }}" method="post" class="eraser">
  @csrf
  @method('DELETE')

  <button title="cancella" class="btn btn-outline-danger" type="submit" value="Cancella"><a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></button>
</form>