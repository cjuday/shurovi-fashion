<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
/*Controller*/
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PageTopImageController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SubgroupController;
use App\Http\Controllers\APIController;


/////////////////////////Front end
Route::get('/', [APIController::class,'HomePage']);

/////////////////////////Complete

Route::get('/home', function () {
    return redirect('admin/dashboard');
});
/*Done*/

/*Configure Cache & staffs*/
// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return 'Config cache has been cleared';
}); 

// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});
/*Done*/

/*Admin Panel*/
/*Authentication started*/
Route::get('/admin', function () {
    return view('admin/loginform');
})->middleware('guest')->name('login');

Route::post('attempt',[UserController::class,'login'])->name('admin.login');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('admin.logout');
/*END*/

//Dashboard
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    })->name('admin.dashboard');

    //home
    //slider
    Route::get('/slider', [PageController::class, 'slider'])->name('admin.slider');
    Route::get('/add-slider', [PageController::class, 'addslider'])->name('add.slider');
    Route::post('/addslider', [SliderController::class, 'store'])->name('store.slider');
    Route::get('/edit-slider/{id}', [PageController::class, 'editslider'])->name('edit.slider');
    Route::post('/editslider', [SliderController::class, 'update'])->name('update.slider');
    Route::get('/delete-slider/{id}', [SliderController::class, 'destroy'])->name('delete.slider');
    
    //clients
    Route::get('/clients', [PageController::class, 'clients'])->name('admin.client');
    Route::post('/addclient', [BrandController::class, 'store'])->name('store.client');
    Route::get('/edit-client/{id}', [PageController::class, 'editclient'])->name('edit.client');
    Route::post('/editclient', [BrandController::class, 'update'])->name('update.client');
    Route::get('/delete-client/{id}', [BrandController::class, 'destroy'])->name('delete.client');
    
    //about us
    //who we are
    Route::get('/who-we-are', [PageController::class, 'wwa'])->name('admin.who');
    //our vision
    Route::get('/our-vision', [PageController::class, 'ov'])->name('admin.vision');
    //our mission
    Route::get('/our-mission', [PageController::class, 'om'])->name('admin.mission');
    //value
    Route::get('/value', [PageController::class, 'val'])->name('admin.value');
    //services
    Route::get('/our-services', [PageController::class, 'srvc'])->name('admin.services');
    Route::get('/add-services', [PageController::class, 'addsrvc'])->name('add.services');
    Route::get('/edit-services/{id}', [PageController::class, 'editsrvc'])->name('edit.services');
    //testimonials
    Route::get('/testimonials', [PageController::class, 'tst'])->name('admin.testimonials');
    Route::get('/add-testimonials', [PageController::class, 'addtst'])->name('add.testimonials');
    Route::get('/edit-testimonials/{id}', [PageController::class, 'edittst'])->name('edit.testimonials');

    //cover image settings
    Route::get('/cover', [PageController::class, 'covers'])->name('admin.covers');
    Route::get('/edit-cover/{id}', [PageController::class, 'editcover'])->name('edit.cover');
    Route::post('/editcover', [PageTopImageController::class, 'update'])->name('update.cover');

    //products
    //category
    Route::get('/category', [PageController::class, 'cat'])->name('admin.cats');
    Route::get('/add-category', [PageController::class, 'addcat'])->name('add.cats');
    Route::post('/addcategory', [GroupController::class, 'store'])->name('store.cats');
    Route::get('/edit-category/{id}', [PageController::class, 'editcat'])->name('edit.cats');
    Route::post('/editcategory', [GroupController::class, 'update'])->name('update.cats');
    Route::get('/delete-category/{id}', [GroupController::class, 'destroy'])->name('delete.cat');

    //subcategory
    Route::get('/sub-category', [PageController::class, 'subcat'])->name('admin.subcats');
    Route::get('/add-subcategory', [PageController::class, 'addsubcat'])->name('add.subcats');
    Route::post('/addsubcategory', [SubgroupController::class, 'store'])->name('store.subcats');
    Route::get('/edit-subcategory/{id}', [PageController::class, 'editsubcat'])->name('edit.subcats');
    Route::post('/editsubcategory', [SubgroupController::class, 'update'])->name('update.subcats');
    Route::get('/delete-subcategory/{id}', [SubgroupController::class, 'destroy'])->name('delete.subcat');
   
});
