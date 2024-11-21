<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .bg-dark-custom {
            background-color: black;
        }

        .card-custom {
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .card-header-custom {
            background-color: black;
            color: white;
            padding: 20px;
        }

        .form-control-custom {
            border-radius: 10px;
            font-size: 1rem;
            padding: 12px 20px;
            border: 1px solid #ddd;
            transition: border-color 0.3s ease;
        }

        .form-control-custom:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-label-custom {
            font-weight: bold;
            color: #495057;
        }

        .btn-custom {
            border-radius: 30px;
            padding: 12px 25px;
            font-size: 1.1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-dark-custom {
            background-color: lightgray;
            border-color: #28a745;
        }

        .invalid-feedback {
            font-size: 0.875rem;
            color: black;
        }

        .container-custom {
            padding-top: 40px;
        }

        .alert-custom {
            background-color: blue;
            color: white;
            font-weight: bold;
            padding: 15px;
            border-radius: 5px;
        }

        .back-button {
            text-align: right;
        }

        
        .img-preview {
            max-width: 100%;
            max-height: 200px;
            margin-top: 20px;
            border-radius: 8px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="bg-dark-custom py-3">
        <h3 class="text-white text-center">Product Inventory</h3>
    </div>

    <div class="container container-custom">
        <div class="row">
            <div class="col-md-10 back-button">
                <a href="{{ route('products.index') }}" class="btn btn-dark-custom">Back</a>
            </div>
            <div class="col-md-10 mt-4">
                <div class="card card-custom">
                    <div class="card-header card-header-custom">
                        <h3 class="text-white text-center">Edit Product</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">

                            
                            <div class="mb-4">
                                <label for="name" class="form-label form-label-custom">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" 
                                       class="form-control form-control-custom @error('name') is-invalid @enderror"
                                       placeholder="Enter product name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <div class="mb-4">
                                <label for="sku" class="form-label form-label-custom">SKU</label>
                                <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku) }}"
                                       class="form-control form-control-custom @error('sku') is-invalid @enderror"
                                       placeholder="Enter SKU">
                                @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <div class="mb-4">
                                <label for="price" class="form-label form-label-custom">Price</label>
                                <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}"
                                       class="form-control form-control-custom @error('price') is-invalid @enderror"
                                       placeholder="Enter price">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <div class="mb-4">
                                <label for="description" class="form-label form-label-custom">Description</label>
                                <textarea name="description" id="description" rows="5"
                                          class="form-control form-control-custom">{{ old('description', $product->description) }}</textarea>
                            </div>

                            
                            <div class="mb-4">
                                <label for="image" class="form-label form-label-custom">Image</label>
                                <input type="file" name="image" id="image" class="form-control form-control-custom">
                                @if ($product->image)
                                    <img src="{{ asset('uploads/products/'.$product->image) }}" class="img-preview mt-3" alt="Product Image">
                                @endif
                            </div>

                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
