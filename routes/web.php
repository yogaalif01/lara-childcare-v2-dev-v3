<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeFullController;
use App\Http\Controllers\RegisterChildController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ChildManagementController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\ScheduleAllController;
use App\Http\Controllers\ScheduleChildController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ValidationTransactionController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\PaymentUserController;
use App\Http\Controllers\ReportDetailController;
use App\Http\Controllers\NannyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DataChildController;
use App\Http\Controllers\ChangeProfileController;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/logout1', [UserController::class,'logout1']);


Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){

        Route::get('aktivitas-anak',[AdminController::class,'child_activity']);
        Route::post('postaktivitas',[AdminController::class,'postaktivitas']);
        Route::get('schedule',[AdminController::class,'schedule']);
        Route::post('postSchedule',[AdminController::class,'postschedule']);
        Route::get('register',[AdminController::class,'register'])->name('admin.register');
        Route::get('absensi',[AdminController::class,'absensi']);
        Route::get('aprove/{email}',[AdminController::class,'approveregister'])->name('admin.approveregister');
        Route::get('tolakaprove/{email}',[AdminController::class,'tolakapprove'])->name('admin.tolakapprove');

        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
        Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');

        Route::resource('employee', EmployeeController::class);
        Route::get('editkaryawan/{id}',[EmployeeController::class,'editkaryawan']);
        Route::post('updatekaryawan/{id}',[EmployeeController::class,'updatekaryawan']);
        Route::get('deletekaryawan/{id}',[EmployeeController::class,'deletekaryawan']);

        Route::resource('nanny', NannyController::class);
        Route::resource('transaction', ValidationTransactionController::class);
        Route::get('/buktitf', [ValidationTransactionController::class,'buktitf']);
        Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
        Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
        Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
});

Route::group(['prefix'=>'employee', 'middleware'=>['isEmployee','auth','PreventBackHistory']], function(){
    Route::get('absen',[EmployeeFullController::class,'absen']);
    Route::get('dashboard',[EmployeeFullController::class,'index'])->name('employee.dashboard');
    Route::get('profile',[EmployeeFullController::class,'profile'])->name('employee.profile');
    Route::get('settings',[EmployeeFullController::class,'settings'])->name('employee.settings');
    Route::resource('attendance', AttendanceController::class);
    Route::resource('child', ChildManagementController::class);
    Route::resource('schedule', ScheduleChildController::class);
    Route::resource('childDetail', ChildController::class);
    Route::resource('parent', ParentController::class);

});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('/attendance_child',[UserController::class,'absen']);
    Route::post('/postabsen',[UserController::class,'postabsen']);
    Route::get('cekhargapaket/{id}',[RegisterChildController::class, 'cekhargapaket']);
    Route::post('/uploadbuktiTF/{id}',[UserController::class,'uploadbuktiTF']);
    Route::get('registerChild1', function() {
        $paket = DB::table('paket')->get();
        return view('dashboards.users.baru.registerChild', compact('paket'));
    });
    Route::get('laporan_detail/{id}', [ReportDetailController::class,'reportdetail']);
    Route::get('schedule_detail/{id}', [ReportDetailController::class,'scheduledetail']);
    // Route::get('laporananak', ReportController::class);
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('daftaranak',[UserController::class,'daftaranak'])->name('user.daftaranak');
    Route::get('editanak/{id}',[UserController::class,'editanak']);
    Route::post('updateanak/{id}',[UserController::class,'updateanak']);
    Route::get('transaksi',[UserController::class,'transaksianak']);

    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::resource('childfull', DataChildController::class);
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
    // Route::get('registerChild',[RegisterChildController::class,'registerChild'])->name('user.registerChild');
    Route::resource('registerChild', RegisterChildController::class);
    Route::resource('', UserController::class);
    Route::resource('transaction', TransactionController::class);
    Route::resource('payment', PaymentUserController::class);
    Route::resource('schedule', ScheduleAllController::class);
    Route::resource('laporananak', ReportController::class);
    Route::resource('reportDetail', ReportDetailController::class);
});

Route::post('/registerChild/InputForm', [RegisterChildController::class, 'InputForm'])->name('registerChild.InputForm');
Route::post('/registerChild/Entrusted', [RegisterChildController::class, 'Entrusted'])->name('registerChild.Entrusted');
Route::post('/payment/uploadTf', [PaymentUserController::class, 'uploadTf'])->name('payment.uploadTf');
Route::post('/employee/changePhoto', [ChangeProfileController::class, 'changePhotoEmployee'])->name('profile.changePhotoEmployee');
Route::post('/profile/changePhoto', [ChangeProfileController::class, 'changePhoto'])->name('profile.changePhoto');
Route::post('/employee/InputForm', [EmployeeController::class, 'InputForm'])->name('registerChild.InputForm');
Route::post('/nanny/InputNanny', [NannyController::class, 'InputNanny'])->name('nanny.InputNanny');
Route::post('/transaction/Approve', [ValidationTransactionController::class, 'Approve'])->name('transaction.Approve');
Route::post('/transaction/Tolak', [ValidationTransactionController::class, 'tolak'])->name('transaction.tolak');
Route::post('/attendance/InputForm', [AttendanceController::class, 'InputForm'])->name('attendance.InputForm');
Route::post('/schedule/InputForm', [ScheduleChildController::class, 'InputForm'])->name('schedule.InputForm');
Route::post('/employee/childDetail/InputForm', [ChildController::class, 'InputForm'])->name('childDetail.InputForm');
Route::post('/employee/childDetail/InputFormACtivity', [ChildController::class, 'InputFormACtivity'])->name('childDetail.InputFormACtivity');
Route::get('/cctv',[UserController::class,'cctv'])->name('user.cctv');
