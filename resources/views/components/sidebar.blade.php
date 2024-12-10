<head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>V A Corporation | Admin Panel</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{asset('style.css')}}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{asset('css/colors.css')}}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{asset('css/perfect-scrollbar.css')}}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
<nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="{{asset('images/logo/logo_icon.png')}}" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="{{asset('images/layout_img/user_img.jpg')}}" alt="#" /></div>
                        <div class="user_info">
                           <h6>{{Auth::user()->name}}</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="{{url('/')}}" ><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                     
                     </li>
                     @if(Auth::user()->user_type == "admin")
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Reports</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="{{route('barcode.reports')}}">> <span>Import Report</span></a></li>
                           <li><a href="{{route('admin.reportsview')}}">> <span>View Report</span></a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Users Section</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="{{route('show.users')}}">> <span>View Users</span></a></li>
                           <li><a href="{{route('add.users')}}">> <span>Add User</span></a></li>
                        </ul>
                     </li>
                     @else
                     <li><a href="{{url('production-process-index')}}"><i class="fa fa-clock-o orange_color"></i> <span>Product Record Process</span></a></li>
                     <li><a href="{{route('packing.slip.index')}}"><i class="fa fa-table purple_color2"></i> <span>Packing Slip/Records</span></a></li>
                     @endif
                 <li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out yellow_color"></i>
        <span>Logout</span>
    </a>
</li>

                  </ul>
               </div>
            </nav>