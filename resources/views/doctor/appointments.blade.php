<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="Admin/assets/img/favicon.ico">
    <title>Habeeba Medical Center</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Admin/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->


</style>
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
                    <div class="col-lg-8 offset-lg-2">
                        
                        <h4 class="page-title"><i class="fa fa-calendar"></i> My Appointments</h4>
                    </div>
                </div>


                   <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Appointment Id</th>
                                        <th>Patient Id</th>
                                        <th>Patient Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   
                                  @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{$appointment->appointment_id}}</td>
                                        <td>{{$appointment->user_id}}</td>
                                        <td>{{$appointment->patient_name}}</td>
                                        <td>{{$appointment->appointment_date}}</td>
                                        <td>{{$appointment->appointment_time}}</td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">add</button></td>
                                       <td class="text-right">
                                      <form action="{{ route('appointment.updateStatus') }}" method="POST" id="updateStatusForm">
                                       @csrf
                                     <input type="hidden" name="appointment_id" value="{{ $appointment->appointment_id }}">
                                   <button type="submit" class="btn {{ $appointment->status === 'completed' ? 'btn-danger' : 'btn-success' }} status-toggle"">
                                              <i class="fa fa-check-square-o"></i>
                                        </button>
                                                </form>
                                           </td>

                                    </tr>
                                   @endforeach 
                                     
                            </table>
                        </div>
                </div>
                </div>


         </div>
     </div>


   <!--add channeling note form-->

      
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Channeling Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="{{ route('channelNote.store') }}" method="POST" enctype="multipart/form-data">

      @csrf
        
      <div class="modal-body">
       
    <div class="form-group">
    <label >Appointment Id</label>
    <input type="number" class="form-control" name="appid"  >
    </div>
    <div class="form-group">
    <label>Patient Id</label>
    <input type="number" class="form-control" name="pid" >
    </div>
    <div class="form-group">
    <label>Patient Name</label>
    <input type="text" class="form-control" name="patientname" >
    </div>
    <div class="form-group">
     <label>Age</label>
    <input type="number" class="form-control" name="age">
    </div>
    <div class="form-group">
     <label>Date</label>
    <input type="date" class="form-control" name="date">
    </div>
   
    <div class="form-group">
    <label>Gender</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="male" >
        <label class="form-check-label" >Male</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="female">
        <label class="form-check-label" >Female</label>
    </div>
   <div class="form-group">
    <label>Height (in cm)</label>
    <input type="number" class="form-control" name="height">
</div>

<div class="form-group">
    <label>Weight (in kg)</label>
    <input type="number" class="form-control" name="weight">
</div>

<div class="form-group">
    <label>Reason</label>
    <textarea class="form-control" name="reason"></textarea>
</div>

<div class="form-group">
    <label>Prescription</label>
    <textarea class="form-control" name="prescription"></textarea>
</div>

<div class="form-group">
    <label>Testings</label>
    <textarea class="form-control" name="testings"></textarea>
</div>
</div>

   
   
    
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>

      </div>

      </form>
    
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


  



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>





</body>


</html>


