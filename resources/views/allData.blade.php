@foreach($allData as $data)
id : {{$data->id}}<br>
email:{{$data->email}}<br>
password:{{$data->password}}<br>
<a href="{{route('users.edit',$data->id)}}">Edit</a><br>
<a href="{{route('users.destroy',$data->id)}}">Delete</a><br>

-----------------------------------<br>
@endforeach