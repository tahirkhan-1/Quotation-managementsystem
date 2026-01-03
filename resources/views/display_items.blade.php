<!DOCTYPE html>
<html>
<head>
    <title>Display Items</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .search-box {
            max-width: 400px;
            margin: 0 auto 20px auto;
            position: relative;
        }
        .search-box i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .search-box input {
            padding-left: 40px;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">All Items</h1>

    <!-- 🔍 Search Box -->
    <div class="search-box">
        <i class="fas fa-search"></i>
        <input type="text" id="searchInput" class="form-control" placeholder="Search by Name, Category, or Barcode...">
    </div>

    <!-- Items Table -->
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover" id="itemsTable">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Cost Price</th>
                        <th>Sale Price</th>
                        <th>GST</th>
                        <th>stock</th>
                        <th>Barcode</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->cost_price }}</td>
                        <td>{{ $item->sale_price }}</td>
                        <td>{{ $item->gst }}</td>
                         <td>{{ $item->stock }}</td>
                        <td>{{ $item->barcode }}</td>
                        <td>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <form action="{{ route('items.delete', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this item?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No items found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // ✅ Search filter (client-side)
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll("#itemsTable tbody tr");

        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(value) ? "" : "none";
        });
    });
</script>
</body>
</html>
