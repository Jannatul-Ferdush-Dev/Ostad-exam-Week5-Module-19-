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
            <h1 class="text-success text-uppercase text-center mt-5 mb-5"><b>Product Page</b></h1>
                <div class="card mt-2 p-5">
                <div class="text-end">
                        <a href="/products" class="btn btn-success m-1"><i class="bi bi-arrow-left pe-2"></i>Back</a>
                </div>
                    <p> <b>Product Name</b> : {{ $product->name }}</p>
                    <p> <b>Product Description</b> : {{ $product->description }}</p>
                    <p> <b>Product Price</b> : {{ $product->price }}</p>
                    <p> <b>Product Stock</b> : {{ $product->stock }}</p>
                    <img src="/productsimage/{{ $product->image }}" class="img-fluid w-50 img-thumbnail">
                </div>
            </div>
        </div>
    </div>
</body>
</html>