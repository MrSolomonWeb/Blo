<?php
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

//Route::get('/', function () {
//    return view('home');
//});
//
//
//Route::get('/contact', function () {
//    return view('contact');
//});

//Route::view('/', 'home')->name('home');
//Route::view('/contact', 'contact')->name('contact');

//Route::get('/blog-post/{id_ttt}/{ih_ttt}', function ($_id,$auth) {
//    return $_id . '  ' . $auth;
//});
//Route::get('/blog-post/{id_ttt}/{ano?}', function ($_id,$wel=1) {
//   $page=[
//       1=>['title'=>' from page'],
//       2=>['title'=>' from page 2'],
//   ];
//});

//$welcomed=[1=>' Hello ',2=>' Welcome to '];
//
//if (isset($page[$_id],$welcomed[$wel])){
//    return view('blog-post',
//        ['data'=>$page[$_id],
//            'greet'=>$welcomed[$wel]]);
//}else{
//return redirect()->back();
//
//}
//
//})->name('blog-post');


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
//Route::get('/blog-post/{id}/{welcome?}', [HomeController::class, 'blogPost'])->name('blog-post');
Route::resource('/posts', PostController::class);
//    ->except('destroy');
//    ->only(['index', 'show','create','store','edit','update']);



//Route::get('/insert/{id}', function ($_id) {
//   $result = DB::select('select * from blog_posts where id =:id',[':id'=>$_id]);
//   foreach ($result as $data){
//       return $data->title . '<br>' . $data->content  ;
//   }
//
//});




//
//Route::get('/', function () {
//    if(Auth::check()) {
//        return redirect()->route('news');
//    }
//
//    return view('welcome');
//})->name('home');

Route::group(['namespace'=>'App\Http\Controllers','middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', [MainController::class, 'index']);

});

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
//Route::get('/admin', [MainController::class, 'index'])->middleware('admin');

Route::group(['namespace'=>'App\Http\Controllers','middleware'=>'guest'],function(){
    Route::get('/register', [UserController::class, 'create'])->name('create_user');
    Route::post('/register', [UserController::class, 'store'])->name('store_user');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');

});

Route::match(['get','post'],'/send', [ContactController::class, 'send']);

