<?php

use App\Http\Middleware\Auth;
use App\Http\Middleware\Admin;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\StokDarahController;
use App\Http\Controllers\TotalStokController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\StokDarahHistoryController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PendonorController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\HubungiController;


// home user
Route::get('/welcome',[UserDashboardController::class, 'index'])->name('welcome');
Route::get('/stokdarah',[TotalStokController::class, 'index'])->name('total');
Route::get('/jadwal', [UserDashboardController::class, 'JadwalDonor'])->name('jadwal');
Route::get('/hubungi_kami', [UserDashboardController::class, 'hubungi'])->name('hubungi'); // method get
Route::post('/hubungi_kami', [UserDashboardController::class, 'hubungiCreate'])->name('hubungiCreate'); 
Route::get('/informasi/permintaandarah',[UserDashboardController::class, 'informasi1'])->name('informasi1');
Route::get('/informasi/kebutuhandarah', [UserDashboardController::class, 'informasi2'])->name('informasi2');
// informasi user

Route::get('/informasi/syaratdonor', function () {
    return view('/informasi/syaratdonor');
});
Route::get('/kontakkami', function () {
    return view('kontakkami');
});


Route::get('/auth/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/auth/register', [UserAuthController::class, 'register_action'])->name('user.register.action');

Route::get('/user/loginuser', [UserAuthController::class, 'login'])->name('user.login');
Route::post('/user/loginuser', [UserAuthController::class, 'login_action'])->name('user.login.action');

// user login
Route::middleware(['auth','userm'])->group(function () {
    // dashboard
    Route::get('/user/dashboarduser', [UserDashboardController::class, 'index'])->name('index');
    // form donor
    Route::get('/user/formdonor', [UserDashboardController::class, 'donorForm'])->name('formDonor');
    Route::post('/user/formdonor', [UserDashboardController::class, 'store'])->name('formDonorStore');

    // data donor
    Route::get('/user/data_donor', [UserDashboardController::class, 'showDataDonor'])->name('datadonor');

    // profil 
    Route::get('/user/profiluser', [UserDashboardController::class, 'profil'])->name('profilUser');
    Route::get('user/profiliuser_edit', [UserDashboardController::class, 'edit'])->name('profilUserEdit');
    Route::post('user/profiluser_edit', [UserDashboardController::class, 'edit_action'])->name('profilUserEditAction');
    Route::get('/user/change_password', [UserDashboardController::class, 'changePassword'])->name('changePassword');
    Route::post('/user/change_password', [UserDashboardController::class, 'changePassword_action'])->name('changePasswordAction');
   

    Route::post('/delete-token', [UserAuthController::class, 'deleteToken'])->name('deleteToken');
});




// admin login
Route::get('/auth/login', [AdminAuthController::class, 'login'])->name('login');
Route::post('/auth/login', [AdminAuthController::class, 'login_action'])->name('login.action');


// Admin Middleware
Route::middleware(['auth','admin'])->group(function () { 

    //home route
    Route::get('/admin/home', [HomeController::class, 'home'])->name('home');
    
    // Stok darah
    Route::get('/admin/stokdarah',[StokDarahController::class,'index'])->name('stokdarah'); // stok darah rincian
    Route::get('/admin/stokcreate', [StokDarahController::class, 'create'])->name('stokdarah.store');
    Route::post('/admin/stokcreate', [StokDarahController::class, 'create_action'])->name('stokdarah.store');
    Route::get('/admin/stokdarah_edit/{gol_darah}', [StokDarahController::class, 'edit'])->name('stokdarah.update');
    Route::put('/admin/stokdarah_edit/{gol_darah}', [StokDarahController::class, 'update'])->name('stokdarah.update');
    Route::delete('/stokdarah/{id}', [StokDarahController::class, 'destroy'])->name('stokdarah.delete');

    // jadwal donor darah
    Route::get('/admin/calender', [CalenderController::class, 'getAll'])->name('calender.get');

    Route::get('admin/calender_create', [CalenderController::class, 'create'])->name('create.calender');
    Route::post('admin/calender_create', [CalenderController::class, 'store'])->name('create.action');

    Route::get('/admin/calender_edit/{id}', [CalenderController::class, 'edit'])->name('edit.calender');
    Route::put('admin/calender_edit/{id}', [CalenderController::class, 'update'])->name('update.calender');

    Route::delete('/admin/calender/{id}', [CalenderController::class, 'destroy'])->name('delete.calender');

    // tampilan pesan dari user 
    Route::get('admin/hubungikami_view', [HubungiController::class,'hubungi'])->name('hubungi.admin');
    Route::delete('admin/hubungikami_view/{id}',[HubungiController::class, 'destroy'])->name('destroy');

    // histori
    Route::get('/admin/stokdarah_histori', [StokDarahController::class,'histori_index'])->name('stokdarah_histori');
    Route::get('/admin/cetakPdf',[StokDarahController::class,'exportPDF'])->name('cetakPdf'); // cetak di rincian darah
    Route::get('/admin/stokdarah_histori_pdf', [StokDarahController::class, 'export'])->name('exportHistori'); // cetak pdf histori di histori
  
    // profil 
    Route::get('/admin/profil', [ProfileController::class, 'profil'])->name('profil');
    Route::get('/admin/profil_edit', [ProfileController::class, 'profil_edit'])->name('profile.update');
    Route::post('/admin/profil_edit', [ProfileController::class, 'profil_update'])->name('profile.update');
    Route::get('/auth/password/reset', [ResetPasswordController::class, 'showResetForm'])->name('profile.update-password'); 
    Route::post('/auth/password/reset', [ResetPasswordController::class, 'resetPassword'])->name('profile.update-password');  // reset password

    // kelola posts dashboard user
    Route::get('admin/posts/admin_post', [PostController::class, 'post_index'])->name('admin.post.get'); // get data
    Route::get('admin/posts/create_post', [PostController::class, 'create'])->name('admin.post.store');
    Route::post('admin/posts/create_post', [PostController::class, 'store'])->name('admin.post.store'); // method create
    Route::get('admin/post/edit_post/{id}', [PostController::class, 'edit_posts'])->name('admin.post.edit'); 
    Route::put('admin/post/edit_post/{id}', [PostController::class, 'update_posts'])->name('admin.post.update'); // method edit
    Route::delete('admin/post/admin_post/{id}', [PostController::class, 'delete_posts'])->name('admin.post.delete'); // method delete

    // kelola data pendonor
    Route::get('admin/pendonor', [PendonorController:: class, 'index'])->name('pendonor');
    Route::get('/generate-pdf', [PendonorController::class, 'generatePDF'])->name('pendonor.pdf');
    Route::delete('admin/pendonor/{id}', [PendonorController::class, 'destroy'])->name('delete.pendonor');

    // method logout
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');    
});