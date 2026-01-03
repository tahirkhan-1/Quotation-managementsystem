<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px 0;
        }
        .card { border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .card-header { background: #667eea; color: white; border-radius: 15px 15px 0 0 !important; }
        .btn-primary { background: #667eea; border: none; }
        .btn-primary:hover { background: #5a6fd8; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header py-3">
                    <h3 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Item</h3>
                </div>
                <div class="card-body p-4">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('items.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $item->name) }}">
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $item->category) }}">
                        </div>

                        <!-- Cost & Sale Price -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="cost_price" class="form-label">Cost Price</label>
                                <input type="number" step="0.01" class="form-control" id="cost_price" name="cost_price" value="{{ old('cost_price', $item->cost_price) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="sale_price" class="form-label">Sale Price</label>
                                <input type="number" step="0.01" class="form-control" id="sale_price" name="sale_price" value="{{ old('sale_price', $item->sale_price) }}">
                            </div>
                        </div>

                        <!-- GST & Stock -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="gst" class="form-label">GST %</label>
                                <input type="number" step="0.01" class="form-control" id="gst" name="gst" value="{{ old('gst', $item->gst) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $item->stock) }}">
                            </div>
                        </div>

                        <!-- Barcode -->
                        <div class="mb-3">
                            <label for="barcode" class="form-label">Barcode</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="barcode" name="barcode" value="{{ old('barcode', $item->barcode) }}">
                                <button type="button" class="btn btn-outline-secondary" id="generateBarcode"><i class="fa fa-barcode"></i> Generate</button>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('display.items') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Cancel</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Update</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById("generateBarcode").addEventListener("click", function() {
        let randomBarcode = "BC" + Math.floor(Math.random() * 1000000000);
        document.getElementById("barcode").value = randomBarcode;
    });
</script>
</body>
</html>
