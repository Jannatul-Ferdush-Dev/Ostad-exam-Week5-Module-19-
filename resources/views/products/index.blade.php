<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/products">All Products</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid px-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-success text-uppercase text-center mt-5 mb-2"><b>Product Management CRUD</b></h1>
                
                <div class="row mt-2">
                    <div class="col-md-6">
                        <a href="products/create" class="btn btn-dark mt-2">Create New Product</a>
                    </div>
                    <div class="col-md-6">
                        <form method="GET" action="products" class="d-flex">
                            <input type="text" name="search" class="form-control" placeholder="Search products..."
                                value="{{ request()->get('search') }}">
                            <button type="submit" class="btn btn-dark ms-2">Search</button>
                        </form>
                    </div>
                </div>

                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product ID</th>
                            <th class="d-flex align-items-center">Product Name
                                <div class="ps-1">
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'order' => $sortField == 'name' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                        @if ($sortField == 'name' && $sortOrder == 'asc')
                                            &#9650;
                                        @else
                                            &#9660;
                                        @endif
                                    </a>
                                </div>
                             </th>
                            <th>Product Description</th>
                            <th class="d-flex align-items-center">Product Price
                                <div class="ps-2">
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'price', 'order' => $sortField == 'price' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                        @if ($sortField == 'price' && $sortOrder == 'asc')
                                            &#9650;
                                        @else
                                            &#9660;
                                        @endif
                                    </a>
                                </div>
                             </th>
                            <th>Product Stock</th>
                            <th>Product Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td><img src="productsimage/{{ $product->image }}" class="rounded-circle" width="75" height="75"></td>
                                <td>
                                    <a href="products/{{ $product->id }}" class="btn btn-primary btn-sm">Show</a>
                                    <a href="products/{{ $product->id }}/edit" class="btn btn-success btn-sm">Edit</a>
                                    <form method="POST" class="d-inline" action="products/{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                  {{ $products->links() }}
                
                
            </div>
        </div>
    </div>
</body>
</html>