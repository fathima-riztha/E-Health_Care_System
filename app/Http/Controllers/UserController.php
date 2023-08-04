<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\Doctor;
use App\Models\Doctor_Schedules;
use App\Models\appointment;
use App\Models\TestReport;
use App\Models\ChannelNote;
use App\Models\Payment;
use PDF;

class UserController extends Controller
{
    public function userProfile(){

        $userId = Auth::id();
        $user = User::find($userId);

        $appointments = Appointment::where('user_id', $userId)->get();

        return view('user.profile', compact('user', 'appointments'));
    }

  public function userAppointments()
       {
    $userId = Auth::id();
    $user = User::find($userId);
    
    $appointments = Payment::with('doctor')->where('user_id', $userId)->orderBy('appointment_date', 'desc')
        ->get();
    
    return view('user.appointments', compact('user', 'appointments'));
           }
    
    public function userPayments(){

         $userId = Auth::id();
         $user = User::find($userId);

        $appointments = Payment::with('doctor')->where('user_id', $userId)->get();
    
    return view('user.userPayments', compact('user', 'appointments'));
    }

     public function userPrescriptions(){

         $userId = Auth::id();
         $user = User::find($userId);
         $appointments = Payment::where('user_id', $userId)->orderBy('appointment_date', 'desc')
        ->get();

        return view('user.prescriptions', compact('user', 'appointments'));
    }

    public function userReports(){

         $userId = Auth::id();
         $user = User::find($userId);

          $testReports = TestReport::where('patient_id', $userId)->get();

        return view('user.reports', compact('user','testReports'));
    }

    public function printChannelNote($appointment_id){
           
           $appointment = Payment::find($appointment_id);
           $channelNote = ChannelNote::where('appointment_id', $appointment_id)->first();

          $pdf=PDF::loadview('user.printChannelNote', compact('appointment', 'channelNote'));
          return $pdf->download('Channel_Note.pdf');

          // return view('user.printChannelNote', compact('appointment', 'channelNote'));

    }

  public function printpaymentReceipt($appointment_id){

    $appointment = Payment::where('appointment_id', $appointment_id)->first();

      

      $pdf=PDF::loadview('user.paymentReceipt', compact('appointment'));
          return $pdf->download('Payment_Receipt.pdf');

     //return view('user.paymentReceipt', compact('appointment'));
  }

  public function updateAccount($id){

             $userId = Auth::id();
             $user = User::find($userId);
            $patient = User::where('id', $id)->first();
            
            


            return view('user.updateAccount',compact('user','patient'));
          }

public function editAccount(Request $request, $id)
{
    
    $user = User::where('id', $id)->first();

    // Update email and password in users table
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('pwd'));
    $user->save();

    
    return redirect()->back()->with('success', 'Account updated successfully.');
}






    
}
