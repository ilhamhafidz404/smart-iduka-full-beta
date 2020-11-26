<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\KategoriController;
use App\Http\Controllers\Dashboard\KualifikasiController;
use App\Http\Controllers\Dashboard\StatusNikahController;
use App\Http\Controllers\Dashboard\AkunsController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\CompaniesController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\ManagementLokerController;
use App\Http\Controllers\Auth\DaftarUsercontroller;
use App\Http\Controllers\Auth\DaftarPerusahaanController;
use App\Http\Controllers\User\ProfileController;
use App\http\Controllers\Company\ProfileCompanyController;
use App\Http\Controllers\Company\PostLokerController;
use App\Http\Controllers\Company\PelamarController;
use App\Http\Controllers\Company\InterviewController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckRole;

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

Auth::routes(['register'=>false]);


// ROUTE HALAMAN UTAMA SETELAH LOGIN
Route::get('/home', [HomeController::class, 'index'])->name('home');



// ROUTE REDIRECT SAAT LOGIN
Route::get('/', [HomeController::class, 'redirectLogin'])->name('redirectLogin');




/* ---------------------- HALAMAN BERKAITAKAN DENGAN LOWONGAN KERJA ---------------------------*/
Route::get('/lowongan-kerja/detail/{slug}',
	[HomeController::class,'detailLoker'])->name('detail.lowongan-kerja');
Route::post('/lowongan-kerja/detail/{id}',
	[PelamarController::class,'store'])->name('lowongan-kerja.melamar');
Route::get('/lowongan-kerja/detail/{id}/hapus',
	[PelamarController::class,'destroy'])->name('lowongan-kerja.hapus');






/* ---------------------- ROUTE UNTUK PENDAFTARAN ----------------------*/
Route::post('/daftar/pencari-kerja',[DaftarUserController::class, 'register']);
Route::get('/daftar/pencari-kerja',[DaftarUserController::class, 'showRegistrationForm']);
Route::post('/daftar/perusahaan',[DaftarPerusahaanController::class, 'register']);
Route::get('/daftar/perusahaan',[DaftarPerusahaanController::class, 'showRegistrationForm']);



/* ----------------------MENU UNTUK SUPER ADMIN DAN ADMIN ---------------------------*/
Route::middleware(['checkrole:admin,super_admin'])->group(function () {
Route::get('/dashboard/admin', [HomeController::class, 'dashboard'])->name('dashboard');
Route::resource('/dashboard/management/kategori',KategoriController::class);
Route::resource('/dashboard/management/kualifikasi',KualifikasiController::class);
Route::resource('/dashboard/management/status-nikah',StatusNikahController::class);
Route::resource('/dashboard/management/admins',AdminsController::class);
Route::resource('/dashboard/management/companies',CompaniesController::class);
Route::resource('/dashboard/management/users',UsersController::class);
Route::get('/dashboard/management/loker/belum-ditinjau',[ManagementLokerController::class,'indexpending'])
		->name('management.loker.indexpending');
Route::get('/dashboard/management/loker/sudah-ditinjau',[ManagementLokerController::class,'indexnotpending'])
->name('management.loker.indexnotpending');
Route::get('/dashboard/management/loker/{id}/tinjau',[ManagementLokerController::class,'tinjauGet'])->name('post.tinjau');
Route::post('/dashboard/management/loker/{id}/tinjau',[ManagementLokerController::class,'tinjauPost'])->name('post.tinjauPost');
});


/* ----------------------------- MENU UNTUK PERUSAHAAN ---------------------	----------*/
Route::middleware(['checkrole:company'])->group(function () {
Route::get('/dashboard/perusahaan', [HomeController::class, 'company'])->name('company');
Route::resource('profile-perusahaan',ProfileCompanyController::class);
Route::resource('management/lowongan-kerja',PostLokerController::class);
Route::get('management/perlamar',[PelamarController::class,'dataPelamar'])
		->name('pelamar.index');
Route::get('management/perlamar/lolos',[PelamarController::class,'lolos'])
->name('pelamar.lolos');
Route::get('management/perlamar/gagal',[PelamarController::class,'gagal'])
->name('pelamar.gagal');
Route::post('management/perlamar/{id}/tolak',[PelamarController::class,'tolakLamaran'])
		->name('pelamar.tolak');
Route::get('management/perlamar/{id}/detail',[PelamarController::class,'detailPelamar'])
		->name('detail.perlamar');
Route::get('management/perlamar/{id}/tinjau',[PelamarController::class,'tinjauPelamar'])
		->name('tinjau.perlamar');
Route::post('management/perlamar/{id}/tinjau',[PelamarController::class,'tinjauPelamarPost'])
		->name('tinjau.perlamar.post');
Route::get('management/perlamar/{id}/jadwalkan-interview',[PelamarController::class,'aturInterview'])
		->name('aturInterview.perlamar');
Route::post('management/perlamar/{id}/jadwalkan-interview',[InterviewController::class,'store'])
		->name('interview.pelamar.post');

Route::get('management/perlamar/interview',[InterviewController::class,'index']);
Route::post('management/perlamar/interview/{id}/done',[InterviewController::class,'doneInverview'])
		->name('doneInverview');
Route::post('management/perlamar/interview/{id}/keputusan',[InterviewController::class,'keputusanAkhir'])
		->name('keputusanAkhir');	

});


/* ---------------------------MENU UNTUK USER ------------------------------*/
Route::middleware(['checkrole:user'])->group(function () {
Route::resource('user/profile',ProfileController::class);
Route::get('/lamaran-saya',[PelamarController::class, 'listLamaranUser'])->name('lamaran.index');
Route::get('/user/jadwal-interiew',[InterviewController::class, 'myinterview'])->name('myinterview.index');

});




Route::get('/send-email',[MailController::class,'sendEmail']);