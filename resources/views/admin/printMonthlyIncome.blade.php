<html lang="en">



<body>
    <div class="main-wrapper">
        
         



   <div class="page-wrapper">
            <div class="content">
                 <h2>Habeeba Medical Center</h2>
               
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Monthly Payments Income</h4>
                    </div>
                   
                    
                </div>


               <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped custom-table mb-0" style="border: 1px solid black;">
                                <thead>
                                    <tr style="border: 1px solid black;">
                                        <th style="border: 1px solid black;">Doctor Id</th>
                                        <th style="border: 1px solid black;">Doctor Name</th>
                                         <th style="border: 1px solid black;">Appointment Fee</th>
                                          <th style="border: 1px solid black;">Commision Amount</th>
                                        <th style="border: 1px solid black;">Month</th>
                                        <th style="border: 1px solid black;">Total Appointments</th>
                                        <th style="border: 1px solid black;" class="text-right">Doctor Payment</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    
                                 
                                  @foreach($appointmentsByDoctor as $appointment)
                                    <tr>
                                        <td style="border: 1px solid black;">{{ $appointment->doctor_id }}</td>
                                        <td style="border: 1px solid black;">{{ $appointment->doctor->firstname }} {{ $appointment->doctor->lastname }}</td>
                                       
                                        <td style="border: 1px solid black;">{{ $appointment->doctor->appointment_fee }}</td>
                                        <td style="border: 1px solid black;">{{ $appointment->doctor->appointment_fee * 0.6 }}.00</td>
                                        <td style="border: 1px solid black;">{{$currentMonth}}</td>
                                        <td style="border: 1px solid black;">{{ $appointment->total_appointments }}</td>
                                        <td class="text-right" style="border: 1px solid black;">Rs.
                                            {{ $appointment->total_appointments * ($appointment->doctor->appointment_fee * 0.6) }}.00
                                           </td>

                                    </tr>
                                   @endforeach
                                   
                            </table>
                        </div>
                </div>
                </div>
<br>
          <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Calculate Income</h4>
                    </div>
                    
          </div>

          <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped custom-table mb-0" style="border: 1px solid black;">
                                
                                <tbody>

                                      <tr>
                                       <td style="border: 1px solid black;">Total Appointments</td>
                                       <td style="border: 1px solid black;">{{ $appointmentsByDoctor->sum(function ($appointment) {
                                    return  $appointment->total_appointments;
                                                 }) }} </td>
                                    </tr>

                                  
                                    <tr>
                                       <td style="border: 1px solid black;">Total Payments</td>
                                       <td style="border: 1px solid black;">Rs. {{ $appointmentsByDoctor->sum(function ($appointment) {
                                    return $appointment->doctor->appointment_fee * $appointment->total_appointments;
                                                 }) }}.00 </td>
                                    </tr>

                                   <tr>
                                   <td style="border: 1px solid black;">Total Doctor Fees</td>
                                   <td style="border: 1px solid black;">Rs. {{ $appointmentsByDoctor->sum(function ($appointment) {
                                    return $appointment->total_appointments * ($appointment->doctor->appointment_fee * 0.6);
                                                      }) }}.00 </td>
                                   </tr>
                                    <tr>
                                        <td style="border: 1px solid black;">Total Daily Income</td>
                                      <td style="border: 1px solid black; font-weight: bold;">Rs. {{ $appointmentsByDoctor->sum(function ($appointment) {
                                    return $appointment->doctor->appointment_fee * $appointment->total_appointments;
                                    }) - $appointmentsByDoctor->sum(function ($appointment) {
                                         return $appointment->total_appointments * ($appointment->doctor->appointment_fee * 0.6);
                                         }) }}.00 </td>
                                    </tr>
                                    
                                   </tbody>
                            </table>
                        </div>
                </div>
                </div>
           
            
        </div>
        
    </div>
     


    







</body>


<!-- schedule23:21-->
</html>