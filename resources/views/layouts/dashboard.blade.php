<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wrappixel.com/demos/admin-templates/material-pro/horizontal/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Nov 2017 10:13:07 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Verleen, peer-to-peer platform">
    <meta name="author" content="">
    <!-- Favicon icon -->
   <!-- <link rel="icon" type="image/png" sizes="16x16" href="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/favicon.png">-->
    <title>Verleen</title>
    <!-- Bootstrap Core CSS -->
    <link href="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('dashboard/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
    title:{
        text: "Weekly Revenue Analysis for First Quarter"
    },
    axisY:[{
        title: "Order",
        lineColor: "#C24642",
        tickColor: "#C24642",
        labelFontColor: "#C24642",
        titleFontColor: "#C24642",
        suffix: "k"
    },
    {
        title: "Footfall",
        lineColor: "#369EAD",
        tickColor: "#369EAD",
        labelFontColor: "#369EAD",
        titleFontColor: "#369EAD",
        suffix: "k"
    }],
    axisY2: {
        title: "Revenue",
        lineColor: "#7F6084",
        tickColor: "#7F6084",
        labelFontColor: "#7F6084",
        titleFontColor: "#7F6084",
        prefix: "$",
        suffix: "k"
    },
    toolTip: {
        shared: true
    },
    legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries
    },
    data: [{
        type: "line",
        name: "Footfall",
        color: "#369EAD",
        showInLegend: true,
        axisYIndex: 1,
        dataPoints: [
            { x: new Date(2017, 00, 7), y: 85.4 }, 
            { x: new Date(2017, 00, 14), y: 92.7 },
            { x: new Date(2017, 00, 21), y: 64.9 },
            { x: new Date(2017, 00, 28), y: 58.0 },
            { x: new Date(2017, 01, 4), y: 63.4 },
            { x: new Date(2017, 01, 11), y: 69.9 },
            { x: new Date(2017, 01, 18), y: 88.9 },
            { x: new Date(2017, 01, 25), y: 66.3 },
            { x: new Date(2017, 02, 4), y: 82.7 },
            { x: new Date(2017, 02, 11), y: 60.2 },
            { x: new Date(2017, 02, 18), y: 87.3 },
            { x: new Date(2017, 02, 25), y: 98.5 }
        ]
    },
    {
        type: "line",
        name: "Order",
        color: "#C24642",
        axisYIndex: 0,
        showInLegend: true,
        dataPoints: [
            { x: new Date(2017, 00, 7), y: 32.3 }, 
            { x: new Date(2017, 00, 14), y: 33.9 },
            { x: new Date(2017, 00, 21), y: 26.0 },
            { x: new Date(2017, 00, 28), y: 15.8 },
            { x: new Date(2017, 01, 4), y: 18.6 },
            { x: new Date(2017, 01, 11), y: 34.6 },
            { x: new Date(2017, 01, 18), y: 37.7 },
            { x: new Date(2017, 01, 25), y: 24.7 },
            { x: new Date(2017, 02, 4), y: 35.9 },
            { x: new Date(2017, 02, 11), y: 12.8 },
            { x: new Date(2017, 02, 18), y: 38.1 },
            { x: new Date(2017, 02, 25), y: 42.4 }
        ]
    },
    {
        type: "line",
        name: "Revenue",
        color: "#7F6084",
        axisYType: "secondary",
        showInLegend: true,
        dataPoints: [
            { x: new Date(2017, 00, 7), y: 42.5 }, 
            { x: new Date(2017, 00, 14), y: 44.3 },
            { x: new Date(2017, 00, 21), y: 28.7 },
            { x: new Date(2017, 00, 28), y: 22.5 },
            { x: new Date(2017, 01, 4), y: 25.6 },
            { x: new Date(2017, 01, 11), y: 45.7 },
            { x: new Date(2017, 01, 18), y: 54.6 },
            { x: new Date(2017, 01, 25), y: 32.0 },
            { x: new Date(2017, 02, 4), y: 43.9 },
            { x: new Date(2017, 02, 11), y: 26.4 },
            { x: new Date(2017, 02, 18), y: 40.3 },
            { x: new Date(2017, 02, 25), y: 54.2 }
        ]
    }]
});
chart.render();

function toggleDataSeries(e) {
    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    } else {
        e.dataSeries.visible = true;
    }
    e.chart.render();
}

}
</script>
</head>

<body class="fix-header fix-sidebar card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->

                            <label style="color: white;" class="hidden-sm hidden-xs">
                                Verleen
                            </label>

                            
                           <!-- <img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />-->
                            <!-- Light Logo icon -->

                           
                            <!--<img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!--<span>-->
                         <!-- dark Logo text -->
                         
                        <!-- <img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/logo-text.png" alt="homepage" class="dark-logo" />-->
                         <!-- Light Logo text -->  
                        
                         <!--<img src="https://wrappixel.com/demos/admin-templates/material-pro/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span>-->

                          </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                                              <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('dashboard/assets/images/avatar.jpg')}}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{asset('dashboard/assets/images/avatar.jpg')}}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{Auth::user()->name}}</h4>
                                                <p class="text-muted">{{Auth::user()->phone}}</p></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('user.profile.view')}}"><i class="ti-user"></i> My Profile</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <i class="fa fa-power-off"></i>  Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                   
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
          <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li>
                            <a class="has-arrow" href="{{route('home')}}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Dashboard </span></a>
                        </li>
                        <li>
                            <a class="has-arrow" href="{{route('user.profile.view')}}" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Profile </span></a>
                        </li>
                        <li>
                            
                               <a href="{{route('user.help.provide')}}"><i class="mdi mdi-basket-fill"></i>Provide Help</a>
                            
                        </li>
                        
                        <li>
                            <a class="has-arrow" href="{{route('user.wallet.view')}}" aria-expanded="false"><i class="mdi mdi-credit-card"></i><span class="hide-menu">Wallet </span></a>
                        </li>

                        <!--<li class="">
                            <a class="has-arrow" href="retainment.html" aria-expanded="false"><i class="mdi mdi-export"></i><span class="hide-menu">Retainment </span></a>
                        </li>-->

                        <li>
                            <a class="has-arrow" href="{{route('user.bonus.reg')}}" aria-expanded="false">
                                <i class="mdi mdi-lan">
                                
                            </i><span class="hide-menu">Registration bonus</span></a>
                        </li>

                        <li>
                            <a class="has-arrow" href="{{route('user.bonus.ref')}}" aria-expanded="false"><i class="mdi mdi-source-branch"></i><span class="hide-menu">Referral </span></a>
                        </li>
                        <li>
                            <a class="has-arrow" href="{{route('user.testimony.view')}}" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">Testimony </span></a>
                        </li>
                        <li>
                            <a class="has-arrow" href="{{route('user.news.list')}}" aria-expanded="false"><i class="mdi mdi-bullhorn"></i><span class="hide-menu">News </span></a>
                        </li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
















@yield('content')







            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © <?php echo date('Y'); ?> Verleen | verleen.online </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->



    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('dashboard/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('dashboard/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('dashboard/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('dashboard/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/d3/d3.min.js"></script>
    <script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="{{asset('dashboard/js/dashboard1.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ab4f7794b401e45400dfdea/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/material-pro/horizontal/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Nov 2017 10:15:24 GMT -->
</html>
