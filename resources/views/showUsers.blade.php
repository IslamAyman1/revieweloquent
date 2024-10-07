<h1 style='text-align: center;'>Show Users Page</h1>
@foreach($users as $user)
<h4>ID : {{$user->id}}</h4>
<h4>Name : {{$user->name}}</h4>
<h4>Email : {{$user->email}}</h4>
<a href="{{route('updateUserBlade',$user->id)}}">Edit</a><br>
------------------------------------- 
@endforeach