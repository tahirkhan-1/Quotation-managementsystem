<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Details & Item Selection</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary: #1a3c5e;
            --secondary: #00aaff;
            --accent: #ff4d4d;
            --light-bg: #f5f7fa;
            --dark-bg: #1a3c5e;
            --success: #28a745;
            --warning: #ffc107;
            --text-dark: #2d3436;
            --text-muted: #6c757d;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .main-container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 15px;
        }

        .card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: white;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1.5rem;
            border-bottom: none;
        }

        .card-header h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid var(--secondary);
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .customer-details-card {
            background: white;
            border-left: 5px solid var(--secondary);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .customer-details-card:hover {
            transform: translateY(-5px);
        }

        .customer-detail-item {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .customer-detail-item strong {
            min-width: 130px;
            color: var(--primary);
            font-weight: 600;
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e0e4e8;
            background: #fafafa;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(0, 170, 255, 0.2);
            background: white;
        }

        .btn {
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--secondary);
            border: none;
        }

        .btn-primary:hover {
            background: #0088cc;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-success {
            background: var(--success);
            border: none;
            padding: 12px 32px;
        }

        .btn-success:hover {
            background: #218838;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-danger {
            background: var(--accent);
            border: none;
        }

        .btn-danger:hover {
            background: #e63939;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .table {
            border-radius: 12px;
            overflow: hidden;
            background: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
        }

        .table th {
            background: var(--primary);
            color: white;
            font-weight: 600;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
            border-color: #e9ecef;
        }

        .table tbody tr {
            transition: background 0.2s ease;
        }

        .table tbody tr:hover {
            background: #f8f9fa;
        }

        .total-price {
            font-weight: 700;
            color: var(--success);
            font-size: 1.1rem;
        }

        .gst-badge {
            background: #e6f3ff;
            color: var(--secondary);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .search-container {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1.1rem;
        }

        .search-input {
            padding-left: 45px;
            font-size: 1rem;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .status-badge {
            background: var(--success);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .floating-notification {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--success);
            color: white;
            padding: 15px 25px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
            z-index: 2000;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
        }

        .floating-notification.show {
            opacity: 1;
            transform: translateY(0);
        }

        .print-preview {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            z-index: 1050;
            overflow-y: auto;
            padding: 20px;
        }

        .print-content {
            background: white;
            margin: 2rem auto;
            padding: 2.5rem;
            border-radius: 16px;
            max-width: 900px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .print-header {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 3px solid var(--primary);
        }

        .print-logo {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .print-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .print-section {
            margin-bottom: 2rem;
        }

        .print-section-title {
            font-weight: 700;
            font-size: 1.25rem;
            border-bottom: 2px solid var(--primary);
            padding-bottom: 0.75rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
            text-transform: uppercase;
        }

        .print-footer {
            margin-top: 2.5rem;
            text-align: center;
            font-size: 0.95rem;
            color: var(--text-muted);
            border-top: 2px solid #e0e4e8;
            padding-top: 1.5rem;
            font-style: italic;
        }

        .print-content .table {
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        .print-content .table th,
        .print-content .table td {
            padding: 12px;
            border: 1px solid #dee2e6;
        }

        .print-content .table th {
            background: var(--primary);
            color: white;
            font-weight: 600;
        }

        @media print {
            body * {
                visibility: hidden;
            }
            .print-content, .print-content * {
                visibility: visible;
            }
            .print-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
                padding: 20px;
                box-shadow: none;
                border-radius: 0;
            }
            .no-print {
                display: none !important;
            }
            .print-content .table {
                border-collapse: collapse;
            }
            .print-content .table th,
            .print-content .table td {
                border: 1px solid #000;
            }
        }

        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
                gap: 8px;
            }
            .customer-detail-item {
                flex-direction: column;
                gap: 8px;
            }
            .customer-detail-item strong {
                min-width: auto;
                margin-bottom: 5px;
            }
            .print-content {
                padding: 1.5rem;
                margin: 1rem;
            }
            .main-container {
                margin: 1rem;
            }
        }
    </style>
</head>
<body>
<div class="main-container">
    <h2 class="mb-4 text-center">
        <i class="bi bi-person-circle me-2"></i>Customer Details & Item Selection
    </h2>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="text-center mb-0"><i class="bi bi-cart-check"></i> Customer Details & Item Selection</h3>
        </div>
        
        <div class="card-body p-4">
            <!-- Customer Details Section -->
            <div id="customerDetails" class="customer-details-card mb-4 shadow-sm">
                <h5 class="section-title"><i class="bi bi-person-circle"></i> Customer Information</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="customer-detail-item">
                            <strong>Name:</strong> 
                            <span id="customerName">{{ $quotation->customer_name ?? 'N/A' }}</span>
                        </div>
                        <div class="customer-detail-item">
                            <strong>Phone:</strong> 
                            <span id="customerPhone">{{ $quotation->phone ?? 'N/A' }}</span>
                        </div>
                        <div class="customer-detail-item">
                            <strong>Date & Time:</strong> 
                            <span id="customerDateTime">{{ $quotation->datetime ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="customer-detail-item">
                            <strong>Validity Date:</strong> 
                            <span id="customerValidity">{{ $quotation->validity_date ?? 'N/A' }}</span>
                        </div>
                        <div class="customer-detail-item">
                            <strong>Address:</strong> 
                            <span id="customerAddress">{{ $quotation->address ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item Selection -->
            <div class="mb-4">
                <h5 class="section-title"><i class="bi bi-search"></i> Search & Select Items</h5>
                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <div class="search-container">
                            <i class="bi bi-search search-icon"></i>
                            <input type="text" id="searchBox" class="form-control search-input" placeholder="Search by item name, category, or barcode...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary w-100" onclick="searchItems()">
                            <i class="bi bi-search"></i> Search Items
                        </button>
                    </div>
                </div>
            </div>

            <!-- Item Selection Form -->
            <div class="row g-3 mb-4">
                <div class="col-md-5">
                    <select id="itemSelect" class="form-select">
                        <option disabled selected>-- Select Item --</option>
                        @forelse($items as $item)
                            <option 
                                value="{{ $item->id }}"
                                data-name="{{ $item->name }}"
                                data-category="{{ $item->category }}"
                                data-barcode="{{ $item->barcode }}"
                                data-price="{{ $item->sale_price }}"
                                data-gst="{{ $item->gst }}"
                                data-stock="{{ $item->stock ?? 0 }}">
                                {{ $item->name }} | {{ $item->category }} | ${{ number_format($item->sale_price, 2) }} | GST: {{ $item->gst }}% | Stock: {{ $item->stock ?? 0 }} | Barcode: {{ $item->barcode }}
                            </option>
                        @empty
                            <option disabled>No items available</option>
                        @endforelse
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="number" id="itemQuantity" class="form-control" placeholder="Quantity" value="1" min="1">
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary w-100" onclick="addItem()">
                        <i class="bi bi-plus-circle"></i> Add to List
                    </button>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-secondary w-100" onclick="clearSelection()">
                        <i class="bi bi-x-circle"></i> Clear
                    </button>
                </div>
            </div>

            <!-- Items Table -->
            <div class="card shadow-sm mb-4 d-none" id="selectedItemsCard">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-list-check"></i> Selected Items</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="itemsTable" class="table table-bordered mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>GST %</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>GST Amount</th>
                                    <th>Barcode</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="selectedItemsTable"></tbody>
                            <tfoot>
                                <tr class="table-light">
                                    <td colspan="5" class="text-end fw-bold">Subtotal:</td>
                                    <td id="subtotal" class="total-price">$0.00</td>
                                    <td id="totalGst" class="total-price">$0.00</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr class="table-success">
                                    <td colspan="5" class="text-end fw-bold">Grand Total:</td>
                                    <td id="grandTotal" class="total-price" colspan="5">$0.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Back
                </a>
                <button type="button" class="btn btn-success" onclick="showPrintPreview()">
                    Print <i class="bi bi-arrow-right-circle"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Print Preview Modal -->
<div id="printPreview" class="print-preview">
    <div class="print-content">
        <div class="print-header">
            <div class="print-logo">Swismas</div>
            <h1 class="print-title">Quotation / Invoice</h1>
            <p>Date: <span id="printDate"></span></p>
        </div>
        
        <div class="print-section">
            <h3 class="print-section-title">Customer Information</h3>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Name:</strong> <span id="printCustomerName"></span></p>
                    <p><strong>Phone:</strong> <span id="printCustomerPhone"></span></p>
                    <p><strong>Date & Time:</strong> <span id="printCustomerDateTime"></span></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Validity Date:</strong> <span id="printCustomerValidity"></span></p>
                    <p><strong>Address:</strong> <span id="printCustomerAddress"></span></p>
                    <p><strong>Status:</strong> <span class="status-badge">Active</span></p>
                </div>
            </div>
        </div>
        
        <div class="print-section">
            <h3 class="print-section-title">Selected Items</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>GST %</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>GST Amount</th>
                        </tr>
                    </thead>
                    <tbody id="printItemsTable"></tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Subtotal:</td>
                            <td id="printSubtotal" class="fw-bold">$0.00</td>
                            <td id="printTotalGst" class="fw-bold">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Grand Total:</td>
                            <td id="printGrandTotal" class="fw-bold" colspan="2">$0.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
        <div class="print-footer">
            <p>Thank you for your business!</p>
            <p>For inquiries, please contact: sales@yourcompany.com | (555) 123-4567</p>
            <p>Generated on {{ date('F d, Y') }}</p>
        </div>
        
        <div class="d-flex justify-content-between mt-4 no-print">
            <button type="button" class="btn btn-outline-secondary" onclick="closePrintPreview()">
                <i class="bi bi-arrow-left-circle"></i> Back
            </button>
            <button type="button" class="btn btn-success" onclick="window.print()">
                <i class="bi bi-printer"></i> Print
            </button>
        </div>
    </div>
</div>

<!-- Floating Notification -->
<div id="notification" class="floating-notification">
    <i class="bi bi-check-circle"></i> <span id="notificationText"></span>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Store items data from database
    const items = [
        @foreach($items as $item)
        {
            id: {{ $item->id }},
            name: "{{ $item->name }}",
            category: "{{ $item->category }}",
            barcode: "{{ $item->barcode }}",
            price: {{ $item->sale_price }},
            gst: {{ $item->gst ?? 0 }},
            stock: {{ $item->stock ?? 0 }}
        },
        @endforeach
    ];

    // Show notification function
    function showNotification(message, isSuccess = true) {
        const notification = document.getElementById('notification');
        const notificationText = document.getElementById('notificationText');
        
        notificationText.textContent = message;
        notification.style.background = isSuccess ? 'var(--success)' : 'var(--accent)';
        notification.classList.add('show');
        
        setTimeout(() => {
            notification.classList.remove('show');
        }, 3000);
    }

    // Show print preview
    function showPrintPreview() {
        if (document.querySelectorAll('#selectedItemsTable tr').length === 0) {
            showNotification("Please add at least one item before printing", false);
            return;
        }
        
        document.getElementById('printDate').textContent = new Date().toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        document.getElementById('printCustomerName').textContent = document.getElementById('customerName').textContent;
        document.getElementById('printCustomerPhone').textContent = document.getElementById('customerPhone').textContent;
        document.getElementById('printCustomerDateTime').textContent = document.getElementById('customerDateTime').textContent;
        document.getElementById('printCustomerValidity').textContent = document.getElementById('customerValidity').textContent;
        document.getElementById('printCustomerAddress').textContent = document.getElementById('customerAddress').textContent;
        
        const printItemsTable = document.getElementById('printItemsTable');
        printItemsTable.innerHTML = '';
        
        const rows = document.querySelectorAll('#selectedItemsTable tr');
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const itemName = cells[0].textContent;
            const itemCategory = cells[1].textContent;
            const itemPrice = cells[2].textContent;
            const itemGst = cells[3].textContent.replace('%', '');
            const itemQuantity = cells[4].textContent;
            const itemTotal = cells[5].textContent;
            const itemGstAmount = cells[6].textContent;
            
            const printRow = document.createElement('tr');
            printRow.innerHTML = `
                <td>${itemName}</td>
                <td>${itemCategory}</td>
                <td>${itemPrice}</td>
                <td>${itemGst}%</td>
                <td>${itemQuantity}</td>
                <td>${itemTotal}</td>
                <td>${itemGstAmount}</td>
            `;
            printItemsTable.appendChild(printRow);
        });
        
        document.getElementById('printSubtotal').textContent = document.getElementById('subtotal').textContent;
        document.getElementById('printTotalGst').textContent = document.getElementById('totalGst').textContent;
        document.getElementById('printGrandTotal').textContent = document.getElementById('grandTotal').textContent;
        
        document.getElementById('printPreview').style.display = 'block';
    }
    
    function closePrintPreview() {
        document.getElementById('printPreview').style.display = 'none';
    }

    function searchItems() {
        let searchValue = document.getElementById('searchBox').value.toLowerCase().trim();
        let itemSelect = document.getElementById('itemSelect');
        
        while (itemSelect.options.length > 1) {
            itemSelect.remove(1);
        }
        
        const filteredItems = items.filter(item => 
            (item.name?.toLowerCase().includes(searchValue) ||
            item.category?.toLowerCase().includes(searchValue) ||
            item.barcode?.includes(searchValue)) &&
            item.stock > 0
        );
        
        if (filteredItems.length === 0 && searchValue) {
            showNotification("No matching items found or out of stock!", false);
            return;
        }
        
        const itemsToShow = searchValue ? filteredItems : items.filter(item => item.stock > 0);
        
        itemsToShow.forEach(item => {
            addOptionToSelect(item);
        });
        
        if (itemSelect.options.length > 1) {
            itemSelect.selectedIndex = 1;
        } else {
            showNotification("No items available for selection", false);
        }
    }
    
    function addOptionToSelect(item) {
        const option = document.createElement('option');
        option.value = item.id;
        option.setAttribute('data-name', item.name || '');
        option.setAttribute('data-category', item.category || '');
        option.setAttribute('data-barcode', item.barcode || '');
        option.setAttribute('data-price', item.price || 0);
        option.setAttribute('data-gst', item.gst || 0);
        option.setAttribute('data-stock', item.stock || 0);
        option.textContent = `${item.name} | ${item.category} | $${(item.price || 0).toFixed(2)} | GST: ${item.gst || 0}% | Stock: ${item.stock || 0} | Barcode: ${item.barcode || ''}`;
        document.getElementById('itemSelect').appendChild(option);
    }

    function clearSelection() {
        document.getElementById('searchBox').value = '';
        document.getElementById('itemQuantity').value = '1';
        refreshItemDropdown();
    }

    document.getElementById('searchBox').addEventListener("keypress", function(e) {
        if (e.key === "Enter") {
            e.preventDefault();
            searchItems();
        }
    });

    function addItem() {
        let select = document.getElementById('itemSelect');
        let selectedOption = select.options[select.selectedIndex];
        
        if (!selectedOption || selectedOption.disabled) {
            showNotification("Please select an item first", false);
            return;
        }
        
        let quantityInput = document.getElementById('itemQuantity');
        let quantity = parseInt(quantityInput.value) || 1;
        
        if (quantity < 1) {
            showNotification('Quantity must be at least 1', false);
            return;
        }
        
        let itemId = selectedOption.value;
        let itemName = selectedOption.getAttribute('data-name');
        let itemCategory = selectedOption.getAttribute('data-category');
        let itemBarcode = selectedOption.getAttribute('data-barcode');
        let itemPrice = parseFloat(selectedOption.getAttribute('data-price'));
        let itemGst = parseFloat(selectedOption.getAttribute('data-gst'));
        let itemStock = parseInt(selectedOption.getAttribute('data-stock'));
        let totalPrice = itemPrice * quantity;
        let gstAmount = (totalPrice * itemGst) / 100;

        let tableBody = document.getElementById('selectedItemsTable');
        let card = document.getElementById('selectedItemsCard');

        let existingRow = document.getElementById(`row-${itemId}`);
        if (existingRow) {
            let currentQty = parseInt(existingRow.querySelector('.item-quantity').textContent);
            let newQty = currentQty + quantity;
            if (newQty > itemStock) {
                showNotification(`Only ${itemStock} available in stock for ${itemName}`, false);
                return;
            }
            existingRow.querySelector('.item-quantity').textContent = newQty;
            
            let newTotal = itemPrice * newQty;
            existingRow.querySelector('.item-total').textContent = `$${newTotal.toFixed(2)}`;
            
            let newGstAmount = (newTotal * itemGst) / 100;
            existingRow.querySelector('.item-gst').textContent = `$${newGstAmount.toFixed(2)}`;
            
            // Update stock in items array
            let item = items.find(i => i.id == itemId);
            item.stock -= quantity;
            
            updateTotals();
            showNotification(`Increased quantity of ${itemName} to ${newQty}`);
            refreshItemDropdown();
            return;
        }

        if (quantity > itemStock) {
            showNotification(`Only ${itemStock} available in stock for ${itemName}`, false);
            return;
        }

        // Update stock in items array
        let item = items.find(i => i.id == itemId);
        item.stock -= quantity;

        let row = document.createElement('tr');
        row.id = `row-${itemId}`;
        row.innerHTML = `
            <td>${itemName}</td>
            <td>${itemCategory}</td>
            <td>$${itemPrice.toFixed(2)}</td>
            <td><span class="gst-badge">${itemGst}%</span></td>
            <td class="item-quantity">${quantity}</td>
            <td class="item-total total-price">$${totalPrice.toFixed(2)}</td>
            <td class="item-gst total-price">$${gstAmount.toFixed(2)}</td>
            <td>${itemBarcode}</td>
            <td>${item.stock}</td>
            <td>
                <div class="action-buttons">
                    <button class="btn btn-danger btn-sm" onclick="removeItem('${row.id}', ${itemId}, ${quantity})">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </td>
        `;
        tableBody.appendChild(row);

        card.classList.remove('d-none');
        updateTotals();
        showNotification(`Added ${quantity} x ${itemName} to the list`);
        
        quantityInput.value = 1;
        refreshItemDropdown();
    }

    function removeItem(rowId, itemId, quantity) {
        const row = document.getElementById(rowId);
        const itemName = row.cells[0].textContent;
        
        // Restore stock when item is removed
        let item = items.find(i => i.id == itemId);
        item.stock += parseInt(quantity);
        
        document.getElementById(rowId).remove();
        
        refreshItemDropdown();
        
        updateTotals();
        showNotification(`Removed ${itemName} from the list`);
        
        let tableBody = document.getElementById('selectedItemsTable');
        if (tableBody.children.length === 0) {
            document.getElementById('selectedItemsCard').classList.add('d-none');
        }
    }
    
    function refreshItemDropdown() {
        const searchValue = document.getElementById('searchBox').value.toLowerCase().trim();
        let itemSelect = document.getElementById('itemSelect');
        
        while (itemSelect.options.length > 1) {
            itemSelect.remove(1);
        }
        
        const availableItems = items.filter(item => item.stock > 0);
        
        const filteredItems = searchValue ? 
            availableItems.filter(item => 
                item.name.toLowerCase().includes(searchValue) || 
                item.category.toLowerCase().includes(searchValue) ||
                item.barcode.includes(searchValue)
            ) : 
            availableItems;
        
        filteredItems.forEach(item => {
            addOptionToSelect(item);
        });
        
        if (itemSelect.options.length > 1) {
            itemSelect.selectedIndex = 1;
        }
    }
    
    function updateTotals() {
        let subtotal = 0;
        let totalGst = 0;
        const itemTotals = document.querySelectorAll('.item-total');
        const itemGsts = document.querySelectorAll('.item-gst');
        
        itemTotals.forEach(itemTotal => {
            const totalText = itemTotal.textContent.replace('$', '');
            subtotal += parseFloat(totalText);
        });
        
        itemGsts.forEach(itemGst => {
            const gstText = itemGst.textContent.replace('$', '');
            totalGst += parseFloat(gstText);
        });
        
        document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
        document.getElementById('totalGst').textContent = `$${totalGst.toFixed(2)}`;
        document.getElementById('grandTotal').textContent = `$${(subtotal + totalGst).toFixed(2)}`;
    }

    window.onload = function() {
        refreshItemDropdown();
        
        document.getElementById('printPreview').addEventListener('click', function(e) {
            if (e.target === this) {
                closePrintPreview();
            }
        });
    };
</script>
</body>
</html>