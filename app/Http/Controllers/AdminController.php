<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentReminderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use Carbon\Carbon;
use App\Models\Doctor_Schedules;
use App\Models\MonthlyIncome;
use App\Models\Event;
use App\Models\Income;
use App\Models\MonthlyPayment;
use App\Models\TestReport;
use App\Models\Payment;
use App\Models\appointment;
use PDF;

use Notification;
use App\Notifications\SendEmailNotification;



class AdminController extends Controller
{

   


    public function index(){

        $doctor= doctor::all();
        $userId = Auth::id();
        $user = User::find($userId);

        return view('admin.doctors' , compact('doctor','user'));
    }

    public function addDoctors(){

         $userId = Auth::id();
        $user = User::find($userId);

        return view('admin.addDoctors',compact('user'));
    }

    

public function appointments()
{
    $userId = Auth::id();
    $user = User::find($userId);
    $appointments = Payment::orderBy('appointment_date', 'desc')->simplePaginate(5); 
    $doctor= doctor::all();

    return view('admin.appointments', compact('user', 'appointments','doctor'));
}



    public function addAppointment(){
        $userId = Auth::id();
        $user = User::find($userId);
        return view('admin.addAppointment',compact('user'));
    }

    public function payments(){
        $userId = Auth::id();
        $user = User::find($userId);
        $appointments= Payment::orderBy('appointment_id','desc')->simplePaginate(6);
        return view('admin.payments',compact('user','appointments'));
    }

    public function upload(Request $request){


        $validatedData = $request->validate([
        'gender' => 'required|in:male,female',]);

        $doctor=new doctor;
        $user = new User;

        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->firstname=$request->firstname;
         $doctor->lastname=$request->lastname;
          $doctor->username=$request->username;
           $doctor->email=$request->email;
            $doctor->password=bcrypt($request->password);
             $doctor->confirmed_password=$request->confirmpassword;
              $doctor->dob=$request->dob;
               $doctor->gender = $validatedData['gender'];
                $doctor->address=$request->address;
                 $doctor->nic=$request->nic;
                  $doctor->appointment_fee=$request->fees;
                  $doctor->speciality=$request->speciality;
                  $doctor->phone=$request->phone;
                  $doctor->status=$request->status;

                  $doctor->save();

                  $user->name = $request->username;
                  $user->email=$request->email;
                  $user->password=bcrypt($request->password);
                  $user->usertype = 2;
                  $user->phone=$request->phone;

                  $user -> save();

                  return redirect()->back()->with('message','Doctor added successfully');



    }

    public function editDoctors($id){

      
        $data=doctor::find($id);
        $userId = Auth::id();
        $user = User::find($userId);
        return view('admin.edit_doctors',compact('data','user'));

    }


    





   public function updatedoctor(Request $request , $id){

    $doctor= doctor::find($id);

    $doctor->firstname=$request->firstname;
         $doctor->lastname=$request->lastname;
          $doctor->username=$request->username;
           $doctor->email=$request->email;
            $doctor->password=bcrypt($request->password);
             $doctor->confirmed_password=$request->confirmpassword;
              $doctor->dob=$request->dob;
               $doctor->gender=$request->gender;
                $doctor->address=$request->address;
                 $doctor->nic=$request->nic;
                  $doctor->appointment_fee=$request->fees;
                  $doctor->speciality=$request->speciality;
                  $doctor->phone=$request->phone;
                  $doctor->status=$request->status;

                  $image=$request->file;

                  if($image){


        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;

    }

          $doctor->save();

           return redirect()->back()->with('message','Doctor details updated successfully');


   }

  public function deleteDoctors($id){

    $data= doctor::find($id);

    $data->delete();

    return redirect()->back();


  }



public function doctor_schedule(){


        $data=doctor_schedules::all();
        $userId = Auth::id();
        $user = User::find($userId);

        return view('admin.doctor_schedule',compact('data','user'));
    }

  
    public function addShedules(){

        $doctor= doctor::all();
        $userId = Auth::id();
        $user = User::find($userId);

        return view('admin.addSchedule', compact('doctor','user'));
    }

public function uploadDoctorschedule(Request $request){

    $doctor_schedule=new doctor_schedules;

    $doctor_schedule->doctor_id=$request->docid;
    $doctor_schedule->doc_name=$request->name;
    $doctor_schedule->days= $request->days;
    $doctor_schedule->start_time=$request->time1;
     $doctor_schedule->end_time=$request->time2;
    $doctor_schedule->status=$request->status;

    $doctor_schedule->save();

                  return redirect()->back()->with('message','Doctor schedules added successfully');

}

public function logout(){

        $doctor= doctor::all();

        return view('admin.logout',compact('doctor'));
           }
    

 public function edit_schedule($id){

          $userId = Auth::id();
          $user = User::find($userId);
          $data=Doctor_Schedules::find($id);

        return view('admin.edit_schedule',compact('data','user'));
    }

    public function updateSchedule(Request $request , $id){
            
            $doctor_schedule= Doctor_Schedules::find($id); 

             $doctor_schedule->doctor_id=$request->docid;
             $doctor_schedule->doc_name=$request->name;
             $doctor_schedule->days= $request->days;
             $doctor_schedule->start_time=$request->time1;
             $doctor_schedule->end_time=$request->time2;
            

              $doctor_schedule->save();

                  return redirect()->back()->with('message','Doctor schedules updated successfully'); 
}

  public function deleteSchedule($id){
         $data= Doctor_Schedules::find($id);
         $data->delete();

            return redirect()->back();

  }


    public function patients(){


        $patients = User::where('usertype', 0)->orderBy('id', 'desc')->simplePaginate(6);
        $userId = Auth::id();
        $user = User::find($userId);
        return view('admin.patients',compact('user','patients'));
    }

    public function viewtest(){
        $userId = Auth::id();
        $user = User::find($userId);
        $appointments = Payment::where('user_id', $userId)->get();
        return view('admin.viewtest',compact('user','appointments'));
    }

    public function searchTests(Request $request){

        $userId = Auth::id();
        $user = User::find($userId);
        $appointmentId=$request->input('appointment_id');
        $appointments = Payment::where('appointment_id',  $appointmentId)->get();

        return view('admin.viewtest', compact('appointments','user'));

    }

   
    public function uploadtest(){
        $userId = Auth::id();
        $user = User::find($userId);
        return view('admin.uploadtest',compact('user'));
    }

    public function uploadtestreports(Request $request){

       $data=new TestReport();
    
      
            $file=$request->file;
                
    $filename=time().'.'.$file->getClientOriginalExtension();

                $request->file->move('assets',$filename);

                $data->file_path=$filename;


                $data->patient_id=$request->pid;
                $data->test_type=$request->typetest;
                $data->doctor_name=$request->docname;
                 $data->issue_date=$request->date;
                $data->save();
                return back()->with('success', 'Test report uploaded successfully!');

    }

    public function download(Request $request,$file){

       return response()->download(public_path('assets/'.$file)); 

    }

    public function view($id)
   {
    $testReports=TestReport::find($id);

    return view('user.viewtestreport',compact('testReports'));


   }

   public function send_email($id){

        $userId = Auth::id();
        $user = User::find($userId);
        $appointment=Payment::find($id);

        return view('admin.send_email',compact('user','appointment'));
   }

   public function send_user_email(Request $request,$id){

           $appointment=Payment::find($id);

           $details=[

              'greeting'=>$request->greeting,

              'content'=>$request->content,

              'conclusion'=>$request->conclusion,



           ];

           Notification::send($appointment,new SendEmailNotification($details) );

           return redirect()->back()->with('message','Email send is successfull!!!');
   }


   public function dailyIncome(){
           $userId = Auth::id();
           $user = User::find($userId);

           // Get the current date and month
    $currentDate = Carbon::now()->format('Y-m-d');

     // Get the total appointments for each doctor in the current date
    $appointmentsByDoctor = Payment::whereDate('appointment_date', $currentDate)
        ->select('doctor_id', Payment::raw('count(*) as total_appointments'))
        ->groupBy('doctor_id')
        ->get();
   return view('admin.dailyincome',compact('user','currentDate','appointmentsByDoctor'));

   }

  public function monthlyIncome(){
           $userId = Auth::id();
           $user = User::find($userId);

            // Get the start and end dates of the current month
           $currentYear = Carbon::now()->format('Y');
           $currentMonth = Carbon::now()->format('F');
           $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
           $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');

            // Get the total appointments for each doctor within the current month
         $appointmentsByDoctor = Payment::whereBetween('appointment_date', [$startOfMonth, $endOfMonth])
         ->select('doctor_id', Payment::raw('count(*) as total_appointments'))
         ->groupBy('doctor_id')
         ->get();

           return view('admin.monthlyincome',compact('user','startOfMonth', 'endOfMonth','currentMonth','appointmentsByDoctor','currentYear'));

   }


   public function adminSearchincome(Request $request){
          $userId = Auth::id();
           $user = User::find($userId);
    // Get the start and end dates from the form input
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Perform a query to get the filtered appointments
    $filteredAppointments = Payment::whereBetween('appointment_date', [$startDate, $endDate])
        ->select('doctor_id', Payment::raw('count(*) as total_appointments'))
        ->groupBy('doctor_id')
        ->get();
         $topDoctors = $filteredAppointments->sortByDesc('total_appointments')->take(5);
       
  
    // Return the view with the filtered data
    return view('admin.searchincome', compact('filteredAppointments', 'startDate', 'endDate','user', 'topDoctors'));
   }



public function searchIncome(Request $request)
{    
    $userId = Auth::id();
           $user = User::find($userId);
    // Get the start and end dates from the form input
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Perform a query to get the filtered appointments
    $filteredAppointments = Payment::whereBetween('appointment_date', [$startDate, $endDate])
        ->select('doctor_id', Payment::raw('count(*) as total_appointments'))
        ->groupBy('doctor_id')
        ->get();

        // Fetch the top 5 doctors with the highest appointments
    $topDoctors = $filteredAppointments->sortByDesc('total_appointments')->take(5);






    // Return the view with the filtered data
    return view('admin.searchincome', compact('filteredAppointments', 'startDate', 'endDate','user', 'topDoctors'));
}



   public function printMonthlyIncome(){

           $userId = Auth::id();
           $user = User::find($userId);

            // Get the start and end dates of the current month
           $currentYear = Carbon::now()->format('Y');
           $currentMonth = Carbon::now()->format('F');
           $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
           $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');

            // Get the total appointments for each doctor within the current month
         $appointmentsByDoctor = Payment::whereBetween('appointment_date', [$startOfMonth, $endOfMonth])
         ->select('doctor_id', Payment::raw('count(*) as total_appointments'))
         ->groupBy('doctor_id')
         ->get();
            

           $pdf=PDF::loadview('admin.printMonthlyIncome', compact('user','startOfMonth', 'endOfMonth','currentMonth','appointmentsByDoctor','currentYear'));
          return $pdf->download('MonthlyIncome.pdf');
          // return view('admin.printMonthlyIncome',compact('user','startOfMonth', 'endOfMonth','currentMonth','appointmentsByDoctor'));
   }
   

      public function printDailyIncome(){
           $userId = Auth::id();
           $user = User::find($userId);

           // Get the current date and month
    $currentDate = Carbon::now()->format('Y-m-d');

     // Get the total appointments for each doctor in the current date
    $appointmentsByDoctor = Payment::whereDate('appointment_date', $currentDate)
        ->select('doctor_id', Payment::raw('count(*) as total_appointments'))
        ->groupBy('doctor_id')
        ->get();

          $pdf=PDF::loadview('admin.printDailyIncome', compact('user','currentDate','appointmentsByDoctor'));
          return $pdf->download('DailyIncome.pdf');
   //return view('admin.printDailyIncome',compact('user','currentDate','appointmentsByDoctor'));

   }

   public function printSearchIncome(Request $request, $start_date, $end_date){
            
           $filteredAppointments = Payment::whereBetween('appointment_date', [$start_date, $end_date])
        ->select('doctor_id', Payment::raw('count(*) as total_appointments'))
        ->groupBy('doctor_id')
        ->get();


   




        
    // Return the view with the filtered data
       // Return the view with the filtered data
    $pdf = PDF::loadview('admin.printSearchIncome', compact('filteredAppointments', 'start_date', 'end_date'));
    return $pdf->download('Income.pdf');
   // return view('admin.searchincome', compact('filteredAppointments', 'startDate', 'endDate','user'));

   }


             public function adminDashboard()
            {
     $monthlyIncomeData = MonthlyIncome::select('month_name', 'month_income')->get();

    return view('admin.dashboard', compact('monthlyIncomeData'));
           }


     

     public function adminCalendar(){

           $userId = Auth::id();
           $user = User::find($userId);
           $events = Event::all();

    return view('admin.calendar', compact('user', 'events'));
     }
    
   
   public function createEvent(Request $request)
{
    $event = new Event();
    $event->title = $request->input('title');
    $event->start = Carbon::createFromFormat('d/m/Y H:i:s', $request->input('start') . ' 00:00:00')->format('Y-m-d H:i:s');
    $event->end = $request->input('end') ? Carbon::createFromFormat('d/m/Y H:i:s', $request->input('end') . ' 00:00:00')->format('Y-m-d H:i:s') : null;
    $event->color = $request->input('color');
    $event->save();

    return redirect()->back()->with('success', 'Event added successfully!');
}
    public function getCalendarEvents(Request $request)
{
    $events = Event::all();
    $formattedEvents = [];

    foreach ($events as $event) {
        $formattedEvents[] = [
            'title' => $event->title,
            'start' => $event->start,
            'end' => $event->end,
            'color' => $event->color,
        ];
    }

    return response()->json($formattedEvents);
}




public function storePatient(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:8', // Modify the password validation rules as needed
        ]);

        // Create the user and store it in the database
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->address = $validatedData['address'];
        $user->password = bcrypt($validatedData['password']);
         // Hash the password for security
        $user->email_verified_at=Carbon::now();
        // Save the user record
        $user->save();

        // You can add any additional logic or redirect to a success page here
        // For example, return a response or redirect back with a success message
        return redirect()->back()->with('success', 'Patient profile created successfully!');
    }

      
      public function saveAppointmentAndPayment(Request $request)
{

    $appointment = new Appointment();

     $appointment->user_id = $request->input('patient_id');
    $appointment->patient_name = $request->input('patient_name');
    $appointment->doctor_id = $request->input('doc_id');
     $appointment->doctor_name = $request->input('doc_name');
    $appointment->email = $request->input('email');
      $appointment->age = $request->input('age');
    $appointment->phone_number = $request->input('phone');
     $appointment->appointment_date = $request->input('date');
    $appointment->time = $request->input('time');
     $appointment->save();

     $payment = new Payment();
    $payment->appointment_id = $appointment->id;
    $payment->user_id = $request->input('patient_id');
    $payment->doctor_id = $request->input('doc_id');
    $payment->doctor_name = $request->input('doc_name');
    $payment->patient_name = $request->input('patient_name');
    $payment->phone_no = $request->input('phone');
    $payment->email=$request->input('email');
    $payment->appointment_date = $request->input('date');
    $payment->appointment_time=$request->input('time');
    $payment->amount=$request->input('payment');
    $payment->payment_time=Carbon::now();

    $payment->save();

    return redirect()->back()->with('success', 'Appointment and payment added successfully!');

}

public function uploadMonthlyIncome(Request $request)
{
    $totalAppointments = $request->input('total_appointments');
    $monthlyIncome = $request->input('monthly_income');
    $month_name=$request->input('month_name');

    // Create a new MonthlyIncome instance
    $monthlyIncomeRecord = new Income([
        'total_appointments' => $totalAppointments,
        'month_income' => $monthlyIncome,
        'month_name'=>$month_name,
        'date'=>Carbon::now()->format('Y-m-d'),
    ]);

    // Save the data to the monthly_income table
    $monthlyIncomeRecord->save();

    // You can also add any additional logic or redirect to another page after saving

    // Redirect back with a success message (optional)
    return redirect()->back()->with('success', 'Monthly income data saved successfully!');
}




  public function Notifications(){
           $userId = Auth::id();
           $user = User::find($userId);
           $doctor= doctor::all();
        $appointments = Appointment::where('user_id', $userId)->get();

           return view('admin.notification', compact('user','doctor','appointments'));

  }

  public function searchAndNotify(Request $request)
    {
        // Retrieve form data for searching appointments
        $userId = Auth::id();
        $user = User::find($userId);
        $doctor = Doctor::all();

        // Check if the action parameter is present in the request
        if ($request->has('action')) {
            $action = $request->input('action');

            // Perform actions based on the value of the action parameter
            if ($action === 'search') {
                // Handle the search functionality
                // Retrieve the doctorId and appointmentDate from the form data
                $doctorId = $request->input('doctor_id');
                $appointmentDate = $request->input('appointment_date');

                // Use the doctorId and appointmentDate to search for appointments in the database
                $appointments = Appointment::where('doctor_id', $doctorId)
                    ->whereDate('appointment_date', $appointmentDate)
                    ->get();

                // Return the view with the search results
                return view('admin.notification', compact('user', 'doctor', 'appointments'));
            } elseif ($action === 'notify') {
                // Handle the send notification functionality

                // Retrieve the doctorId and appointmentDate from the form data
                $doctorId = $request->input('doctor_id');
                $appointmentDate = $request->input('appointment_date');

                // Use the doctorId and appointmentDate to get the appointments in the database
                $appointments = Appointment::where('doctor_id', $doctorId)
                    ->whereDate('appointment_date', $appointmentDate)
                    ->get();

                // Send notifications to patients with appointments on the selected date and doctor
                foreach ($appointments as $appointment) {
                    $patientEmail = $appointment->email;
                   $reminderMessage = "Reminder: You have an appointment today";

                    // Send the notification email
                     Mail::to($patientEmail)->send(new AppointmentReminderEmail($reminderMessage));
                }

                // Redirect back with a success message (optional)
                return redirect()->back()->with('success', 'Appointment reminders sent successfully!');
            }
        }

        // If no action is provided or the action is not recognized, show the initial view
        return view('admin.notification', compact('user', 'doctor'));
    }

  




}
