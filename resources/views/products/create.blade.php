<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <label>Product ID:</label>
        <input type="text" name="product_id" required>
        <br>
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <label>Description:</label>
        <textarea name="description"></textarea>
        <br>
        <label>Price:</label>
        <input type="number" step="0.01" name="price" required>
        <br>
        <label>Stock:</label>
        <input type="number" name="stock">
        <br>
        <label>Image:</label>
        <input type="file" name="image" required>
        <br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
