<h1 style="text-align: center;">Update User Blade</h1>
<form method="post" action="{{route('updateUser',$user->id)}}"> 
 @csrf 
 @method('post')
 <input type='text' name="name" value="{{$user->name}}"/><br>
 <input type='email' name="email" value="{{$user->email}}"/><br>
 <input type="submit" value="submit"/>
</form>