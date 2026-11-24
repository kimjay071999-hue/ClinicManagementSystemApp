<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\DoctorNotificationController;
use App\Http\Controllers\DoctorReportController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\CashierController;
use App\Livewire\Actions\Logout;



// =====================================================
// HOME
// =====================================================

Route::get('/', function () {
    return redirect()->route('login');
});


// =====================================================
// ADMIN / DOCTOR / NURSE
// PATIENT MANAGEMENT
// =====================================================

Route::middleware([
    'auth',
    'verified',
    'role:admin,doctor,nurse'
])->group(function () {

    // Patients
    Route::resource('patients', PatientController::class);

    // Patient History
    Route::get('/patients/{id}/history', [PatientController::class, 'history'])
        ->name('patients.history');
});


// =====================================================
// ADMIN ONLY
// =====================================================

Route::middleware([
    'auth',
    'verified',
    'role:admin'
])->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Doctors Management
    Route::resource('doctors', DoctorController::class);

    // Nurses Management
    Route::resource('nurses', NurseController::class);

    // Admin Reports
Route::get('/reports', [ ReportController::class,
    'admin'
])->name('reports.admin');
});


// =====================================================
// DOCTOR DASHBOARD
// =====================================================

Route::middleware([
    'auth',
    'verified',
    'role:doctor'
])->prefix('doctor')->name('doctor.')->group(function () {

    Route::get('/dashboard', [
        DoctorDashboardController::class,
        'index'
    ])->name('dashboard');

    // Doctor Notifications
Route::get('/notifications', [DoctorDashboardController::class, 'notifications'])
    ->name('notifications');

});


// =====================================================
// DOCTOR DASHBOARD AND NOTIFICATIONS
// =====================================================

Route::middleware([
    'auth',
    'verified',
    'role:doctor'
])->prefix('doctor')->name('doctor.')->group(function () {

    // Doctor Dashboard
    Route::get('/dashboard', [
        DoctorDashboardController::class,
        'index'
    ])->name('dashboard');

    // Doctor Notifications
    Route::get('/notifications', [
        DoctorNotificationController::class,
        'index'
    ])->name('notifications');

    // Mark All Notifications as Read
    Route::patch('/notifications/read-all', [
        DoctorNotificationController::class,
        'markAllAsRead'
    ])->name('notifications.readAll');

    // Mark Specific Notification as Read
    Route::patch('/notifications/{id}/read', [
        DoctorNotificationController::class,
        'markAsRead'
    ])->name('notifications.read');

    // Delete Notification
    Route::delete('/notifications/{id}', [
        DoctorNotificationController::class,
        'destroy'
    ])->name('notifications.destroy');

    // Doctor Reports
    Route::get('/reports', [ DoctorReportController::class, 'index' ])->name('reports');

});

// =====================================================
// NURSE DASHBOARD
// =====================================================

Route::middleware([
    'auth',
    'verified',
    'role:nurse'
])->prefix('nurse')->name('nurse.')->group(function () {

    Route::view('/dashboard', 'nurses.dashboard')
        ->name('dashboard');
});


// =====================================================
// ADMIN / DOCTOR / NURSE
// CLINIC OPERATIONS
// =====================================================

Route::middleware([
    'auth',
    'verified',
    'role:admin,doctor,nurse'
])->group(function () {

    // Appointments
    Route::resource('appointments', AppointmentController::class);

    // Medical Records
    Route::resource('medical_records', MedicalRecordController::class);

    // Prescriptions
    Route::resource('prescriptions', PrescriptionController::class);

    // Billing
    // Route::resource('bills', BillController::class);
});



// =====================================================
// PATIENT ONLY
// OWN HISTORY
// =====================================================

Route::middleware([
    'auth',
    'verified',
    'role:patient'
])->group(function () {

    Route::get('/my-history', [PatientController::class, 'myHistory'])
        ->name('patients.my-history');

    // MESSAGE US PAGE
    Route::get('/message-us', function () {
        return view('patients.message');
    })->name('patients.message');

    // SEND MESSAGE VIA EMAIL
    Route::post('/my-history/message', [PatientController::class, 'sendMessage'])
        ->name('patients.send-message');
});


// Route::middleware([
//     'auth',
//     'verified',
//     'role:patient'
// ])->group(function () {

//     Route::get('/my-history', [PatientController::class, 'myHistory'])
//         ->name('patients.my-history');

//         Route::post('/my-history/message', [PatientController::class, 'sendMessage'])
//     ->name('patients.send-message');
// });



// =====================================================
// SIMPLE AUTH PAGE
// =====================================================

Route::get('/auth/simple', function () {
    return view('auth.simple');
})->name('auth.simple');


// =====================================================
// LOGOUT
// =====================================================

Route::get('/signout', Logout::class)
    ->name('signout');


// =====================================================
// SETTINGS
// =====================================================

require __DIR__.'/settings.php';



// =====================================================
// BILLING
// ADMIN / CASHIER
// =====================================================

Route::middleware([
    'auth',
    'verified',
    'role:admin,cashier'
])->group(function () {

    Route::resource('bills', BillController::class);

});


// =====================================================
// CASHIER ONLY
// =====================================================

Route::middleware([
     'auth',
    'role:cashier'
])
    ->prefix('cashier')
    ->name('cashier.')
    ->group(function () {

        // Cashier Dashboard
        Route::get('/', [
            CashierController::class,
            'index'
        ])->name('index');

        // View Bill
        Route::get('/bills/{id}', [
            CashierController::class,
            'show'
        ])->name('show');

        // Process Payment
        Route::post('/bills/{id}/payment', [
            CashierController::class,
            'store'
        ])->name('store');

        // Print Receipt
        Route::get('/receipts/{id}', [
            CashierController::class,
            'receipt'
        ])->name('receipt');

        // Payment History
        Route::get('/history', [
            CashierController::class,
            'history'
        ])->name('history');

    });


    //403
    Route::get('/test-403', function () {
    abort(403);
});


// =====================================================
// CLINIC SYSTEM SETTINGS
// =====================================================

Route::middleware([
    'auth',
    'verified',
])->prefix('clinic-settings')->name('settings.')->group(function () {

    // Settings Main Page
    Route::get('/', [SettingsController::class, 'index'])
        ->name('index');

    // Update Profile
    Route::put('/profile', [SettingsController::class, 'updateProfile'])
        ->name('profile.update');

    // Update Password
    Route::put('/password', [SettingsController::class, 'updatePassword'])
        ->name('password.update');

});

