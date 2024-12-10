<!DOCTYPE html>
<html lang="en">
   <meta name="csrf-token" content="{{ csrf_token() }}">
 <meta charset="UTF-8">

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
                              <h2>Barcode Details Table</h2>
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
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Barcode Details</h2>
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
                                                <th><input type="checkbox" id="select-all"></th> 
                                                <th>S. No</th>
                                                <th>Part No.</th>
                                                <th>SO No.</th>
                                                <th>Line No.</th>
                                                <th>Operation Code</th>
                                                <th>Quantity</th>
                                                <!--<th>Barcode Image</th>-->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($reports as $index => $report)
                                            <tr>
                                                     <td><input type="checkbox" name="report_ids[]" value="{{ $report->id }}" class="report-checkbox"></td> <!-- Checkbox for each row -->
                                                  <td>{{ $reports->firstItem() + $index }}</td><!-- Serial Number -->
                                         
                                                <td>{{ $report->part_no }}</td> <!-- Part No. -->
                                                <td>{{ $report->so_no }}</td> <!-- SO No. -->
                                                <td>{{ $report->line_no }}</td> <!-- Line No. -->
                                                <td>
                                                  <button type="button" class="btn btn-info" 
                        onclick="viewScannedQuantity('{{ $report->part_no }}', '{{ $report->line_no }}', '{{ $report->operation_code }}')">
                    {{ $report->operation_code }}
                </button>
                                                </td> <!-- Operation Code -->
                                                <td>{{ $report->quantity }}</td> <!-- Quantity -->
                                                <!--<td><img src="{{ asset('storage/' . $report->barcode_path) }}" alt="Barcode" style="width: 200px; height: 60px;"></td>-->
                                                <td>
                                                   <form action="{{ route('barcode.destroy', $report->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn cur-p btn-danger" onclick="return confirm('Are you sure you want to delete this report?')">Delete</button>
                </form>  </td>
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
            
                  <!-- footer -->
             <x-footer />
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
   <script>
$(document).ready(function() {
    $('.table').DataTable({
        // Customize options here if needed
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });
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
    function viewScannedQuantity(partNo, lineNo, operationCode){
        // Extract WO No. from the current URL
        const urlSegments = window.location.href.split('/');
        const woNo = urlSegments[urlSegments.length - 1]; // Get the last segment of the URL

        // Make an AJAX request to fetch the scanned quantity
        fetch(`/scan-quantity?wo_no=${woNo}&part_no=${partNo}&line_no=${lineNo}&operation_code=${operationCode}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Display the scanned quantity in an alert or a modal
                    alert(`WO No: ${woNo}\nOperation Code: ${operationCode}\nPart No: ${partNo}\nLine No: ${lineNo}\nScanned Quantity: ${data.quantity}`);
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