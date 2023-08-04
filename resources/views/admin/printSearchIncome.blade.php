<html lang="en">

<head>
    
</head>

<body>
    




                     <h1 align="center">Habeeba Medical Center</h1>
                        <h2 >Payments Income </h2>
                        
                        <h4>From {{$start_date}} to {{$end_date}}</h4>



               <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table  class="table table-bordered table-striped custom-table mb-0" style="border: 1px solid black;">
                                <thead>
                                    <tr style="border: 1px solid black;">
                                        <th style="border: 1px solid black;">Doctor Id</th>
                                        <th style="border: 1px solid black;">Doctor Name</th>
                                         <th style="border: 1px solid black;">Appointment Fee</th>
                                          <th style="border: 1px solid black;">Commision Amount</th>
                                       
                                        <th style="border: 1px solid black;">Total Appointments</th>
                                        <th style="border: 1px solid black;" class="text-right">Doctor Payment</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    
                                 
                                 @foreach($filteredAppointments as $appointment)
                                    <tr>
                                        <td style="border: 1px solid black;">{{ $appointment->doctor_id }}</td>
                                        <td style="border: 1px solid black;">{{ $appointment->doctor->firstname }} {{ $appointment->doctor->lastname }}</td>
                                       
                                        <td style="border: 1px solid black;">{{ $appointment->doctor->appointment_fee }}</td>
                                        <td style="border: 1px solid black;">{{ $appointment->doctor->appointment_fee * 0.6 }}.00</td>
                                       
                                        <td style="border: 1px solid black;">{{ $appointment->total_appointments }}</td>
                                        <td class="text-right" style="border: 1px solid black;">Rs.
                                            {{ $appointment->total_appointments * ($appointment->doctor->appointment_fee * 0.6) }}.00
                                           </td>

                                    </tr>
                                   @endforeach
                                 </tbody>  
                            </table>
                        </div>
                </div>
                </div>
<br>
          <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 >Calculate Income</h4>
                    </div>
                    
          </div>

          <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped custom-table mb-0" style="border: 1px solid black;">
                                
                                <tbody>
                                  <tr>
                                       <td style="border: 1px solid black;">Total Appointments</td>
                                       <td style="border: 1px solid black;">{{ $filteredAppointments->sum(function ($appointment) {
                                    return  $appointment->total_appointments;
                                                 }) }} </td>
                                    </tr>
                                    

                                  
                                    <tr>
                                       <td style="border: 1px solid black;">Total Payments</td>
                                       <td style="border: 1px solid black;">Rs. {{ $filteredAppointments->sum(function ($appointment) {
                                    return $appointment->doctor->appointment_fee * $appointment->total_appointments;
                                                 }) }}.00 </td>
                                    </tr>

                                   <tr>
                                   <td style="border: 1px solid black;">Total Doctor Fees</td>
                                   <td style="border: 1px solid black;">Rs. {{ $filteredAppointments->sum(function ($appointment) {
                                    return $appointment->total_appointments * ($appointment->doctor->appointment_fee * 0.6);
                                                      }) }}.00 </td>
                                   </tr>
                                    <tr>
                                        <td style="border: 1px solid black;">Total Monthly Income</td>
                                      <td style="border: 1px solid black; font-weight: bold;">Rs. {{ $filteredAppointments->sum(function ($appointment) {
                                    return $appointment->doctor->appointment_fee * $appointment->total_appointments;
                                    }) - $filteredAppointments->sum(function ($appointment) {
                                         return $appointment->total_appointments * ($appointment->doctor->appointment_fee * 0.6);
                                         }) }}.00 </td>
                                    </tr>
                                    
                                   </tbody>
                            </table>
                        </div>
                </div>
                </div>
            
   
            
        
        
    </div>
  

 
      



  







</body>


<!-- schedule23:21-->
</html>