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
                     <span>Habeeba Medical</span>
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
                            <img class="rounded-circle" src="Admin/assets/img/user.jpg" width="24" alt="Admin">
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
                <li class="menu-title" style="text-align: center;">Doctor App</li>
                <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ url('home') }}"><i class="fa fa-user"></i> <span>My Profile</span></a>
                </li>
                <li class="{{ Request::is('admin.calendar') ? 'active' : '' }}">
                    <a href="{{ url('doctor.calendar') }}"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                </li>
                <li class="{{ Request::is('doctor.appointments') ? 'active' : '' }}">
                    <a href="{{ url('doctor.appointments') }}"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                </li>
                <li class="{{ Request::is('doctor.search') ? 'active' : '' }}">
                    <a href="{{ url('doctor.search') }}"><i class="fa fa-search"></i> <span>Search</span></a>
               </li>
               
            </ul>
        </div>
    </div>
 </div>

       <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-8 col-4">
                        <h4 class="page-title">Calendar</h4>

                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box mb-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
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

        // Initialize the calendar
        $calendar.fullCalendar({
            events: function(start, end, timezone, callback) {
                var doctorId = {{ $doctorId }}; // Assuming you have the doctor_id available in the view
                var url = "{{ url('getDoctorAppointments') }}" + "/" + doctorId;

                // Fetch appointments data using AJAX
                $.ajax({
                    url: url,
                    dataType: 'json',
                    success: function(response) {
                        var events = [];
                        var dates = {}; // Object to store the count of appointments for each date

                        response.forEach(function(appointment) {
                            var date = appointment.appointment_date;
                            if (dates[date]) {
                                dates[date]++;
                            } else {
                                dates[date] = 1;
                            }
                        });

                        for (var date in dates) {
                            events.push({
                                title: 'Appointments: ' + dates[date],
                                start: date
                            });
                        }

                        callback(events);
                    }
                });
            }
        });
    });
</script>









</body>



</html>
