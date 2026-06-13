<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

// Frontend
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\NewsController as FrontNewsController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\PPDBController;
use App\Http\Controllers\Frontend\ExtracurricularController as FrontExtracurricularController;
use App\Http\Controllers\Frontend\FacilityController as FacilityController;
use App\Http\Controllers\Frontend\NewsCommentController;

// Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ExtracurricularController as AdminExtracurricularController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\PPDBController as AdminPPDBController;

// Guru
use App\Http\Controllers\Guru\GuruDashboardController;
use App\Http\Controllers\Admin\TeachingScheduleController;
use App\Http\Controllers\Guru\AttendanceController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Profile
Route::get('/profile/sejarah', [ProfileController::class, 'sejarah']);
Route::get('/profile/ekstrakurikuler', [FrontExtracurricularController::class, 'index']);
Route::get('/profile/fasilitas', [FacilityController::class, 'index']);
Route::get('/profile/visi-misi', [ProfileController::class, 'visiMisi']);
Route::get('/profile/motto', [ProfileController::class, 'motoPondok']);
Route::get('/profile/panca-jiwa', [ProfileController::class, 'pancaJiwa']);

// News
Route::get('/news', [FrontNewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [FrontNewsController::class, 'show'])->name('news.show');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// PPDB
Route::get('/ppdb', [PPDBController::class, 'index'])->name('ppdb.index');
Route::post('/ppdb', [PPDBController::class, 'store'])->name('ppdb.store');
Route::post('/news/{id}/comment', [NewsCommentController::class, 'store'])->middleware('throttle:5,1');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('/news', AdminNewsController::class);
        Route::resource('/extracurriculars', AdminExtracurricularController::class);
        Route::resource('/videos', VideoController::class);
        Route::resource('/facilities', AdminFacilityController::class);

        Route::get('/comments', [CommentController::class, 'index']);
        Route::patch('/comments/{id}/approve', [CommentController::class, 'approve']);
        Route::delete('/comments/{id}', [CommentController::class, 'destroy']);

        Route::resource('announcements', AnnouncementController::class);

        Route::get('/ppdb/export', [AdminPPDBController::class, 'export'])->name('admin.ppdb.export');
        Route::get('/ppdb', [AdminPPDBController::class, 'index'])->name('admin.ppdb.index');
        Route::get('/ppdb/{id}', [AdminPPDBController::class, 'show'])->name('admin.ppdb.show');
        Route::delete('/ppdb/{id}', [AdminPPDBController::class, 'destroy'])->name('admin.ppdb.destroy');

        Route::resource('teaching-schedules', TeachingScheduleController::class);
        Route::resource('students',\App\Http\Controllers\Admin\StudentController::class);
        Route::get('/attendances' ,[App\Http\Controllers\Admin\AttendanceController::class, 'index'])->name('admin.attendances.index');
        Route::get('/attendances/{attendance}',[AttendanceController::class, 'show'])->name('admin.attendances.show');

    });

/*
|--------------------------------------------------------------------------
| GURU ROUTES
|--------------------------------------------------------------------------
*/
        Route::middleware(['auth', 'role:guru'])->prefix('guru')->group(function () {

        Route::get('/dashboard',[GuruDashboardController::class, 'index'])->name('guru.dashboard');

        Route::get('/attendance-history',[AttendanceController::class, 'history'])->name('guru.attendance.history');

        Route::get('/attendance/{schedule}',[AttendanceController::class, 'create'])->name('guru.attendance.create');

        Route::post('/attendance/{schedule}',[AttendanceController::class, 'store'])->name('guru.attendance.store');
        Route::get('/attendance-recap',[AttendanceController::class, 'recap'])->name('guru.attendance.recap');
        Route::get('/attendance-recap/pdf',[AttendanceController::class, 'exportPdf'])->name('guru.attendance.pdf');
        Route::get('/attendance-history/{attendance}',[AttendanceController::class, 'detail'])->name('guru.attendance.detail');
    });

/*
|--------------------------------------------------------------------------
| AUTH PROFILE (BREEZE)
|--------------------------------------------------------------------------
*/

    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';