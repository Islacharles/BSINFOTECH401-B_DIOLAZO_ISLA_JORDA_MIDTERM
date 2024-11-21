<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Midterm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .bg-dark-custom {
            background-color: black;
        }

        .card-custom {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .card-img-custom {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body-custom {
            padding: 1.5rem;
        }

        .card-title-custom {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
        }

        .card-price {
            font-size: 1.1rem;
            font-weight: 500;
            color: #007bff;
        }

        .card-description {
            font-size: 0.9rem;
            color: #666;
        }

        .btn-custom {
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 500;
        }

        .btn-white-custom {
            background-color: lightgray;
            border-color: #343a40;
        }

        .btn-danger-custom {
            background-color: #e74a3b;
            border-color: #e74a3b;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
        }

        .container-custom {
            padding-top: 40px;
        }

        .alert-custom {
            background-color: blue;
            color: white;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
        }

        .create-button {
            text-align: right;
        }

        .no-products {
            text-align: center;
            padding: 50px 0;
            font-size: 1.2rem;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="bg-dark-custom py-3">
        <h3 class="text-white text-center">Product Inventory</h3>
    </div>
    <div class="container container-custom">
        <div class="row">
            <div class="col-md-10 create-button">
                <a href="{{ route('products.create') }}" class="btn btn-white-custom">Create Product</a>
            </div>
            @if (Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success alert-custom">
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
            <div class="col-md-10">
                <div class="row">
                    @if ($products->isNotEmpty())
                    @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card card-custom">
                            @if ($product->image != "")
                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}"
                                class="card-img-top card-img-custom">
                            @else
                            <img src="https://via.placeholder.com/350x200" alt="No Image" class="card-img-top card-img-custom">
                            @endif
                            <div class="card-body card-body-custom">
                                <h5 class="card-title card-title-custom">{{ $product->name }}</h5>
                                <p class="card-price">Php {{ $product->price }}.00</p>
                                <p class="card-description">{{ Str::limit($product->description, 100) }}</p>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-custom btn-white-custom">Edit</a>
                                    <a href="#" onclick="deleteProduct({{ $product->id }});" class="btn btn-custom btn-danger-custom">Delete</a>
                                    <form id="delete-product-from-{{ $product->id }}" action="{{ route('products.delete', $product->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12 no-products">
                        <p>No products found</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteProduct(id) {
            if (confirm("Are you sure?")) {
                document.getElementById("delete-product-from-" + id).submit();
            }
        }
    </script>
</body>

</html>
