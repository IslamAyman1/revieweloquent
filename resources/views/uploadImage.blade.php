@if (Auth::user()->hasRole('admin'))
<form  method="POST" enctype="multipart/form-data">
  @csrf 
  <input type="file" name="photo">
  @if (Auth::user()->hasPermission(['red','blue','gree']))
  <button type="submit">submit</button>
  @endif
</form>

@endif
 
