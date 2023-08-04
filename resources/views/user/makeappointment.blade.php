<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Habeeba Medical Center</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
<style>
    .container {
        text-align: center;
    }

    .doctor-details {
        margin-bottom: 20px;
        display: inline-block;
        text-align: left;
    }

    .doctor-details h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        color: green;
    }

    .doctor-details p {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .doctor-details .speciality {
        font-weight: bold;
    }

    .doctor-schedule {
        margin-bottom: 20px;
        display: inline-block;
        text-align: left;
    }

    .doctor-schedule p {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .doctor-schedule .time {
        font-weight: bold;
    }
</style>


</head>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Habeeba Medical Center</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +94 77 008 7852</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> kkyhmc@gmail.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="https://www.facebook.com/HMCKKY01?mibextid=ZbWKwL"><span class="mai-logo-facebook-f"></span></a>
              <a href=""><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="www.instagram.com/hmc.kky"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->


<div class="container">
    <div class="doctor-details">
        <h2>DR. {{ $doctor->firstname }}  {{ $doctor->lastname }}</h2>
        <p class="speciality">Speciality: {{ $doctor->speciality }}</p>
       <p>Available Days: {{ $doctorschedule->days }}</p>
        <p class="time">Channel Time: {{ $doctorschedule->start_time }} -{{ $doctorschedule->end_time }}</p>
       </div>
</div>
      <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Book an Appointment</h1>
      <h4 class="text-center wow fadeInUp">Now you can get an online appointment</h4>

          @if(session()->has('error'))
             <div class="alert alert-danger">
                   {{ session()->get('error') }}
             </div>
          @endif


      <form class="main-form" action="{{url('upload_appointment')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="row mt-5 ">

              

          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <input type="text" class="form-control" placeholder="Name" style="border: 1px solid;" name="patient_name" required>
          </div>


          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" class="form-control" placeholder="Email address.." style="border: 1px solid;" name="email" required>
            @error('email')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Phone number" style="border: 1px solid;" name="phone_number" required>
            @error('phone_number')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
          </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="number" class="form-control" placeholder="Age" style="border: 1px solid;" name="age" required>
          </div>
          

         <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                     <select name="time" id="time" class="custom-select" placeholder="Select time" style="border: 1px solid;" required>
                     <option value="" disabled selected>Select time</option>
                     <option name="time">{{ $doctorschedule->start_time }} -{{ $doctorschedule->end_time }}</option>
                     
                   </select>
                          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" class="form-control" style="border: 1px solid;" name="appointment_date" required>
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                 <input type="hidden" class="form-control"  style="border: 1px solid;" name="user_id">
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
              <input type="hidden" class="form-control"  style="border: 1px solid;" name="doctor_id" value="{{ $doctor->id }}">
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
              <input type="hidden" class="form-control"  style="border: 1px solid;" name="doctor_name" value="{{ $doctor->firstname }}  {{ $doctor->lastname }}">
              </div>
          
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Make Appointment</button>
      </form>
    </div> <!-- .container -->
  </div> <!-- .page-section -->




<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>
