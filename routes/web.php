<?php
use Illuminate\Support\Facades\Route;

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

//Route::get('/logout', function(){
    
    //$exitCode = Artisan::call('config:cache');
    //$exitCode = Artisan::call('cache:clear');
   // $exitCode = Artisan::call('view:clear');
  //  $exitCode = Artisan::call('route:cache');

   // Auth::logout();   
    //return Redirect::to('login');
//});

Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('/clear-cache', function() {
      //  $exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('view:clear');
        $exitCode = Artisan::call('route:cache');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() 
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/addnote', [App\Http\Controllers\AddnoteController::class, 'index'])->name('addnote');
    Route::get('/mynote', [App\Http\Controllers\MynoteController::class, 'index'])->name('mynote');
    Route::get('/mycategory', [App\Http\Controllers\MycategoryController::class, 'index'])->name('mycategory');
    Route::get('/addcategory', [App\Http\Controllers\MycategoryController::class, 'addCategory'])->name('addcategory');
    Route::post('/category/submit', [App\Http\Controllers\MycategoryController::class, 'savecategory'])->name('category-submit');
    Route::get('/account', [App\Http\Controllers\MyaccountController::class, 'index'])->name('account');
    
    Route::post('/addnote/submit', [App\Http\Controllers\AddnoteController::class, 'addnote'])->name('addnotesubmit');
    Route::post('/category/delete', [App\Http\Controllers\MycategoryController::class, 'deleteCategory'])->name('deleteCategory');
       
    Route::post('/snippet/delete', [App\Http\Controllers\AddnoteController::class, 'deleteSnippet'])->name('deleteSnippet');
    
    Route::post('/save/account', [App\Http\Controllers\MyaccountController::class, 'saveAccount'])->name('saveAccount');
    Route::post('/save/password/change', [App\Http\Controllers\MyaccountController::class, 'saveAccountPassword'])->name('saveAccountPassword');  
    
    Route::get('/update-category/{id}', [App\Http\Controllers\MycategoryController::class, 'updateCategory'])->name('update-category');
    Route::post('/update-category/submit', [App\Http\Controllers\MycategoryController::class, 'updateCategorySave'])->name('updateCats');
    Route::get('/snippet-list/{id}', [App\Http\Controllers\MysnippetController::class, 'index'])->name('snippet-list');
    Route::get('/view-snippet/{id}', [App\Http\Controllers\MysnippetController::class, 'view'])->name('view-snippet');    
        
    Route::get('/addnote/{id}', [App\Http\Controllers\AddnoteController::class, 'updateSnippet'])->name('updateSnippet');
   
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
   
});