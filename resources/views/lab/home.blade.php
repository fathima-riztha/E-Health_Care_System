<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="Admin/assets/img/HMC logo.png">
    <title>Habeeba Medical Center</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="Admin/assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/fullcalendar.min.css">
     <link rel="stylesheet" type="text/css" href="Admin/assets/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/chart.js">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="index-2.html" class="logo">
                     <span>Habeeba Medical Center</span>
                </a>
            </div>
           
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">3</span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
                </li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="Admin/assets/img/user-03.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <span>{{ $user->name }}</span>
                    </a>
                    <div class="dropdown-menu">
                        
                        <a class="dropdown-item" href="{{ url('admin.logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
            
        </div>
         <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li style="text-align: center;"><a href="index-2.html" class="logo">
                    <img src="../assets/img/HMC logo.png" width="75" height="70" style="display: block; margin: 8 auto;" alt=""> 
                </a></li>
               
               
                 
            
                
               
              <li class="{{ Request::is('admin.viewtest') ? 'active' : '' }}">
                    <a href="{{ url('admin.viewtest') }}"><i class="fa fa-flask"></i> <span>View Test Orders</span></a>
                </li>
                 <li class="{{ Request::is('admin.uploadtest') ? 'active' : '' }}">
                    <a href="{{ url('admin.uploadtest') }}"><i class="fa fa-file"></i> <span>Upload Tests</span></a>
                </li>

            </ul>
            </ul>
        </div>
    </div>



  





























</div>



   
   <div class="sidebar-overlay" data-reff=""></div>
    <script src="Admin/assets/js/jquery-3.2.1.min.js"></script>
    <script src="Admin/assets/js/popper.min.js"></script>
    <script src="Admin/assets/js/bootstrap.min.js"></script>
    <script src="Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="Admin/assets/js/select2.min.js"></script>
    <script src="Admin/assets/js/moment.min.js"></script>
    <script src="Admin/assets/js/jquery-ui.min.html"></script>
    <script src="Admin/assets/js/fullcalendar.min.js"></script>
    
    <script src="Admin/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="Admin/assets/js/app.js"></script>

 <script>
    $(document).ready(function () {
        var $calendar = $('#calendar');

        $calendar.fullCalendar({

            
        });
    });
</script>
</body>


<!-- schedule23:21-->
</html>