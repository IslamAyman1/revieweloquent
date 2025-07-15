<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Show</title>
</head>

<body>
    <h1>Product Show</h1>
    <p>Product Name: {{ $product->productName }}</p>
    <p>Product stock: {{ $product->productStock }}</p>
    <a href="{{ route('welcome') }}">Back to Products</a>
</body>

</html>