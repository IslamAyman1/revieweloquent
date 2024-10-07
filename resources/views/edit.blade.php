<form action="{{route('users.update',$edituser->id)}}" method="post">
@method('PUT')
@csrf 
<input type="text" name="email" value="{{$edituser->email}}">
<input type="password" name="password" value="{{$edituser->password}}">
<input type="submit" value="submit">
</form>