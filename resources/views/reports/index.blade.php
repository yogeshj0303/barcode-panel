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
                              <h2>Barcode Report Tables</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                     <div class="row">
                     
                        <!-- table section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Barcode Report</h2>
                                      </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                               <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S. No</th>
                                                <th>WO No.</th>
                                               
                                                <!--<th>Barcode Image</th>-->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($reports as $index => $report)
                                            <tr>
                                                  <td>{{ $reports->firstItem() + $index }}</td><!-- Serial Number -->
                                         
                                                <td>{{ $report->wo_no }}</td> <!-- WO No. -->
                                               
                                                <!--<td><img src="{{ asset('storage/' . $report->barcode_path) }}" alt="Barcode" style="width: 200px; height: 60px;"></td>-->
                                                <td>
                                                            <a href="{{ route('barcode.details', $report->wo_no) }}">
                                                                <button type="button" class="btn cur-p btn-danger">View</button>
                                                            </a>
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
   </body>
</html>