<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Multipic;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChangePassController;
use App\Http\Controllers\ServicesController;

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

Route::get('/users/info', 'HomeController@UserInfo')->name('users.info');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $service = DB::table('services')->get();
    $images = Multipic::all();
    
    return view('home', compact('brands','abouts','images','service'));
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // $users = User::all();
    // $users = DB::table('users')->get();
    // compact('users')
    return view('admin.index');
})->name('dashboard');

// CategoryController start//
Route::get('/category/all','CategoryController@AllCat')->name('all.catagory');

Route::post('/category/add','CategoryController@AddCat')->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);
// CategoryController end//

// BrandController start//
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');

Route::post('/brand/add',[BrandController::class, 'StoreBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);

Route::post('/brand/update/{id}', [BrandController::class, 'Update']);

Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

// BrandController end //

// Multipic routing star//
Route::get('/multi/image', [BrandController::class, 'Multpic'])->name('multi.image');

Route::post('/multi/add', [BrandController::class, 'Storeimg'])->name('store.image');


// Multipic routing end//

Route::get('/user/logout',[BrandController::class, 'logout'])->name('user.logout');


// Admin All Route slider start
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');

Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');

Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');

Route::get('/slider/edit/{id}', [HomeController::class, 'Edit']);

Route::post('/slider/update/{id}', [HomeController::class, 'Update']);

Route::get('/slider/delete/{id}', [HomeController::class, 'Delete']);
// Admin All Route slider end

// About start//
Route::get('/about', [AboutController::class, 'About'])->name('about');

Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');

Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');

Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');

Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);

Route::post('/update/about/{id}', [AboutController::class, 'UpdateAbout']);

Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);
// About End //

// services route start
Route::get('/services', [ServicesController::class, 'Services'])->name('services');

Route::get('/home/services', [ServicesController::class, 'HomeServices'])->name('home.services');

Route::get('/add/serv', [ServicesController::class, 'AddServ'])->name('add.serv');

Route::post('/store/serv', [ServicesController::class, 'StoreServ'])->name('store.serv');

Route::get('/services/delete/{id}', [ServicesController::class, 'DeleteServ']);

Route::get('/services/edit/{id}', [ServicesController::class, 'EditServ']);

Route::post('/update/services/{id}', [ServicesController::class, 'UpdateServ']);


// services route end

// portfolio page route start 
Route::get('/portfolio', [PortfolioController::class, 'Portfolio'])->name('portfolio');
// portfolio page route end

// contact route start

Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact', [ContactController::class, 'AdminAddContact'])->name('add.contact');
Route::post('/admin/store/contact', [ContactController::class, 'AdminStoreContact'])->name('store.contact');
Route::get('/contacts/delete/{id}', [ContactController::class, 'DeleteAbout']);

// contact route end

// home contact page route start

Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');

Route::post('/contact/form', [ContactController::class, 'ContactFrom'])->name('contact.form');

Route::get('/admin/massage', [ContactController::class, 'AdminMassage'])->name('admin.massage');

Route::get('/massage/delete/{id}', [ContactController::class, 'DeleteMassage']);
// home contact page route start


// change password start 
Route::get('/user/password', [ChangePassController::class, 'ChangePassword'])->name('change.password');

Route::post('/password/update', [ChangePassController::class, 'UpdatePassword'])->name('password.update');
// change password start 

// User profile.update start
Route::get('/user/profile', [ChangePassController::class, 'ProUpdate'])->name('profile.update');

Route::post('/user/profie/update', [ChangePassController::class, 'UpdateProfie'])->name('update.user.profie');
// User profile.update end

