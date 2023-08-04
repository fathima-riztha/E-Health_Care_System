<html lang="en">

<head>
    <base href="/public">
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
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Doctor</h4>
                    </div>
                </div>

                @if(session()->has('message'))

                <div class="alert alert-success">
                    
                    
                    {{session()->get('message')}}
                </div>



                @endif
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{url('updatedoctor',$data->id)}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Firstname <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="firstname" required="" value="{{$data->firstname}}" style="color: black;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <input class="form-control" type="text" name="lastname" value="{{$data->lastname}}" style="color: black;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="username" required="" value="{{$data->username}}" style="color: black;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" required="" value="{{$data->email}}" style="color: black;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password" required="" value="{{$data->password}}" style="color: black;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type="password" name="confirmpassword" required="" value="{{$data->confirmed_password}}" style="color: black;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="dob" value="{{$data->dob}}"style="color: black;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Gender:</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" class="form-check-input" value="male" {{ $data->gender === 'male' ? 'checked' : '' }}>Male
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" class="form-check-input" value="female" {{ $data->gender === 'female' ? 'checked' : '' }}>Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control " name="address" value="{{$data->address}}" style="color: black;">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>NIC Number</label>
                                                <input type="text" class="form-control" name="nic" value="{{$data->nic}}" required="" style="color: black;">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Appointment Fee</label>
                                                <input type="text" class="form-control" name="fees" value="{{$data->appointment_fee}}" style="color: black;">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-3">
    <div class="form-group">
        <label>Speciality</label>
        <select name="speciality">
            <option value="" disabled>Select</option>
            <option value="Neurologist" {{ $data->speciality === 'Neurologist' ? 'selected' : '' }}>Neurologist</option>
            <option value="Pediatrician" {{ $data->speciality === 'Pediatrician' ? 'selected' : '' }}>Pediatrician</option>
            <option value="Family medicine" {{ $data->speciality === 'Family medicine' ? 'selected' : '' }}>Family medicine</option>
            <option value="Urologists" {{ $data->speciality === 'Urologists' ? 'selected' : '' }}>Urologists</option>
            <option value="Cardiologist" {{ $data->speciality === 'Cardiologist' ? 'selected' : '' }}>Cardiologist</option>
            <option value="Psychiatrist" {{ $data->speciality === 'Psychiatrist' ? 'selected' : '' }}>Psychiatrist</option>
            <option value="Dermatology" {{ $data->speciality === 'Dermatology' ? 'selected' : '' }}>Dermatology</option>
            <option value="ophthalmologist" {{ $data->speciality === 'ophthalmologist' ? 'selected' : '' }}>ophthalmologist</option>
        </select>
    </div>
</div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="number" name="phone" value="{{$data->phone}}" style="color: black;">
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Old Image </label>
                                        <img src="doctorimage/{{$data->image}}" height="50px" width="50px">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img alt="" src="Admin/assets/img/user.jpg">
                                            </div>
                                            <div class="upload-input">

                                                <input type="file" name="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="doctor_active" value="option1" checked>
                                    <label class="form-check-label" for="doctor_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="option2">
                                    <label class="form-check-label" for="doctor_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Edit Doctor</button>
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



</html>