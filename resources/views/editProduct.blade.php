<form action="{{route('products.update',$products->id)}}" method="post">
    @method('PUT')
    @csrf
    <input type="text" name="productName" value="{{$products->productName}}">
    <input type="number" name="productStock" value="{{$products->productStock}}">
    <input type="submit" value="submit">
</form>