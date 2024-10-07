@foreach($getData as $data)
ID : {{$data->id}}
<br>
Name : {{$data->productName}}<br>
Stock : {{$data->productStock}}<br>
<a href="{{route('products.edit',$data->id)}}">Edit</a><br>
<form action="{{route('products.destroy',$data->id)}}" method="post">
    @method('DELETE')
    @csrf
    <input type="submit" value="Delete">
</form>
..............................<br>
@endforeach