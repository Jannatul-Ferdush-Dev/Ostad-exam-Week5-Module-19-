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

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>            
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <h1 class="text-success text-uppercase text-center mt-5 mb-5"><b>Edit Product</b></h1>
                <div class="card mt-2 p-5">
                <div class="text-end">
                        <a href="/products" class="btn btn-success m-1"><i class="bi bi-arrow-left pe-2"></i>Back</a>
                </div>
                    <h1 class="text-muted">Edit the {{ $product->name }}</h1>
                    <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label>Product ID</label>
                            <input type="text" name="product_id" class="form-control" value="{{ old('product_id', $product->product_id) }}">
                            @if ($errors->has('product_id'))
                                <span class="text-danger">{{ $errors->first('product_id')}}</span>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label>Product Description</label>
                            <textarea name="description" rows="5" class="form-control">{{ old('description', $product->description) }}</textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label>Product Price</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price')}}</span>
                            @endif                            
                        </div>
                        <div class="form-group mt-2">
                            <label>Product Stock</label>
                            <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}">
                        </div>
                        <div class="form-group mt-2">
                            <label>Product Image</label>
                            <input type="file" name="image" class="form-control">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image')}}</span>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>