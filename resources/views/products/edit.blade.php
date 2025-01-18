<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Product ID:</label>
        <input type="text" name="product_id" value="{{ $product->product_id }}" readonly>
        <br>
        <label>Name:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        <br>
        <label>Description:</label>
        <textarea name="description">{{ $product->description }}</textarea>
        <br>
        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="{{ $product->price }}" required>
        <br>
        <label>Stock:</label>
        <input type="number" name="stock" value="{{ $product->stock }}">
        <br>
        <label>Image:</label>
        <input type="file" name="image">
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
