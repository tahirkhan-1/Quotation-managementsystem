<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Item</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa 0%, #c8e6c9 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 20px 0;
    }

    .card {
      border-radius: 20px;
      background: #fff;
      border: none;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      transition: transform 0.2s ease;
      margin: 20px 0;
    }

    .card:hover {
      transform: translateY(-3px);
    }

    h3 {
      font-weight: bold;
      color: #00796b;
      margin-bottom: 1.5rem;
    }

    label {
      font-weight: 600;
      color: #555;
      margin-bottom: 0.5rem;
    }

    .form-control {
      border-radius: 10px;
      padding: 12px 16px;
      border: 1px solid #ccc;
      transition: all 0.3s;
    }

    .form-control:focus {
      border-color: #00796b;
      box-shadow: 0 0 8px rgba(0, 121, 107, 0.4);
    }

    .btn {
      border-radius: 8px;
      font-weight: bold;
      padding: 10px 18px;
      transition: all 0.3s;
    }

    .btn-primary {
      background-color: #00796b;
      border: none;
    }

    .btn-primary:hover {
      background-color: #004d40;
      transform: translateY(-2px);
    }

    .btn-outline-secondary {
      border-color: #6c757d;
    }

    .btn-outline-secondary:hover {
      background-color: #6c757d;
      color: white;
    }

    .barcode-btn {
      cursor: pointer;
    }

    .text-danger {
      font-size: 0.875rem;
      margin-top: 0.25rem;
    }

    .input-group {
      border-radius: 10px;
    }

    .input-group .form-control {
      border-radius: 10px 0 0 10px;
    }

    .input-group .btn {
      border-radius: 0 10px 10px 0;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100 py-5">
    <div class="card p-4 p-md-5 w-100" style="max-width: 800px;">
      <h3 class="text-center mb-4"><i class="fa fa-plus-circle me-2"></i> Add New Item</h3>
      
      <!-- Success Message -->
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      
      <!-- Error Messages -->
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('items.store') }}" method="POST">
        @csrf
        
        <!-- Name -->
        <div class="mb-3">
          <label for="name" class="form-label">Item Name</label>
          <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter item name">
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <!-- Category -->
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <input type="text" value="{{ old('category') }}" class="form-control @error('category') is-invalid @enderror" id="category" name="category" placeholder="Enter category">
          @error('category')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <!-- Cost & Sale Price -->
        <div class="row mb-3">
          <div class="col-md-6 mb-3 mb-md-0">
            <label for="cost_price" class="form-label">Cost Price</label>
            <div class="input-group">
              <span class="input-group-text">$</span>
              <input type="number" step="0.01" value="{{ old('cost_price') }}" class="form-control @error('cost_price') is-invalid @enderror" id="cost_price" name="cost_price" placeholder="0.00">
            </div>
            @error('cost_price')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="sale_price" class="form-label">Sale Price</label>
            <div class="input-group">
              <span class="input-group-text">$</span>
              <input type="number" step="0.01" value="{{ old('sale_price') }}" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" placeholder="0.00">
            </div>
            @error('sale_price')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <!-- GST & Stock -->
        <div class="row mb-3">
          <div class="col-md-6 mb-3 mb-md-0">
            <label for="gst" class="form-label">GST %</label>
            <div class="input-group">
              <input type="number" step="0.01" value="{{ old('gst') }}" class="form-control @error('gst') is-invalid @enderror" id="gst" name="gst" placeholder="Enter GST percentage">
              <span class="input-group-text">%</span>
            </div>
            @error('gst')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" value="{{ old('stock') }}" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" placeholder="Enter stock quantity">
            @error('stock')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <!-- Barcode -->
        <div class="mb-4">
          <label for="barcode" class="form-label">Barcode</label>
          <div class="input-group">
            <input type="text" value="{{ old('barcode') }}" class="form-control @error('barcode') is-invalid @enderror" id="barcode" name="barcode" placeholder="Enter or generate barcode">
            <button type="button" class="btn btn-outline-secondary barcode-btn" id="generateBarcode">
              <i class="fa fa-barcode"></i> Generate
            </button>
          </div>
          @error('barcode')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <!-- Save Button -->
        <div class="d-flex justify-content-center mt-4">
          <button type="submit" class="btn btn-primary me-3"><i class="fa fa-save me-1"></i> Save Item</button>
          <button type="reset" class="btn btn-outline-secondary"><i class="fa fa-undo me-1"></i> Reset</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // ✅ Auto-generate barcode
    document.getElementById("generateBarcode").addEventListener("click", function () {
      let randomBarcode = "BC" + Math.floor(Math.random() * 1000000000); // e.g. BC123456789
      document.getElementById("barcode").value = randomBarcode;
    });

    // Format currency inputs on blur
    document.querySelectorAll('input[type="number"][step="0.01"]').forEach(input => {
      input.addEventListener('blur', function() {
        if (this.value) {
          this.value = parseFloat(this.value).toFixed(2);
        }
      });
    });
  </script>
</body>
</html>