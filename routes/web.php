<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\DoctorController;

use App\Http\Controllers\UserController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/',[HomeController::class,'index']);

Route::get('/user/home', function () {
    return view('user.home');
})->name('user.home');




Route::get('/user/news', function () {
    return view('user.news');
})->name('user.news');

Route::get('/user/about', function () {
    return view('user.about');
})->name('user.about');

Route::get('/user/doctors', function () {
    return view('user.doctors');
})->name('user.doctors');

Route::get('/user/contact', function () {
    return view('user.contact');
})->name('user.contact');

Route::get('/user/appointmentform', function () {
    return view('user.appointmentform');
})->name('user.appointmentform');

Route::get('/user/blogDetails', function () {
    return view('user.blogDetails');
})->name('user.blogDetails');

//admin


Route::get('/admin.doctors',[AdminController::class,'index']);

// Route::get('/admin.dashboard',[AdminController::class,'dashboard']);


Route::get('/admin.addDoctors',[AdminController::class,'addDoctors']);

Route::post('/upload_doctor',[AdminController::class,'upload']);

Route::get('/edit_doctors/{id}',[AdminController::class,'editDoctors']);

Route::post('/updatedoctor/{id}',[AdminController::class,'updatedoctor']);


Route::get('/deletedoctor/{id}',[AdminController::class,'deleteDoctors']);

Route::get('/admin.doctor_schedule',[AdminController::class,'doctor_schedule']);

Route::get('/admin.appointments',[AdminController::class,'appointments']);

Route::get('/admin.addAppointment',[AdminController::class,'addAppointment']);

Route::get('/admin.addSchedule',[AdminController::class,'addShedules']);

Route::post('/upload_doctorschedule',[AdminController::class,'uploadDoctorschedule']);

Route::post('/updateSchedule/{id}',[AdminController::class,'updateSchedule']);

Route::get('/deleteSchedule/{id}',[AdminController::class,'deleteSchedule']);

Route::get('/admin.logout',[AdminController::class,'logout']);

Route::get('/makeappointment/{id}',[HomeController::class,'makeappointment']);

Route::get('/admin.edit_schedule/{id}',[AdminController::class,'edit_schedule']);

Route::post('/upload_appointment',[HomeController::class,'uploadAppointment']);

Route::get('/admin.patients',[AdminController::class,'patients']);

Route::get('/admin.viewtest',[AdminController::class,'viewtest']);

Route::get('/admin.uploadtest',[AdminController::class,'uploadtest']);

Route::post('/upload_testreports',[AdminController::class,'uploadtestreports']);

Route::get('/download/{file}',[AdminController::class,'download']);

Route::get('/view/{id}',[AdminController::class,'view']);

Route::get('/admin.payments',[AdminController::class,'payments']);

Route::get('/admin.send_email/{id}',[AdminController::class,'send_email']);


Route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);

Route::get('/admin.dailyincome',[AdminController::class,'dailyIncome']);

Route::get('/admin.monthlyincome',[AdminController::class,'monthlyIncome']);

Route::get('/admin.printMonthlyIncome',[AdminController::class,'PrintmonthlyIncome']);


Route::get('/admin.printDailyIncome',[AdminController::class,'printDailyIncome']);

Route::post('/searchTests', [AdminController::class, 'searchTests'])->name('serach.test');


Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

Route::get('/admin.calendar',[AdminController::class,'adminCalendar']);

Route::post('/admin/calendar/add-event', [AdminController::class, 'createEvent'])->name('admin.createEvent');

Route::get('/admin/calendar/events', [AdminController::class, 'getCalendarEvents'])->name('admin.getCalendarEvents');

Route::post('admin/addPatient', [AdminController::class, 'storePatient'])->name('admin.addPatient');

Route::post('/admin/save-appointment-payment', [AdminController::class, 'saveAppointmentAndPayment'])->name('admin.saveAppointmentAndPayment');

Route::post('upload_monthlyincome', [AdminController::class, 'uploadMonthlyIncome'])->name('upload_monthlyincome');

Route::get('/admin.notification',[AdminController::class,'Notifications']);

Route::post('/admin/searchAndNotify', [AdminController::class, 'searchAndNotify'])->name('admin.searchAndNotify');

 Route::get('/admin.searchincome',[AdminController::class,'adminSearchincome']);




Route::get('/admin/searchincome',[AdminController::class,'searchIncome'] )->name('admin.searchincome');


Route::get('/admin.printSearchIncome/{start_date}/{end_date}',[AdminController::class,'printSearchIncome']);













//user
/* Route::get('/stripe', function () {
    return view('user.stripe');
})->name('user.stripe'); */

Route::get('/stripe/{id}', [HomeController::class, 'stripe'])->name('user.stripe');



Route::post('/storePayment',[HomeController::class,'storepayment']);


// Route::get('/stripe',[HomeController::class,'stripe']);

/*Route::get('/profile', function () {
    return view('user.profile');
})->name('user.profile'); */

Route::get('/user.profile',[UserController::class,'userProfile']);

Route::get('/user.appointments',[UserController::class,'userAppointments']);

 Route::get('/user.userPayments',[UserController::class,'userPayments']);

Route::get('/user.prescriptions',[UserController::class,'userPrescriptions']);

Route::get('/user.reports',[UserController::class,'userReports']);

Route::get('/user.printChannelNote/{id}',[UserController::class,'printChannelNote']);

Route::get('/user.paymentReceipt/{id}',[UserController::class,'printpaymentReceipt']);

Route::get('/user.updateAccount/{id}',[UserController::class,'updateAccount']);

Route::post('/editAccount/{id}', [UserController::class, 'editAccount']);



// doctor
Route::get('/showdoctorpage/{name}',[HomeController::class,'showdoctorpage']);

Route::get('/doctor.appointments',[DoctorController::class,'doctorAppointments']);

Route::get('/doctor.search',[DoctorController::class,'doctorSearch']);

Route::post('/searchAppointments', [DoctorController::class, 'searchAppointments'])->name('search.appointments');



//Route::post('/channelNote', 'DoctorController@storeChannelNote')->name('channelNote.store');

Route::post('/channelNote_store', [DoctorController::class, 'channelNotestore'])->name('channelNote.store');


Route::post('/appointment/update-status', [DoctorController::class, 'updateStatus'])->name('appointment.updateStatus');



Route::get('/doctor.updateAccount/{name}',[DoctorController::class,'updateAccount']);

Route::post('/editAccount/{name}', [DoctorController::class, 'editAccount']);

Route::get('/doctor.calendar',[DoctorController::class,'doctorCalendar']);

Route::get('getDoctorAppointments/{doctorId}', [DoctorController::class, 'getDoctorAppointments']);











Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


