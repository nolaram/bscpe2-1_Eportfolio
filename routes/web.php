<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Adviser\DashboardController as AdviserDashboardController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AdviserController;

// Route::get('/', function () {
//     return redirect()->route('login');
// });

Route::get('/', function () {
    if (! Auth::check()) {
        return redirect()->route('login');
    }

    return match (Auth::user()->role->name) {
        'Admin' => redirect()->route('admin.dashboard'),
        'Adviser' => redirect()->route('adviser.dashboard'),
        'Student' => redirect()->route('student.dashboard'),
        default => abort(403),
    };
});

Route::get('/dashboard', function () {

    if (! Auth::check()) {
        return redirect()->route('login');
    }

    return match (Auth::user()->role->name) {
        'Admin'   => redirect()->route('admin.dashboard'),
        'Adviser' => redirect()->route('adviser.dashboard'),
        'Student' => redirect()->route('student.dashboard'),
        default   => abort(403),
    };

})->middleware('auth')->name('dashboard');

// Home page
// Route::get('/', function () {
//     return 'Home';
// });


// Route::get('/', function () {
//     // dd([
//     //     'logged_in' => Auth::check(),
//     //     'user' => Auth::user(),
//     //     'session' => session()->all(),
//     // ]);
// });

Route::middleware(['auth', 'role:Admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Route::resource('students', StudentController::class);

        Route::resource('students', StudentController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

        // Route::get('/students', [StudentController::class, 'index'])
        //     ->name('students.index');

        Route::resource('advisers', AdviserController::class);

        Route::get(
            'students/{student}/assign-adviser',
            [StudentController::class, 'assignAdviserForm']
        )->name('students.assign-adviser');

        Route::put(
            'students/{student}/assign-adviser',
            [StudentController::class, 'assignAdviser']
        )->name('students.assign-adviser.update');

    });

// Route::middleware('auth')
//     ->prefix('admin')
//     ->name('admin.')
//     ->group(function () {
//         Route::get('/dashboard', [AdminDashboardController::class, 'index'])
//             ->name('dashboard');
//     });

Route::middleware(['auth', 'role:Adviser'])
    ->prefix('adviser')
    ->name('adviser.')
    ->group(function () {
        Route::get('/dashboard', [AdviserDashboardController::class, 'index'])
            ->name('dashboard');
    });

Route::middleware(['auth', 'role:Student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource(
                'daily-attendances',
                \App\Http\Controllers\Student\DailyAttendanceController::class
            )->names('student.daily-attendances');
    });

// Load Breeze authentication routes
require __DIR__.'/auth.php';