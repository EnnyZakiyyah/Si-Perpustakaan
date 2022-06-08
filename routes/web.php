<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Author;
use App\Models\Katalog;
use Cviebrock\EloquentSluggable\Services\SlugService;

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
    return view('home.home', [
        "title" => "LPTP Surakarta",
    ]);
});

//Home-Sirkulasi 
Route::get('/home/sirkulasi/peminjaman-buku', function () {
    return view('home.sirkulasi.peminjaman-buku', [
        "title" => "Sirkulasi",
    ]);
});
Route::get('/home/sirkulasi/pengembalian-buku', function () {
    return view('home.sirkulasi.pengembalian-buku', [
        "title" => "Sirkulasi",
    ]);
});
Route::get('/home/sirkulasi/penelusuran-katalog', [KatalogController::class, 'index']);
Route::get('/home/sirkulasi/penelusuran-katalog/{katalog:slug}', [KatalogController::class, 'show']);
Route::get('/home/sirkulasi/bebas-pustaka', function () {
    return view('home.sirkulasi.bebas-pustaka', [
        "title" => "PSirkulasi",
    ]);
});

//Home-Layanan
Route::get('/home/layanan/keanggotaan', function () {
    return view('home.layanan.keanggotaan', [
        "title" => "Layanan",
    ]);
});
Route::get('/home/layanan/bibliography', function () {
    return view('home.layanan.bibliography', [
        "title" => "Layanan",
    ]);
});
Route::get('/home/layanan/bibliography/detil', function () {
    return view('home.detil.detil-bibliography', [
        "title" => "Layanan",
    ]);
});

//Home-Koleksi-Digital
Route::get('/home/koleksi-digital/koleksi-digital', function () {
    return view('home.koleksi-digital', [
        "title" => "Koleksi Digital",
    ]);
});
Route::get('/home/koleksi-digital/koleksi-digital/detil', function () {
    return view('home.detil-koleksi-digital', [
        "title" => "Koleksi Digital",
    ]);
});

// Kategori Katalog
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('home.sirkulasi.penelusuran-katalog', [
//         'title' => "Katalog By Kategori $category->name",
//         'katalogs' => $category->katalogs->load('category', 'author')
//     ]);
// });

// Kategori Author
// Route::get('/authors/{author:username}', function (Katalog $author) {
//     return view('home.sirkulasi.penelusuran-katalog', [
//         'title' => "Katalog By Kategori $author->name",
//         'katalogs' => $author->katalogs->load('category', 'author')
//     ]);
// });

// Route::get('sirkulasi/penelusuran-katalog/authors/{author:username}', function (Author $author) {
//     return view('home.sirkulasi.penelusuran-katalog', [
//         'title' => "Katalog By Author",
//         'katalogs' => $author->katalogs
//     ]);
// });

//Auth
Route::get('/sign-in', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/sign-in', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/sign-up', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/sign-up', [RegisterController::class, 'store']);


//Dashboard
Route::get('/dashboard', function(){
    return view('dashboard.index', [
        "title" => "Perpustakaan | Dashboard",
    ]);
})->middleware('auth');

//Dashboard SIRKULASI
Route::get('/dashboard/sirkulasi/peminjaman-buku', function () {
    return view('dashboard.sirkulasi.peminjaman-buku.index', [
        "title" => "Dashboard | Peminjaman Buku",
    ]);
});
Route::get('/dashboard/sirkulasi/pengembalian-buku', function () {
    return view('dashboard.sirkulasi.pengembalian-buku.index', [
        "title" => "Dashboard | Pengembalian Buku",
    ]);
});
Route::get('/dashboard/sirkulasi/penelusuran-katalog/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/sirkulasi/penelusuran-katalog', DashboardPostController::class)->middleware('auth');
//Route::resource('/dashboard/sirkulasi/peminjaman-buku', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/sirkulasi/bebas-pustaka', function () {
    return view('dashboard.sirkulasi.bebas-pustaka.index', [
        "title" => "Perpustakaan | Dashboard",
    ]);
});
//Dashboard LAYANAN
Route::get('/dashboard/layanan/keanggotaan', function () {
    return view('dashboard.layanan.keanggotaan.index', [
        "title" => "Dashboard | Keanggotaan",
    ]);
});
Route::get('/dashboard/layanan/bibliography', function () {
    return view('dashboard.layanan.bibliography.index', [
        "title" => "Dashboard | Bibliography",
    ]);
});
//Dashboard KOLEKSI DIGITAL
// Route::resource('/dashboard/koleksi-digital', DashboardPostController::class)->middleware('auth');
// Route::get('/dashboard/koleksi-digital', function () {
//     return view('dashboard.koleksi-digital.index', [
//         "title" => "Dashboard | Koleksi Digital",
//     ]);
// });
