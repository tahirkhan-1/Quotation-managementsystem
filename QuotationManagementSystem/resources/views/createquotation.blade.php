<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Quotation - Professional</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        /* Your existing CSS remains the same */
        body {
            background: #f7f8fa;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }
        /* ... rest of your CSS ... */
    </style>
</head>
<body>
    <div class="container py-5">
        <h2 class="mb-4 text-center">
            <i class="bi bi-file-earmark-text me-2"></i>Quotation Creation
        </h2>

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5 class="alert-heading">
                <i class="bi bi-exclamation-triangle me-2"></i>Please fix the following errors:
            </h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="step-title mb-3">
                    <i class="bi bi-pencil-square me-2"></i>Create Quotation
                </h5>

                <!-- ✅ FIXED: Changed form action to the correct POST route -->
                <form action="{{ route('createquotation.store') }}" method="POST" novalidate>
                    @csrf

                    <!-- Customer + Phone -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="customer" class="form-label">Customer Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" id="customer" name="customer_name"
                                       value="{{ old('customer_name') }}"
                                       class="form-control @error('customer_name') is-invalid @enderror"
                                       placeholder="Enter customer name" required>
                            </div>
                            @error('customer_name')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="tel" id="phone" name="phone"
                                       value="{{ old('phone') }}"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       placeholder="Enter phone number" required>
                            </div>
                            @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <!-- Date & Time + Validity -->
                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <label for="datetime" class="form-label">Date & Time</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                <input type="datetime-local" id="datetime" name="datetime"
                                       value="{{ old('datetime') }}"
                                       class="form-control @error('datetime') is-invalid @enderror" required>
                            </div>
                            @error('datetime')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validity" class="form-label">Validity Date</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                <input type="date" id="validity" name="validity_date"
                                       value="{{ old('validity_date') }}"
                                       class="form-control @error('validity_date') is-invalid @enderror" required>
                            </div>
                            @error('validity_date')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mt-3">
                        <label for="address" class="form-label">Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            <textarea id="address" name="address"
                                      class="form-control @error('address') is-invalid @enderror"
                                      rows="3" placeholder="Enter complete address..." required>{{ old('address') }}</textarea>
                        </div>
                        @error('address')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success mt-4 w-100">
                        <i class="bi bi-arrow-right-circle me-2"></i>Continue to Next Step
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', e => {
                    if (!form.checkValidity()) {
                        e.preventDefault();
                        e.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });
            });
        });
    </script>
</body>
</html>