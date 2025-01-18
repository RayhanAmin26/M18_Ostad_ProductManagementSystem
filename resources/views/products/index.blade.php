<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" name="search" placeholder="Search products" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    <a href="{{ route('products.create') }}">Add New Product</a>
    <table border="1">
        <thead>
            <tr>
                <th><a href="{{ route('products.index', ['sort_by' => 'name', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}">Name</a></th>
                <th>Description</th>
                <th><a href="{{ route('products.index', ['sort_by' => 'price', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}">Price</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">View</a>
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</body>
</html>
