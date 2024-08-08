<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AuthApi;
use App\Http\Middleware\CheckLoginAdmin;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\ProductPermission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/', function () {
    return view('welcome');
})->middleware(EnsureTokenIsValid::class);


// Route::get('/unicode', function() {
//     return view('home');
// });

Route::get('/san-pham', function () {
    return view('product');
});

// Route::get('/', function () {
//     return 'Home page';
// });

// Route::get('/unicode', function() {
//     return 'get /unicode';
// });

// Route::post('/unicode', function(){
//     return 'post /unicode';
// });

// Route::put('/unicode', function(){
//     return 'put /unicode';
// });

// Route::patch('/unicode', function(){
//     return 'patch /unicode';
// });

// Route::match(['get', 'post'],'unicode', function(){
//     return $_SERVER['REQUEST_METHOD'];
// });

// Route::any('/unicode', function(Request $request){
//     // return $_SERVER['REQUEST_METHOD'];
//     return $request->method();
// });



// Route::redirect('/unicode', 'show-form', 301);
// Route::view('/show-form', 'form');  //chi ho tro cho get

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::prefix('/admin')->group(function () {
    Route::get('/tin-tuc/{slug?}-{id?}.html', function ($slug = null, $id = null) {
        $content = 'get /unicode với tham số ';
        $content .= 'slug = ' . $slug . '<br/>';
        $content .= 'id = ' . $id;
        return $content;
    })->where(
            [
                'slug' => '[a-z-]+',
                'id' => '[0-9]+'
            ]
        )->name('admin.tintuc');
    Route::get('/show-form', function () {
        return view('form');
    })->name('admin.show-form');


    // Route::middleware('admin')->group(function () {
    //     Route::prefix('products')->group(function () {
    //         Route::get('/', function () {
    //             return 'list products';
    //         });
    //         Route::get('/add', function () {
    //             return 'add';
    //         })->name('admin.products.add');
    //         Route::get('/update', function () {
    //             return 'update';
    //         });
    //         Route::get('/delete', function () {
    //             return 'delete';
    //         });
    //     });
    // });


});

Route::get('/index', [HomeController::class, 'index'])->name('index');
Route::get('get-news/{id}', [HomeController::class, 'getNews'])->name('getNews');

Route::middleware('halo')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('/all', [CategoriesController::class, 'index'])->name('category.all');
        Route::get('/add', [CategoriesController::class, 'create'])->name('category.add');
        Route::post('/create', [CategoriesController::class, 'postCreate'])->name('category.create');
        Route::post('/update/{id}', [CategoriesController::class, 'uodate'])->name('category.update');
        Route::get('/show/{id}', [CategoriesController::class, 'show'])->name('category.show');
        Route::delete('/delete/{id}', [CategoriesController::class, 'create'])->name('category.delete');
    });
});




// Route::prefix('admin') ->group(function(){
//     Route::prefix('product') ->group(function(){
//         Route::get('/', [ProductsController::class, 'index'])->name('admin.product.index');
//         Route::get('/create', [ProductsController::class,'create'])->name('admin.product.create');
//         Route::post('/store', [ProductsController::class, 'store'])->name('admin.product.store');
//         Route::get('/show/{id}', [ProductsController::class, 'show'])->name('admin.product.show');
//         Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('admin.product.edit');
//         Route::post('/update/{id}', [ProductsController::class, 'update'])->name('admin.product.update');
//         Route::delete('/delete/{id}', [ProductsController::class, 'destroy'])->name('admin.product.destroy');
//     });
// });

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(ProductPermission::class);

Route::middleware('halo')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('', [DashboardController::class, 'index']);
        Route::resource('products', ProductsController::class);
    });
});



Route::get('/product', [ProductController::class, 'getAllProducts'])->name('products.all')->middleware(CheckLoginAdmin::class);

Route::get('san-pham/{id}', [HomeController::class, 'getProductDetail'])->name('product.detail');
