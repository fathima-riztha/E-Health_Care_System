<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmation;
use App\Http\Requests\PaymentValidationRequest;
use App\Http\Requests\StoreAppointmentRequest;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\Doctor;
use App\Models\Doctor_Schedules;
use App\Models\appointment;
use App\Models\Payment;
use App\Models\MonthlyIncome;
use App\Models\Income;


use Session;
use Stripe;
use PDF;

class HomeController extends Controller
{
    public function redirect()
{
    if (Auth::id()) {
        if (Auth::user()->usertype == '0') {
            $doctor = doctor::all();

            return view('user.home', compact('doctor'));
        } 

        elseif (Auth::user()->usertype == '1') {

            $userId = Auth::id();
            $user = User::find($userId);
            $doctors = Doctor::select('firstname', 'lastname', 'speciality')->get();
            $regularUsers = User::where('usertype', '0')->get();


            // Retrieve payment details with descending order of appointment date
              $appointments = DB::table('payments')
        ->select('patient_name', 'doctor_name', 'appointment_date')
        ->orderBy('appointment_date', 'desc')
        ->get();


    // Retrieve total number of appointments from payments table
            $totalAppointments = DB::table('payments')->count();
            $totalDoctors = DB::table('doctors')->count();
             $totalUsers = DB::table('users')->count();
             $totalRegularUsers = User::where('usertype', '0')->count();

        

      // Get the current month
$currentMonth = Carbon::now()->format('Y-m');
$currentYear = Carbon::now()->format('Y');

// Fetch the distinct specialties from the doctors table
$specialties = Doctor::distinct()->pluck('speciality');

// Fetch the appointments count for each specialty for the current month
$appointmentsBySpecialty = Doctor::select('speciality')
    ->selectSub(function ($query) use ($currentYear) {
        $query->from('payments')
            ->where('doctor_id', DB::raw('doctors.id'))
            ->whereYear('appointment_date', '=', Carbon::now()->year)
            
            ->selectRaw('COUNT(*)');
    }, 'appointments_count')
    ->get()
    ->keyBy('speciality')
    ->map(function ($doctor) {
        return $doctor->appointments_count;
    });

// Convert the collections to arrays
$specialties = $specialties->toArray();
$appointmentsBySpecialty = $appointmentsBySpecialty->toArray();

// You now have the data in the $specialties and $appointmentsBySpecialty variables as arrays
// You can pass this data to your view for rendering the line graph


$monthlyIncomeData = Income::select('month_name', 'month_income', 'total_appointments')->get();

return view('admin.home', compact('user','doctors','regularUsers','appointments','totalAppointments','totalDoctors','totalUsers','totalRegularUsers','specialties', 'appointmentsBySpecialty','monthlyIncomeData'));

        } 

       elseif (Auth::user()->usertype == '3') {
        $userId = Auth::id();
        $user = User::find($userId);
        $appointments = Payment::where('user_id', $userId)->get();

        return view('lab.home',compact('user','appointments'));

       }

    






        else {
            return $this->showdoctorpage(Auth::user()->name, Auth::id()); // Call the showdoctorpage function with the authenticated user's ID
        }
    } else {
        return redirect()->back();
    }
}

       public function showdoctorpage($name, $id)
{
    $user = user::find($id);
    $doctor= doctor::where('username',$name)->first();
    $appointment = appointment::where('doctor_id', $doctor->id)->get();
    
    return view('doctor.home', compact('user','doctor', 'appointment'));
}












    public function index()
    {
          
            $doctor= doctor::all();
          

        return view('user.home',compact('doctor'));
           }
        
   




   public function makeappointment($id){


   
    $doctor = doctor::find($id);
    $doctorschedule = doctor_schedules::where('doctor_id', $id)->first();

    return view('user.makeappointment', compact('doctor', 'doctorschedule'));
   }


   public function uploadAppointment(StoreAppointmentRequest $request)
   {
          // Retrieve user input from the appointment form
    $doctorId=$request->input('doctor_id');
    $appointmentDate = $request->input('appointment_date');

     // Count the number of appointments for the given doctor_id and appointment_date
    $appointmentCount = DB::table('appointments')
        ->where('doctor_id', $doctorId)
        ->where('appointment_date', $appointmentDate)
        ->count();

      // Check if all appointments are booked (count >= 3)
    if ($appointmentCount >= 2) {
        return redirect()->back()->with('error', 'All appointments are booked on this date with this doctor. Please try another date.');
    }


    $doctorName=$request->input('doctor_name');
    $patientName = $request->input('patient_name');
    $email = $request->input('email');
    $phoneNumber = $request->input('phone_number');
    $age = $request->input('age');
   
    $appointmentTime = $request->input('time');

  
    // Retrieve the authenticated user's ID
    $userId = Auth::id();




 // Save the appointment to the appointments table
    $appointment = new appointment();
    
    $appointment->user_id=$userId; // Assign the user ID
    $appointment->doctor_id = $doctorId;
    $appointment->doctor_name = $doctorName;
    
    $appointment->patient_name = $patientName;
    $appointment->email = $email;
    $appointment->phone_number = $phoneNumber;
    $appointment->age = $age;
    $appointment->appointment_date = $appointmentDate;
    $appointment->time=$appointmentTime;
    $appointment->save();


// Perform any additional operations or redirection as needed

    // Redirect to payment.blade.php
    return redirect()->route('user.stripe', ['id' => $appointment->id]);


}


public function stripe($id)
{
    $appointment = Appointment::find($id);

    $doctor = Doctor::find($appointment->doctor_id);

    return view('user.stripe', compact('appointment', 'doctor'));
}


 public function storepayment(PaymentValidationRequest $request){

  // Retrieve the payment details from the form input
    $appointmentId = $request->input('appointment_id');
    $userId = $request->input('user_id');
    $doctorId = $request->input('doctor_id');
    $doctorName = $request->input('doctor_name');
    $patientName = $request->input('patient_name');
    $appointmentDate = $request->input('appointment_date');
    $email=$request->input('email');
    $phoneno=$request->input('phoneno');
    $appointment_time=$request->input('appointment_time');
    $amount = $request->input('amount');

    // Create a new instance of the Payment model
    $payment = new Payment();
    $payment->appointment_id = $appointmentId;
    $payment->user_id = $userId;
    $payment->doctor_id = $doctorId;
    $payment->doctor_name = $doctorName;
    $payment->patient_name = $patientName;
    $payment->appointment_date = $appointmentDate;
    $payment->phone_no=$phoneno;
    $payment->email=$email;
    $payment->appointment_time=$appointment_time;
    $payment->amount = $amount;
    $payment->payment_time = now(); // Current date and time
    $payment->save();

        // Send the payment confirmation email
    Mail::to($email)->send(new PaymentConfirmation($payment));


    // Perform any additional operations or redirection as needed

  return back()->with('success', 'Payment Successfull!');

     

} 
  
   
    
}
