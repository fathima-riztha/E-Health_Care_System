<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use App\Models\Doctor;
use App\Models\Doctor_Schedules;
use App\Models\appointment;
use App\Models\ChannelNote;
use App\Models\Payment;
use App\Models\TestReport;

class DoctorController extends Controller
{
    

    public function doctorAppointments(){

         $userId = Auth::id();
         $user = User::find($userId);

       // Retrieve the doctor based on the username
    $doctor = Doctor::where('username', $user->name)->first();

    // Retrieve the appointments for the doctor
    $appointments = Payment::where('doctor_id', $doctor->id)->orderBy('appointment_date', 'desc')
        ->get();

    return view('doctor.appointments', compact('user', 'appointments'));
    }

    public function doctorSearch(){

        $userId = Auth::id();
         $user = User::find($userId);

         $appointments = Payment::where('user_id', $userId)->get();
         $reports=TestReport::where('patient_id',$userId)->get();


    return view('doctor.search', compact('user','appointments','reports'));

    }


    public function searchAppointments(Request $request)
{   
    $userId = Auth::id();
    $user = User::find($userId);
    $patientId = $request->input('patient_id');
    $appointments = Payment::where('user_id', $patientId)->get();
    $reports = TestReport::where('patient_id', $patientId)->get();


    return view('doctor.search', compact('appointments','user','reports'));
}
















    public function channelNotestore(Request $request)
{
    // Validate the form input
    $validatedData = $request->validate([
        'appid' => 'required|integer',
        'pid' => 'required|integer',
        'patientname' => 'required|string',
        'age' => 'nullable|integer',
        'date' => 'nullable|date',
        'gender' => 'required|in:male,female',
        'height' => 'nullable|numeric',
        'weight' => 'nullable|numeric',
        'reason' => 'nullable|string',
        'prescription' => 'nullable|string',
        'testings' => 'nullable|string',
    ]);

    // Create a new instance of the ChannelNote model
    $channelNote = new ChannelNote();
    $channelNote->Appointment_id = $validatedData['appid'];
    $channelNote->user_id = $validatedData['pid'];
    $channelNote->patient_name = $validatedData['patientname'];
    $channelNote->age = $validatedData['age'];
    $channelNote->date = $validatedData['date'];
    $channelNote->gender = $validatedData['gender'];
    $channelNote->height = $validatedData['height'];
    $channelNote->weight = $validatedData['weight'];
    $channelNote->reason = $validatedData['reason'];
    $channelNote->prescription = $validatedData['prescription'];
    $channelNote->testings = $validatedData['testings'];

    // Save the channelNote record to the database
    $channelNote->save();

    // Redirect back or perform any other desired action
    return redirect('doctor.appointments')->with('success', 'Channel note added successfully!');
}


          public function updateStatus(Request $request)
      {
    $appointmentId = $request->input('appointment_id');

    // Find the appointment by ID
    $appointment = Payment::where('appointment_id',$appointmentId)->first();

    // Update the status to "completed" or any other desired value
    $appointment->status = 'completed';
    $appointment->save();

    return redirect()->back()->with('success', 'Appointment status updated.');
          }

          public function updateAccount($username){

             $userId = Auth::id();
             $user = User::find($userId);
             $doctor = Doctor::where('username', $username)->first();
            
            $username = User::where('name', $username)->first();


            return view('doctor.updateAccount',compact('user','doctor','username'));
          }


    public function editAccount(Request $request, $username)
{
    $doctor = Doctor::where('username', $username)->first();
    $user = User::where('name', $username)->first();

    // Update email and password in doctors table
    $doctor->email = $request->input('email');
    $doctor->password = bcrypt($request->input('pwd'));
    $doctor->save();

    // Update email and password in users table
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('pwd'));
    $user->save();

    return redirect()->back()->with('success', 'Account updated successfully.');
}



public function doctorCalendar(){

    $userId = Auth::id();
    $user = User::find($userId);

    // Fetch the doctor_id based on the user's name (username in doctors table and name in users table)
    $doctor = DB::table('doctors')
                ->join('users', 'doctors.username', '=', 'users.name')
                ->where('users.id', $user->id)
                ->select('doctors.id as doctor_id')
                ->first();

    $doctorId = $doctor ? $doctor->doctor_id : null;

    // Pass the doctor_id to the view
    return view('doctor.calendar', compact('user', 'doctorId'));
}

public function getDoctorAppointments($doctorId)
{
    $appointments = Payment::where('doctor_id', $doctorId)->get();

    // Return the appointments data as a JSON response
    return response()->json($appointments);
}









}
