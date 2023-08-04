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
                <a href="" class="logo">
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
                    <img src="../assets/img/HMC logo.png" width="75" height="60" style="display: block; margin: 5 auto;" alt=""> 
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
                 <li class="{{ Request::is('admin.doctor_schedule') ? 'active' : '' }}">
                    <a href="{{ url('admin.doctor_schedule') }}"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
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
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $totalAppointments }}</h3>
                                <span class="widget-title1"> Appointments </i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-wheelchair"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{$totalRegularUsers}}</h3>
                                <span class="widget-title2">Patients </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $totalDoctors }}</h3>
                                <span class="widget-title3">Doctors </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-users" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h4>{{ $totalUsers }}</h4>
                                <span class="widget-title4">Users </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card">
                                   <div class="card-body">
                                        <div class="chart-title">
                                         <h4>Total Appointments by Speciality</h4>
                                        </div>
                                      <div >
                                         <canvas id="appointmentsChart"></canvas>
                                       </div>
                                    </div>
                                 </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Monthly Income by Appointments</h4>
                                    
                                </div>  
                                <canvas id="monthlyIncomeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>












                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="{{url('admin.appointments')}}" class="btn btn-primary float-right">View all</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="d-none">
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Doctor Name</th>
                                                <th>Timing</th>
                                                <th class="text-right">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @php
                                            $count = 0;
                                            @endphp
                                             @foreach ($appointments as $appointment)
                                            <tr>
                                                <td style="min-width: 200px;">
                                                    <a class="avatar" href="profile.html">B</a>
                                                    <h2><a href="profile.html">{{ $appointment->patient_name }}  <span></span></a></h2>
                                                </td>                 
                                                <td>
                                                    <h5 class="time-title p-0">Appointment With</h5>
                                                    <p>{{ $appointment->doctor_name }}</p>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">Date</h5>
                                                    <p>{{ $appointment->appointment_date }}</p>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{url('admin.appointments')}}" class="btn btn-outline-primary take-btn">Take up</a>
                                                </td>
                                            </tr>
                                             @php
                                              $count++;
                                            if ($count >= 5) {
                                                  break;
                                                  }
                                                @endphp
                                              @endforeach
                                            
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
                            <div class="card-header bg-white">
                                <h4 class="card-title mb-0">Doctors</h4>
                            </div>
                            <div class="card-body">
                                <ul class="contact-list">
                                     @foreach ($doctors as $doctor)
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="John Doe"><a class="avatar" href="profile.html">D</a><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">{{ $doctor->firstname }} {{ $doctor->lastname }}</span>
                                                <span class="contact-date"> {{ $doctor->speciality }}</span>
                                            </div>
                                        </div>
                                    </li>
                                     @endforeach
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="{{url('admin.doctors')}}" class="text-muted">View all Doctors</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">New Patients </h4> <a href="{{url('admin.patients')}}" class="btn btn-primary float-right">View all</a>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table mb-0 new-patient-table">
                                        <tbody>
                                            @php
                                            $count = 0;
                                            @endphp
                                            @foreach ($regularUsers as $regularUser)
                                            <tr>
                                                <td>
                                                    <a class="avatar" href="profile.html">P</a>
                                                    <h2>{{ $regularUser->name }} </h2>
                                                </td>
                                                <td>{{ $regularUser->email }}</td>
                                                <td>{{ $regularUser->phone }}</td>
                                                <td>{{ $regularUser->address }}</td>
                                            </tr>
                                              @php
                                              $count++;
                                            if ($count >= 5) {
                                                  break;
                                                  }
                                                @endphp
                                            @endforeach
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
 <div class="col-12 col-md-6 col-lg-4 col-xl-4">
    <div class="card">
        <div class="card-body">
            <div class="hospital-barchart">
                <h4 class="card-title d-inline-block">Appointments by Specialty</h4>
                <div style="height: 280px; width: 100%; background-color: white;">
                    <canvas id="appointmentsPieChart" style="width: 100%; height: 105%;"></canvas>
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
    <script src="Admin/assets/js/Chart.bundle.js"></script>
    <script src="Admin/assets/js/chart.js"></script>
    <script src="Admin/assets/js/app.js"></script>





<script>
    // Get the data passed from the controller
    var specialties = @json($specialties);
    var appointmentCounts = @json(array_values($appointmentsBySpecialty));

    // Calculate the total appointments across all specialties
    var totalAppointments = appointmentCounts.reduce((total, count) => total + count, 0);

    // Calculate the percentage for each specialty
    var appointmentPercentages = appointmentCounts.map(count => ((count / totalAppointments) * 100).toFixed(2));

    // Set up the first chart using Chart.js
    var ctx = document.getElementById('appointmentsChart').getContext('2d');
    var appointmentsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: specialties,
            datasets: [{
                label: 'Total Appointments',
                data: appointmentCounts,
                borderColor: '#004aad',
                backgroundColor: '#f4f1ec',
                pointBackgroundColor: '#004aad',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 10,
                }
            },
            plugins: {
                legend: {
                    display: false,
                }
            }
        }
    });

    // Set up the pie chart using Chart.js
    var ctxPie = document.getElementById('appointmentsPieChart').getContext('2d');
    var appointmentsPieChart = new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: specialties,
            datasets: [{
                data: appointmentPercentages,
                backgroundColor: [
                    '#009688',
                    '#607D8B',
                    '#2196F3',
                    '#FF5722',
                    '#004aad',
                    '#79255a',
                    '#26567b',
                    '#7ed957',
                    '#007c9d'
                    // Add more colors for additional specialties
                ],
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.parsed + '% ';
                        }
                    }
                }
            }
        }
    });
</script>


<script>
        var monthlyIncomeData = @json($monthlyIncomeData);

        var labels = monthlyIncomeData.map(data => `${data.month_name}  `);
        var monthIncome = monthlyIncomeData.map(data => data.month_income);
       

        var ctx = document.getElementById('monthlyIncomeChart').getContext('2d');
        var monthlyIncomeChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Month Income',
                    data: monthIncome,
                    borderColor: '#004aad',
                    backgroundColor: '#004aad',
                    pointBackgroundColor: '#004aad',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>




</body>



</html>
