<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
    <h1>Product Details</h1>
    <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Price:</strong> {{ $product->price }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>
    <p><strong>Image:</strong></p>
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
    <br><br>
    <a href="{{ route('products.index') }}">Back to List</a>
</body>
</html>
