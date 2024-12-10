  <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <!--<div class="logo_section">-->
                        <!--   <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>-->
                        <!--</div>-->
                        <div class="right_topbar">
                           <div class="icon_info">
                            =
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{asset('images/layout_img/user_img.jpg')}}" alt="#" /><span class="name_user">{{Auth::user()->name}}</span></a>
                                    <div class="dropdown-menu">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span>Log Out</span> <i class="fa fa-sign-out"></i>
                                    </a>

                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
                     <!-- jQuery -->
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/popper.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <!-- wow animation -->
      <script src="{{asset('js/animate.js')}}"></script>
      <!-- select country -->
      <script src="{{asset('js/bootstrap-select.js')}}"></script>
      <!-- owl carousel -->
      <script src="{{asset('js/owl.carousel.js')}}"></script> 
      <!-- chart js -->
      <script src="{{asset('js/Chart.min.js')}}"></script>
      <script src="{{asset('js/Chart.bundle.min.js')}}"></script>
      <script src="{{asset('js/utils.js')}}"></script>
      <script src="{{asset('js/analyser.js')}}"></script>
      <!-- nice scrollbar -->
      <script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{asset('js/chart_custom_style1.js')}}"></script>
      <script src="{{asset('js/custom.js')}}"></script>