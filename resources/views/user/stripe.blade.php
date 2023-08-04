<!DOCTYPE html>
<html>
<head>
    <title>Habeeba Medical Center</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
</head>
<body>
  
<div class="container">
  
    <h1 style="text-align:center; color: darkblue;">Habeeba Medical Center   <br/> Kattankudy </h1>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        
                    </div>                    
                </div>
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                     

  
                    <form action="{{ url('storePayment') }}" method="POST" >
                        @csrf

                        <!-- Payment form fields -->
                        <!-- Include hidden fields for appointment details -->
                        <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                        <input type="hidden" name="user_id" value="{{$appointment->user_id}}">
                        <input type="hidden" name="doctor_id" value="{{$appointment->doctor_id}}">
                        <input type="hidden" name="doctor_name" value="{{$appointment->doctor_name}} ">
                        <input type="hidden" name="patient_name" value="{{$appointment->patient_name}}">
                        <input type="hidden" name="appointment_date" value="{{$appointment->appointment_date}}">
                        <input type="hidden" name="email" value="{{$appointment->email}}">
                        <input type="hidden" name="phoneno" value="{{$appointment->phone_number}}">
                        <input type="hidden" name="appointment_time" value="{{$appointment->time}}">


                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label>  <input class='form-control' size='4' type='text' name='name_on_card' required>
                                @error('name_on_card')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input autocomplete='off' class='form-control card-number' size='20' type='text' name='card_number' required>
                                 @error('card_number')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name='cvc' required>
                                @error('cvc')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' name='expiry_month' required>
                                @error('expiry_month')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name='expiry_year' required>
                                 @error('expiry_year')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Amount</label> <input
                                    autocomplete='off' class='form-control card-number'  name="amount"
                                    type='number' value="{{$doctor->appointment_fee}}" readonly>
                            </div>
                        </div>
  
                       <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                            </div>
                        </div>
                          
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <div class="container" style="position: relative;">
    <div class="row">
        <div class="col-sm-8 col-9 text-right m-b-20" style="position: absolute;top: 20px;right: 20px;">
            <a href="{{url('admin.logout') }}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Back to Home</a>
        </div>
    </div>
</div>

</div>
   
</body>
  


</html>
