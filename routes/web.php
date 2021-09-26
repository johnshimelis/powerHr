
<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\UserDisplayController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Auth::routes();
// Route::get('/join', function () {
//     return View('room');
// });

Route::get('/', function () {
    return redirect('admin/login');
});
Route::get('/login', function () {
    return redirect('admin/login');
})->name('login');

Route::get('/admin/login', [UserController::class, 'admin']);
Route::post('/admin/login/verify', [UserController::class, 'login_web']);
Route::get('/admin/salon/create', [SalonController::class, 'create']);
Route::post('/admin/salon/store', [SalonController::class, 'store']);

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Route::prefix('admin')->group(function () {
    Route::get('admin/logout', [UserController::class, 'admin_logout']);

    // Dahboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/adminuserchartdata', [DashboardController::class, 'adminUserChartData']);
    Route::get('/adminuserchartmonthdata', [DashboardController::class, 'adminUserMonthChartData']);
    Route::get('/adminusercharweekdata', [DashboardController::class, 'adminUserWeekChartData']);
    Route::get('/adminrevenuechartdata', [DashboardController::class, 'adminRevenueChartData']);
    Route::get('/adminrevenuechartmonthdata', [DashboardController::class, 'adminRevenueMonthChartData']);
    Route::get('/adminrevenuecharweekdata', [DashboardController::class, 'adminRevenueWeekChartData']);



    //Employees
    Route::resource('/employee', EmployeeController::class);
    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::get('/employee/{id}', [EmployeeController::class, 'show']);
    Route::get('/employee/create', [EmployeeController::class, 'create']);
    Route::post('/employee/store', [EmployeeController::class, 'store']);
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('/employee/update/{id}', [EmployeeController::class, 'update']);
    Route::post('/employee/hideEmp', [EmployeeController::class, 'hideEmp']);
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'destroy']);
    Route::get('/book', function () {
        return BookingController::class;
    });
    //booking
    // Route::resource('/booking', 'admin\BookingController');
    Route::get('/booking', [BookingController::class, 'index']);
    // Route::get('/booking/{id}', [BookingController::class, 'show']);
    Route::get('/modal/getdata/{id}', [BookingController::class, 'show']);
    Route::get('/booking/create', [BookingController::class, 'create']);
    Route::post('/booking/store', [BookingController::class, 'store']);
    Route::post('/booking/changestatus', [BookingController::class, 'changeStatus']);
    Route::post('/booking/changepaymentstatus', [BookingController::class, 'changePaymentStatus']);
    Route::post('/booking/paymentcount', [BookingController::class, 'paymentcount']);
    Route::post('/booking/timeslot', [BookingController::class, 'timeslot']);
    Route::post('/booking/selectemployee', [BookingController::class, 'selectemployee']);

    // Calender
    Route::resource('/calendar', CalendarController::class);
    // Route::get('/calendar', 'admin\CalendarController@index');

    // //users admin
    Route::resource('/users', UserDisplayController::class);
    Route::get('/users/{id}', [UserDisplayController::class, 'show']);
    Route::post('/users/filter', [UserDisplayController::class, 'user_index_filter']);
    Route::get('/users/create', [UserDisplayController::class, 'create']);
    Route::post('/users/store', [UserDisplayController::class, 'store']);
    Route::get('/users/delete/{id}', [UserDisplayController::class, 'destroy']);
    Route::post('/users/hideUser', [UserDisplayController::class, 'hideUser']);
    //Salon
    Route::get('/salon', [SalonController::class, 'index']);
    Route::get('/salon/create', [SalonController::class, 'create']);
    Route::get('/salon/edit', [SalonController::class, 'edit']);
    Route::post('/salon/update/{id}', [SalonController::class, 'update']);
    Route::post('/salon/hideSalon', [SalonController::class, 'hideSalon']);
    Route::post('/salon/dayoff', [SalonController::class, 'salonDayOff']);
});
