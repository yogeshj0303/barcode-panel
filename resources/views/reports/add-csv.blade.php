<!DOCTYPE html>
<html lang="en">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <body class="dashboard dashboard_1">
      <!--<div class="full_container">-->
         <!--<div class="inner_container">-->
            <!-- Sidebar  -->
            <x-sidebar />
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
             <x-header />
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                 <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Barcode Table</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                   @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
                     <div class="row">
                     
                        <!-- table section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                               <div class="full graph_head d-flex justify-content-between align-items-center">
                                        <div class="heading1 margin_0">
                                             <h2>Barcode Report</h2>
                                        </div>
                                        <div>
                                            <button type="button" class="model_bt btn btn-primary" data-toggle="modal" data-target="#myModal">Upload CSV</button>
                                        </div>
                                    </div>
                           <form id="delete-selected-form" action="{{ route('barcode.deleteSelected') }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="selected_ids" id="selected-ids">
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the selected reports?')">Delete Selected</button>
</form>

                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                               <table class="table">
    <thead>
        <tr>
            <th><input type="checkbox" id="select-all"></th> <!-- Select all checkbox -->
            <th>S. No</th>
            <th>WO No.</th>
            <th>Part No.</th>
            <th>SO No.</th>
            <th>Line No.</th>
            <th>Operation Code</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $index => $report)
        <tr>
            <td><input type="checkbox" name="report_ids[]" value="{{ $report->id }}" class="report-checkbox"></td> <!-- Checkbox for each row -->
            <td>{{ $reports->firstItem() + $index }}</td> <!-- Serial Number -->
            <td>{{ $report->wo_no }}</td> <!-- WO No. -->
            <td>{{ $report->part_no }}</td> <!-- Part No. -->
            <td>{{ $report->so_no }}</td> <!-- SO No. -->
            <td>{{ $report->line_no }}</td> <!-- Line No. -->
               <td>
                <button type="button" class="btn btn-info" onclick="viewScannedQuantity('{{ $report->wo_no }}', '{{ $report->part_no }}', '{{ $report->line_no }}', '{{ $report->operation_code }}')">
                    {{ $report->operation_code }}
                </button>
            </td>
            <td>{{ $report->quantity }}</td> <!-- Quantity -->
            <td>
                <form action="{{ route('barcode.destroy', $report->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn cur-p btn-danger" onclick="return confirm('Are you sure you want to delete this report?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                           
<!-- Pagination Links -->
<div class="d-flex justify-content-between">
    <div>
        Showing {{ $reports->firstItem() }} to {{ $reports->lastItem() }} of {{ $reports->total() }} entries
    </div>
    <div>
        {{ $reports->links() }} <!-- This generates the pagination links -->
    </div>
</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
             <div class="modal fade" id="myModal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Import CSV File</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <form id="uploadForm">
                  <div class="modal-body">
        
          <div class="mb-3">
            <label for="fileInput" class="form-label">Select CSV File</label>
               <input type="file" class="form-control" id="fileInput" name="file" accept=".csv" required>
          </div>
          <p class="text-muted">* Please upload the file in CSV format.</p>
    
      </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary" id="importBtn">Import</button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                      </form>
               </div>
            </div>
         </div>
         <!-- end model popup -->
                  <!-- footer -->
             <x-footer />
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <script>
          document.getElementById('importBtn').addEventListener('click', function () {
    const formData = new FormData(document.getElementById('uploadForm'));

    fetch('/import-barcode', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
        } else {
                alert(data.message);
                $('#myModal').modal('hide'); // Using jQuery to hide the modal
                // Redirect to the desired route after successful import
                window.location.href = '/import-csv'; // Change to your actual route
            }
    })
    .catch(error => console.error('Error:', error));
});

      </script>
<script>
    // Select/Deselect all checkboxes
    document.getElementById('select-all').addEventListener('click', function() {
        let checkboxes = document.querySelectorAll('.report-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    // Submit the form with selected IDs
    document.getElementById('delete-selected-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        let selectedIds = [];
        let checkboxes = document.querySelectorAll('.report-checkbox:checked');

        checkboxes.forEach(checkbox => {
            selectedIds.push(checkbox.value);
        });

        if (selectedIds.length > 0) {
            document.getElementById('selected-ids').value = JSON.stringify(selectedIds);
            this.submit();
        } else {
            alert('Please select at least one report to delete.');
        }
    });
</script>

<script>
    function viewScannedQuantity(woNo, partNo, lineNo, operationCode) {
        // Make an AJAX request to fetch the scanned quantity
        fetch(`/scan-quantity?wo_no=${woNo}&part_no=${partNo}&line_no=${lineNo}&operation_code=${operationCode}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Display the quantity in an alert or a modal (here using alert for simplicity)
                    alert(`WO No: ${woNo}\nPart No: ${partNo}\nLine No: ${lineNo}\nOperation Code: ${operationCode}\nScanned Quantity: ${data.quantity}`);
                } else {
                    alert(`No scanned quantity found for the selected record.`);
                }
            })
            .catch(error => {
                console.error('Error fetching scanned quantity:', error);
                alert('An error occurred while fetching scanned quantity.');
            });
    }
</script>


   </body>
</html>