<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Production Record Process</title>


</head>
<body class="dashboard dashboard_1">
    <x-sidebar />
    <div id="content">
        <x-header />

        <div class="midde_cont">
            <div class="container-fluid">
                <div class="row column_title">
                    <div class="col-md-12">
                        <div class="page_title">
                            <h2>Production Record Process</h2>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            
                <!-- Work Order, Operation Code, and QR Code Section -->
                <div class="p-4 mb-4 shadow border rounded" style="background-color: white;">
<form action="{{ route('scan.barcodes.store') }}" method="POST">
    @csrf
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="work_order_no">Work Order No:</label>
            <select class="form-control" id="work_order_no" name="work_order_no" disabled>
                <option value="{{$workOrder}}">{{$workOrder}}</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="operation_code">Operation Code:</label>
            <select class="form-control" id="operation_code" name="operation_code" disabled>
                <option value="{{$operationNo}}">{{$operationNo}}</option>
            </select>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-8">
            <label for="scanInput">Scan Item:</label>
            <input type="text" id="scanInput" class="form-control" name="scanInput" autofocus>
            
        </div>
    </div>
</form>
  <div class="row">
        <div class="col-md-4">
            <a href="{{route('production.index')}}"><button type="submit" class="btn btn-primary">Back</button></a>
            <button type="button" class="btn btn-secondary" id="refreshButton">Refresh</button>
        </div>
    
    </div>
    <script>
    window.onload = function() {
        // Focus on the scan input field when the page loads or reloads
        const scanInput = document.getElementById('scanInput');
        if (scanInput) {
            scanInput.focus();
        }
    };
</script>
                </div>

              <!-- Table Section -->
<div class="row">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Production Records</h2>
                </div>
            </div>
            <div class="padding_infor_info">
              <!-- Button Section -->
<div class="mb-3 d-flex justify-content-end">
    <button class="btn btn-secondary me-2" id="manualEntryBtn" data-bs-toggle="modal" data-bs-target="#manualEntryModal">Manual Entry</button>
    <button class="btn btn-warning" id="editLastQuantityBtn">Edit Last Quantity</button>
</div>



 <a href="{{ route('export.scannedRecords') }}" class="btn btn-success me-2">Export to ERP Excel</a>
    <a href="{{ route('export.productionPDF') }}" class="btn btn-danger me-2">Export to PDF</a> <!-- New Button for PDF -->
    <a href="{{ route('export.production.Excel') }}" class="btn btn-primary">Export to Excel</a>
                  

                <div class="table-responsive-sm">
                           <div class="mb-3 d-flex justify-content-end align-items-center" style="width: fit-content; float:right">
    <label for="searchInput" class="me-2 mb-0">Search:</label>
    <input type="text" id="searchInput" class="form-control" placeholder="Search records..." style="width: 300px;">
</div>
                    <table class="table" id="records_table">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>WO No.</th>
                                <th>Part No.</th>
                                <th>PO No.</th>
                                <th>SO No</th>
                                <th>Line No</th>
                                <th>Operation No</th>
                                <th>Quantity</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($scannedRecords as $record)
                              <tr data-id="{{ $record->id }}"> <!-- Corrected from data-id== to data-id= -->
                <td>{{ $loop->iteration }}</td>
                <td>{{ $record->wo_no }}</td>
                <td>{{ $record->part_no }}</td>
                <td>{{ $record->po_no }}</td>
                <td>{{ $record->so_no }}</td>
                 <td>{{ $record->line_no }}</td>
                <td>{{ $record->operation_no }}</td>
                <td class="quantity">{{ $record->quantity }}</td>
                <td>{{ $record->updated_at }}</td>
            </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Manual Entry -->
<!-- Modal for Manual Entry -->
 <div class="modal fade" id="manualEntryModal" tabindex="-1" aria-labelledby="manualEntryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="manualEntryModalLabel">Manual Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="manualEntryForm">
                    <div class="mb-3">
                        <label for="modalWorkOrderNo" class="form-label">Work Order No</label>
                        <select class="form-control" id="modalWorkOrderNo" name="wo_no" required>
                            <option value="">Select Work Order No</option>
                            @foreach($woNo as $temp)
                                <option value="{{ $temp->wo_no }}" {{ old('wo_no') == $temp->wo_no ? 'selected' : '' }}>
                                    {{ $temp->wo_no }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="modalOperationCode" class="form-label">Operation No</label>
                        <select class="form-control" id="modalOperationCode" name="operation_no" required>
                            <option value="">Select Operation Code</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="modalPartNo" class="form-label">Part No</label>
                        <input type="text" class="form-control" id="modalPartNo" name="part_no" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalPartNo" class="form-label">Po No</label>
                        <input type="text" class="form-control" id="modalPoNo" name="po_no" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalSONo" class="form-label">SO No</label>
                        <input type="text" class="form-control" id="modalSONo" name="so_no" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalSONo" class="form-label">Line No</label>
                        <input type="text" class="form-control" id="modalSONo" name="line_no" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="modalQuantity" name="quantity" required>
                    </div>
                    <!-- Add other fields as necessary -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveManualEntryBtn">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Edit Quantity -->
<!-- Add this section for the Edit Quantity Modal -->
<div class="modal fade" id="editQuantityModal" tabindex="-1" aria-labelledby="editQuantityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editQuantityModalLabel">Edit Quantity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editQuantityForm">
                    <div class="mb-3">
                        <label for="edit_quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="edit_quantity" name="quantity" required>
                        <input type="hidden" id="edit_record_id" name="record_id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateQuantityBtn">Update</button>
            </div>
        </div>
    </div>
</div>
            </div>

            <x-footer />
        </div>
    </div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Custom CSS -->
<style>
    .select2-container--default .select2-selection--single {
        background-color: #fff ! important;
         border: 0px solid #aaa !important;
        border-radius: 4px ! important;
    }

</style>
<script>
    document.getElementById('scanInput').addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent default form submission

            // Get selected values
            const workOrderNo = document.getElementById('work_order_no').value;
            const operationCode = document.getElementById('operation_code').value;
            const scannedCode = this.value.trim(); // Get scanned value from input field

            // Simple validation before sending the request
            if (!workOrderNo || !operationCode || !scannedCode) {
                alert('Please select Work Order No, Operation Code, and scan a barcode.');
                return;
            }

            // Send AJAX request
            fetch("{{ route('scan.barcodes.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    work_order_no: workOrderNo,
                    operation_code: operationCode,
                    scanInput: scannedCode
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // alert(data.success);
                    this.value = ''; // Clear the input field after successful submission
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Initialize Select2 for modal Work Order No
        $('#modalWorkOrderNo').select2({
            placeholder: "Select Work Order No",
            allowClear: true
        }).next('.select2-container').addClass('form-control'); // Add form-control class

        // Initialize Select2 for modal Operation Code
        $('#modalOperationCode').select2({
            placeholder: "Select Operation Code",
            allowClear: true
        }).next('.select2-container').addClass('form-control'); // Add form-control class

        // On change of Work Order No
        $('#modalWorkOrderNo').on('change', function() {
            var woNo = $(this).val();
            if (woNo) {
                $.ajax({
                    url: "{{ route('get.operation.codes') }}",  // Route to fetch operation codes
                    type: "GET",
                    data: { wo_no: woNo },
                    success: function(data) {
                        $('#modalOperationCode').empty().append('<option value="">Select Operation Code</option>');
                        $.each(data, function(key, value) {
                            $('#modalOperationCode').append('<option value="' + value.operation_code + '">' + value.operation_code + '</option>');
                        });
                    }
                });
            } else {
                $('#modalOperationCode').empty().append('<option value="">Select Operation Code</option>');
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Initialize Select2 with form-control class styling
        $('#work_order_no').select2({
            placeholder: "Select Work Order No",
            allowClear: true
        }).next('.select2-container').addClass('form-control');

        $('#operation_code').select2({
            placeholder: "Select Operation Code",
            allowClear: true
        }).next('.select2-container').addClass('form-control');
    });
</script>

<script>
    $(document).ready(function() {
        $('#work_order_no').on('change', function() {
            var woNo = $(this).val();
            if (woNo) {
                $.ajax({
                    url: "{{ route('get.operation.codes') }}",  // Route to fetch operation codes
                    type: "GET",
                    data: { wo_no: woNo },
                    success: function(data) {
                        $('#operation_code').empty().append('<option value="">Select Operation Code</option>');
                        $.each(data, function(key, value) {
                            $('#operation_code').append('<option value="' + value.operation_code + '">' + value.operation_code + '</option>');
                        });
                    }
                });
            } else {
                $('#operation_code').empty().append('<option value="">Select Operation Code</option>');
            }
        });
    });
</script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Set up CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Open manual entry modal
        $('#manualEntryBtn').on('click', function() {
            $('#manualEntryForm')[0].reset(); // Clear input fields for new entry
            $('#manualEntryModal').modal('show');
        });

        // Save Manual Entry
        $('#saveManualEntryBtn').on('click', function() {
            // Gather data from the modal form
            const data = $('#manualEntryForm').serialize();

            // Send data via AJAX
            $.ajax({
                url: "{{ route('manual.entry.store') }}", // Your route
                type: 'POST',
                data: data,
                success: function(response) {
                    // Show success message
                    // alert(response.success);
                    
                    // Update the table with the new records
                    let newRows = '';
                    $.each(response.records, function(index, record) {
                        newRows += `<tr>
                            <td>${index + 1}</td>
                            <td>${record.wo_no}</td>
                            <td>${record.part_no}</td>
                            <td>${record.po_no}</td>
                            <td>${record.so_no}</td>
                            <td>${record.line_no}</td>
                            <td>${record.operation_no}</td>
                            <td>${record.quantity}</td>
                            <td>${record.created_at}</td>
                        </tr>`;
                    });
                    $('#records_table tbody').html(newRows); // Update table body
                    $('#manualEntryModal').modal('hide'); // Close modal
                     location.reload();
                },
                error: function(xhr) {
                    // Handle errors
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = '';
                    for (const error in errors) {
                        errorMessage += errors[error].join(' ') + '\n';
                    }
                  alert(xhr.responseJSON.message);  // Display validation errors
                }
            });
        });
    });
</script>
<script>
  $(document).ready(function() {
    // Handle edit last quantity button click
    $('#editLastQuantityBtn').on('click', function() {
        const firstRow = $('#records_table tbody tr').first(); // Get the first row
        const recordId = firstRow.data('id'); // Get record ID from data attribute
        const quantity = firstRow.find('.quantity').text(); // Get quantity

        // Populate the modal input field with the quantity
        $('#edit_quantity').val(quantity);
        $('#edit_record_id').val(recordId); // Set record ID for the update

        // Show the modal
        $('#editQuantityModal').modal('show');
    });

    // Handle quantity update
    $('#updateQuantityBtn').on('click', function() {
        const data = $('#editQuantityForm').serialize(); // Gather data from the modal form

        // Send data via AJAX to update the quantity
        $.ajax({
            url: "{{ route('update.quantity') }}", // Your route to handle update
            type: 'POST',
            data: data,
            success: function(response) {
                if (response.success) {
                    // Show success message dynamically from the response
                    alert(response.message);

                    // Update the quantity in the table
                    const newQuantity = $('#edit_quantity').val();
                    $('#records_table tbody tr').first().find('.quantity').text(newQuantity); // Update quantity in the first row

                    // Reload the window to reflect changes
                    location.reload(); // Refresh the page

                    $('#editQuantityModal').modal('hide'); // Close the modal
                } else {
                    // Show error message dynamically from the response
                    alert(response.message);
                }
            },
            error: function(xhr) {
                let errorMessage = 'An error occurred. Please try again.';

                // Handle validation errors or custom error messages
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.errors) {
                        errorMessage = '';
                        for (const key in xhr.responseJSON.errors) {
                            if (xhr.responseJSON.errors.hasOwnProperty(key)) {
                                errorMessage += xhr.responseJSON.errors[key].join(' ') + '\n';
                            }
                        }
                    } else if (xhr.responseJSON.message) {
                        // Set errorMessage to the server message if available
                        errorMessage = xhr.responseJSON.message;
                    }
                }

                // Display error message from server response
                alert(errorMessage);
            }
        });
    });
});
</script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var searchValue = $(this).val().toLowerCase();
            $('#records_table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1);
            });
        });
    });
</script>
<script>
document.getElementById('refreshButton').addEventListener('click', function() {
    location.reload(); // Refresh the page
});
</script>

</body>
</html>
