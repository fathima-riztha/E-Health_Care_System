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
                        <h4 class="page-title">Patients</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="#" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#add_event"><i class="fa fa-plus"></i> Add Patients</a>
                    </div>
                </div>


               <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Patient Id</th>
                                        <th>Patient Name</th>
                                        <th>Address</th>
                                        <th>Phone No</th>
                                        <th class="text-right">Email</th>
                                    </tr>
                                </thead>
                                <tbody>

                                     @foreach($patients as $patient)
                                        

                                  
                                    <tr>
                                       <td><img width="28" height="28" src="Admin/assets/img/user.jpg" class="rounded-circle m-r-5" alt="">{{ $patient->id }}</td>
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->address }}</td>
                                        <td>{{ $patient->phone }}</td>
                                        
                                        <td class="text-right">{{ $patient->email }}</td>
                                    
                                    </tr>
                                     @endforeach
                                </tbody>     
                            </table>
                             <br>
      
                                <div class="pagination-container text-right">
                                {{ $patients->links() }}
                                 </div>  
                        </div>
                </div>
               
            </div>
            
        
        
    </div>



   <div id="add_event" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content modal-md">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Patient</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.addPatient') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                
                                    <input class="form-control" type="text" name="email" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Phone<span class="text-danger">*</span></label>
                                
                                    <input class="form-control" type="text" name="phone" >
                               
                            </div>
                            <div class="form-group">
                                <label>Address<span class="text-danger">*</span></label>
                               
                                    <input class="form-control" type="text" name="address" >
                                
                            </div>
                            <div class="form-group">
                                <label>Password<span class="text-danger">*</span></label>
                               <input class="form-control" type="password" name="password" required >
                               
                            </div>
                            
                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Create Profile</button>
                            </div>
                        </form>
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