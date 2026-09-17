<?php

use App\Http\Controllers\Admin\ScheduleController as AdminScheduleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Coach\AttendanceController as CoachAttendanceManagementController;
use App\Http\Controllers\Coach\EvaluationController;
use App\Http\Controllers\CoachAttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Member\AttendanceController as MemberAttendanceController;
use App\Http\Controllers\Member\RankingController;
use App\Http\Controllers\MemberDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');

        Route::get('/admin/schedules', [AdminScheduleController::class, 'index'])->name('admin.schedules.index');
        Route::get('/admin/schedules/create', [AdminScheduleController::class, 'create'])->name('admin.schedules.create');
        Route::post('/admin/schedules', [AdminScheduleController::class, 'store'])->name('admin.schedules.store');
    });

    Route::middleware('role:coach')->group(function () {
        Route::get('/coach/dashboard', [CoachAttendanceController::class, 'index'])->name('coach.dashboard');
        Route::get('/coach/attendance', [CoachAttendanceManagementController::class, 'index'])->name('coach.attendance');
        Route::post('/coach/attendance', [CoachAttendanceManagementController::class, 'store'])->name('coach.attendance.store');

        Route::get('/coach/evaluations', [EvaluationController::class, 'index'])->name('coach.evaluations.index');
        Route::get('/coach/evaluations/create', [EvaluationController::class, 'create'])->name('coach.evaluations.create');
        Route::post('/coach/evaluations', [EvaluationController::class, 'store'])->name('coach.evaluations.store');
    });

    Route::middleware('role:member')->group(function () {
        Route::get('/member/dashboard', [MemberDashboardController::class, 'index'])->name('member.dashboard');
        Route::get('/member/attendance', [MemberAttendanceController::class, 'index'])->name('member.attendance.index');
        Route::post('/member/attendance', [MemberAttendanceController::class, 'store'])->name('member.attendance.store');
        Route::get('/member/rankings', [RankingController::class, 'index'])->name('member.rankings.index');
    });
});
