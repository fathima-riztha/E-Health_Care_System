<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="Admin/assets/img/HMC logo.png">
    <title>Habeeba Medical Center</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
              
                <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                 <li class="{{ Request::is('admin.calendar') ? 'active' : '' }}">
                    <a href="{{ url('admin.calendar') }}"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                </li>
                <li class="{{ Request::is('admin.doctors') ? 'active' : '' }}">
                    <a href="{{ url('admin.doctors') }}"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                </li>
                <li class="{{ Request::is('admin.patients') ? 'active' : '' }}">
                    <a href="{{ url('admin.patients') }}"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                </li>
                <li class="{{ Request::is('admin.appointments') ? 'active' : '' }}">
                    <a href="{{ url('admin.appointments') }}"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                </li>
                 <li class="{{ Request::is('admin.notification') ? 'active' : '' }}">
                    <a href="{{ url('admin.notification') }}"><i class="fa fa-bell-o"></i> <span>Notification</span></a>
                </li>
              <li class="{{ Request::is('admin.doctor_schedule') ? 'active' : '' }}">
                    <a href="{{ url('admin.doctor_schedule') }}"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                </li>
                <li class="{{ Request::is('admin.payments') ? 'active' : '' }}">
                    <a href="{{ url('admin.payments') }}"><i class="fa fa-money"></i> <span>Payments</span></a>
                </li>
                
                <li class="{{ Request::is('admin.dailyincome') ? 'active' : '' }}"><a href="{{ url('admin.dailyincome') }}">Daily Income</a></li>
                                        
                <li class="{{ Request::is('admin.monthlyincome') ? 'active' : '' }}"><a href="{{ url('admin.monthlyincome') }}">Monthly Income</a></li>
                <li class="{{ Request::is('admin.searchincome') ? 'active' : '' }}"><a href="{{ url('admin.searchincome') }}">Search Income</a></li>
            </ul>
        </div>
    </div>
</div>



   <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Schedule</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{url('admin.addSchedule') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Schedule</a>
                    </div>
                </div>


               <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Doctor Id</th>
                                        <th>Doctor Name</th>
                                       
                                        <th>Available Days</th>
                                        <th>Available Time</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($data as $doctorschedule)

                                  
                                    <tr>
                                        <td>{{$doctorschedule->doctor_id}}</td>
                                        <td><img width="28" height="28" src="Admin/assets/img/user.jpg" class="rounded-circle m-r-5" alt="">{{$doctorschedule->doc_name}}</td>
                                       
                                        <td>{{$doctorschedule->days}}</td>
                                        <td>{{$doctorschedule->start_time}}-{{$doctorschedule->end_time}}</td>
                                        <td>{{$doctorschedule->status}}</td>
                                        <td class="text-right">
    
                                                 <a href="{{url('admin.edit_schedule',$doctorschedule->id)}}" class="action-icon"><i class="fa fa-pencil"></i></a>
                                                 <a href="{{url('deleteSchedule',$doctorschedule->id)}}" class="action-icon"  ><i class="fa fa-trash-o"></i></a>
                                           </td>

                                    </tr>
                                    
                                     @endforeach
                            </table>
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
    <script src="Admin/assets/js/Chart.bundle.js"></script>
    <script src="Admin/assets/js/chart.js"></script>
    <script src="Admin/assets/js/app.js"></script>
</body>


<!-- schedule23:21-->
</html>