<!DOCTYPE html>
<html lang="en">
   
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
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
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <?php
                     $userCount = DB::table('users')->where('user_type','user')->count();
                     $scanBarCodeCount = DB::table('scan_brcodes')->count();
                     ?>
                     <div class="row column1">
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{$userCount}}</p>
                                    <p class="head_couter">Users</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-clock-o blue1_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{$scanBarCodeCount}}</p>
                                    <p class="head_couter">Scanned Barcodes</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-cloud-download green_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{$scanBarCodeCount}}</p>
                                    <p class="head_couter">Reports</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @if(Auth::user()->user_type == "admin")
                     <div class="row column1">
    <div class="col-md-6 col-lg-3">
        <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
                <div>
                    <i class="fa fa-database red_color"></i>
                </div>
            </div>
            <div class="counter_no">
                <div>
  <a href="{{ route('backup.store') }}" class="btn btn-primary">
    <p class="total_no">Download</p>
    <p class="head_couter">Database Backup</p>
</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endif
                    
                  </div>
                  <!-- footer -->
             <x-footer />
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>

   </body>
</html>