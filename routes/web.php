<?php



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;

Route::get('/teste-db', function () {
    try {
        DB::connection()->getPdo();
        return "CONEXÃO OK COM O BANCO!";
    } catch (\Exception $e) {
        return "ERRO: " . $e->getMessage();
    }
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate'])->name('login.submit');

    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/register', [UserController::class, 'storeWeb'])->name('register.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return redirect()->route('products.index');
    })->name('home');

    Route::get('/products', [ProductsController::class, 'indexWeb'])->name('products.index');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductsController::class, 'storeWeb'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});
