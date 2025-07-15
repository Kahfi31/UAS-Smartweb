<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WisataUrbanController;
use App\Http\Controllers\WisataAlamController;
use App\Http\Controllers\WisataBudayaController;
use App\Http\Controllers\WisataKeluargaController;
use App\Http\Controllers\WisataKulinerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekomendasiAIController;
use App\Http\Controllers\TambahDestinasiController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\TransportasiController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

// Form Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Proses Register
Route::post('/register', [RegisterController::class, 'register']);

// Rute untuk halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rute untuk proses login
Route::post('/login', [LoginController::class, 'login']);

// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/wisataurban/show', [WisataUrbanController::class, 'show'])->name('wisataurban.show');
Route::get('/wisataurban/showdetailalunkotabatu', [WisataUrbanController::class, 'showdetailalunkotabatu'])->name('wisataurban.showdetailalunkotabatu');
Route::get('/wisataurban/showdetailbraga', [WisataUrbanController::class, 'showdetailbraga'])->name('wisataurban.showdetailbraga');
Route::get('/wisataurban/showdetailchinatown', [WisataUrbanController::class, 'showdetailchinatown'])->name('wisataurban.showdetailchinatown');
Route::get('/wisataurban/showdetailkotatua', [WisataUrbanController::class, 'showdetailkotatua'])->name('wisataurban.showdetailkotatua');
Route::get('/wisataurban/showdetailmalioboro', [WisataUrbanController::class, 'showdetailmalioboro'])->name('wisataurban.showdetailmalioboro');
Route::get('/wisataurban/showdetailSCBD', [WisataUrbanController::class, 'showdetailSCBD'])->name('wisataurban.showdetailSCBD');
Route::get('/wisataurban/showdetailseminyak', [WisataUrbanController::class, 'showdetailseminyak'])->name('wisataurban.showdetailseminyak');
Route::get('/wisataurban/showdetailsurabayanoth', [WisataUrbanController::class, 'showdetailsurabayanoth'])->name('wisataurban.showdetailsurabayanoth');
Route::get('/wisataurban/delete', [WisataUrbanController::class, 'delete'])->name('wisataurban.delete');
Route::get('/wisataurban/create', [WisataUrbanController::class, 'create'])->name('wisataurban.create');
Route::post('/wisataurban/store', [WisataUrbanController::class, 'store'])->name('wisataurban.store');

Route::get('/wisataalam/show', [WisataAlamController::class, 'show'])->name('wisataalam.show');
Route::get('/wisataalam/showdetailbromo', [WisataAlamController::class, 'showdetailbromo'])->name('wisataalam.showdetailbromo');
Route::get('/wisataalam/showdetaildanaukelimutu', [WisataAlamController::class, 'showdetaildanaukelimutu'])->name('wisataalam.showdetaildanaukelimutu');
Route::get('/wisataalam/showdetaildanautoba', [WisataAlamController::class, 'showdetaildanautoba'])->name('wisataalam.showdetaildanautoba');
Route::get('/wisataalam/showdetailkawahijen', [WisataAlamController::class, 'showdetailkawahijen'])->name('wisataalam.showdetailkawahijen');
Route::get('/wisataalam/showdetailpulaukomodo', [WisataAlamController::class, 'showdetailpulaukomodo'])->name('wisataalam.showdetailpulaukomodo');
Route::get('/wisataalam/showdetailrajaampat', [WisataAlamController::class, 'showdetailrajaampat'])->name('wisataalam.showdetailrajaampat');
Route::get('/wisataalam/showdetailtangkubanperahu', [WisataAlamController::class, 'showdetailtangkubanperahu'])->name('wisataalam.showdetailtangkubanperahu');
Route::get('/wisataalam/showdetailtumpaksewu', [WisataAlamController::class, 'showdetailtumpaksewu'])->name('wisataalam.showdetailtumpaksewu');
Route::get('/wisataalam/delete', [WisataAlamController::class, 'delete'])->name('wisataalam.delete');
Route::get('/wisataalam/create', [WisataAlamController::class, 'create'])->name('wisataalam.create');
Route::post('/wisataalam/store', [WisataAlamController::class, 'store'])->name('wisataalam.store');

Route::get('/wisatabudaya/show', [WisataBudayaController::class, 'show'])->name('wisatabudaya.show');
Route::get('/wisatabudaya/showdetailborobudur', [WisataBudayaController::class, 'showdetailborobudur'])->name('wisatabudaya.showdetailborobudur');
Route::get('/wisatabudaya/showdetailcetho', [WisataBudayaController::class, 'showdetailcetho'])->name('wisatabudaya.showdetailcetho');
Route::get('/wisatabudaya/showdetailfatahillah', [WisataBudayaController::class, 'showdetailfatahillah'])->name('wisatabudaya.showdetailfatahillah');
Route::get('/wisatabudaya/showdetailkeraton', [WisataBudayaController::class, 'showdetailkeraton'])->name('wisatabudaya.showdetailkeraton');
Route::get('/wisatabudaya/showdetailmajapahit', [WisataBudayaController::class, 'showdetailmajapahit'])->name('wisatabudaya.showdetailmajapahit');
Route::get('/wisatabudaya/showdetailprambanan', [WisataBudayaController::class, 'showdetailprambanan'])->name('wisatabudaya.showdetailprambanan');
Route::get('/wisatabudaya/showdetailrotterdam', [WisataBudayaController::class, 'showdetailrotterdam'])->name('wisatabudaya.showdetailrotterdam');
Route::get('/wisatabudaya/showdetailvredeburg', [WisataBudayaController::class, 'showdetailvredeburg'])->name('wisatabudaya.showdetailvredeburg');
Route::get('/wisatabudaya/delete', [WisataBudayaController::class, 'delete'])->name('wisatabudaya.delete');
Route::get('/wisatabudaya/create', [WisataBudayaController::class, 'create'])->name('wisatabudaya.create');
Route::post('/wisatabudaya/store', [WisataBudayaController::class, 'store'])->name('wisatabudaya.store');

Route::get('/wisatakeluarga/show', [WisataKeluargaController::class, 'show'])->name('wisatakeluarga.show');
Route::get('/wisatakeluarga/showdetaildufan', [WisataKeluargaController::class, 'showdetaildufan'])->name('wisatakeluarga.showdetaildufan');
Route::get('/wisatakeluarga/showdetailjatimpark', [WisataKeluargaController::class, 'showdetailjatimpark'])->name('wisatakeluarga.showdetailjatimpark');
Route::get('/wisatakeluarga/showdetailpantaisanur', [WisataKeluargaController::class, 'showdetailpantaisanur'])->name('wisatakeluarga.showdetailpantaisanur');
Route::get('/wisatakeluarga/showdetailtamanmini', [WisataKeluargaController::class, 'showdetailtamanmini'])->name('wisatakeluarga.showdetailtamanmini');
Route::get('/wisatakeluarga/showdetailtamanpintar', [WisataKeluargaController::class, 'showdetailtamanpintar'])->name('wisatakeluarga.showdetailtamanpintar');
Route::get('/wisatakeluarga/showdetailtamansafari', [WisataKeluargaController::class, 'showdetailtamansafari'])->name('wisatakeluarga.showdetailtamansafari');
Route::get('/wisatakeluarga/showdetailthegreatasia', [WisataKeluargaController::class, 'showdetailthegreatasia'])->name('wisatakeluarga.showdetailthegreatasia');
Route::get('/wisatakeluarga/showdetailtransstudio', [WisataKeluargaController::class, 'showdetailtransstudio'])->name('wisatakeluarga.showdetailtransstudio');
Route::get('/wisatakeluarga/delete', [WisataKeluargaController::class, 'delete'])->name('wisatakeluarga.delete');
Route::get('/wisatakeluarga/create', [WisataKeluargaController::class, 'create'])->name('wisatakeluarga.create');
Route::post('/wisatakeluarga/store', [WisataKeluargaController::class, 'store'])->name('wisatakeluarga.store');

Route::get('/wisatakuliner/show', [WisataKulinerController::class, 'show'])->name('wisatakuliner.show');
Route::get('/wisatakuliner/showdetail', [WisataKulinerController::class, 'showdetail'])->name('wisatakuliner.showdetail');
Route::get('/wisatakuliner/delete', [WisataKulinerController::class, 'delete'])->name('wisatakuliner.delete');
Route::get('/wisatakuliner/create', [WisataKulinerController::class, 'create'])->name('wisatakuliner.create');
Route::post('/wisatakuliner/store', [WisataKulinerController::class, 'store'])->name('wisatakuliner.store');

// Rekomendasi AI routes
Route::get('/rekomendasiAI', [RekomendasiAIController::class, 'index'])->name('rekomendasi.index');
Route::post('/rekomendasiAI/process', [RekomendasiAIController::class, 'rekomendasi'])->name('rekomendasi.process');
Route::get('/rekomendasi/suggestions', [RekomendasiAIController::class, 'getSuggestions'])->name('rekomendasi.suggestions');

Route::get('/transportasi', function () {
    return view('transportasi');
})->name('transportasi');
Route::post('/transportasi/rute', [TransportasiController::class, 'getRute'])->name('transportasi.rute');

// Komunitas route
Route::get('/komunitas', [KomunitasController::class, 'index']);

// Ulasan routes
Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
Route::get('/ulasan/{id}/create', [UlasanController::class, 'create'])->name('ulasan.create');
Route::post('/ulasan/{id}/store', [UlasanController::class, 'store'])->name('ulasan.store');
Route::get('/ulasan/{id}', [UlasanController::class, 'show'])->name('ulasan.show');
Route::get('/ulasan/search', [UlasanController::class, 'search'])->name('ulasan.search');

// Profile routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profil/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
});

// Tambah Destinasi routes (only for guide and admin)
Route::middleware(['auth', 'role:guide,admin'])->group(function () {
    Route::get('/tambahdestinasi', [TambahDestinasiController::class, 'index'])->name('tambahdestinasi.index');
    Route::post('/tambahdestinasi/store', [TambahDestinasiController::class, 'store'])->name('destinasi.store');
    Route::get('/tambahdestinasi/search-location', [TambahDestinasiController::class, 'searchLocation'])->name('destinasi.search-location');
});

// Friend routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/tambahteman', [FriendController::class, 'showTambahTeman'])->name('tambahteman.show');
    Route::post('/api/add-friend', [FriendController::class, 'addFriend'])->name('friend.add');
    Route::get('/api/friends', [FriendController::class, 'getFriends'])->name('friend.list');
    Route::post('/api/generate-pin', [FriendController::class, 'generatePin'])->name('friend.generate-pin');
    Route::post('/api/seed-dummy-friends', [FriendController::class, 'seedDummyFriends'])->name('friend.seed-dummy');

    // Chat message API
    Route::post('/api/messages/send', [MessageController::class, 'sendMessage']);
    Route::get('/api/messages/{friendId}', [MessageController::class, 'getMessages']);
});

// Admin routes (only for admin)
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/tourist', [AdminController::class, 'touristData'])->name('admin.tourist');
    Route::get('/guide', [AdminController::class, 'guideData'])->name('admin.guide');
    Route::get('/user/{id}/edit', [AdminController::class, 'editUser'])->name('admin.user.edit');
    Route::patch('/user/{id}/update', [AdminController::class, 'updateUser'])->name('admin.user.update');
    Route::delete('/user/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
});
