Login Please:
<form action="{{route('products.store')}}" method="post">
@method('POST')
@csrf
<input type="text" name="productName" placeholder="enter product Name">
<input type="number" name="productStock" placeholder="enter product Stock">
<input type="submit" value="submit">
</form>