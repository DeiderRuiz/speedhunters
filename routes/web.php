<?php

use App\Http\Controllers\AutosController;
use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\FinanciacionesController;
use App\Http\Controllers\PosventasController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\TestdriveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seguridad;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::domain('admin.' . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('admin.index');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    
        //AUTOS
        Route::get('autos/create', [AutosController::class,'create'])->name('autos.create');
        Route::post('autos', [AutosController::class,'store'])->name('autos.store');
        Route::get('autos/{auto}/edit', [AutosController::class,'edit'])->name('autos.edit');
        Route::patch('autos/{auto}',[AutosController::class,'update'])->name('autos.update');
        Route::delete('autos/{auto}', [AutosController::class,'destroy'])->name('autos.destroy');
    
        //COTIZACIONES
        Route::get('cotizacion', [CotizacionesController::class, 'index'])->name('cotizacion.index');
        Route::get('cotizacion/{cotizacion}/edit', [CotizacionesController::class,'edit'])->name('cotizacion.edit');
        Route::patch('cotizacion/{cotizacion}',[CotizacionesController::class,'update'])->name('cotizacion.update');
        Route::delete('cotizacion/{cotizacion}', [CotizacionesController::class,'destroy'])->name('cotizacion.destroy');
    
        //FINANCIACIONES
        Route::get('financiacion', [FinanciacionesController::class, 'index'])->name('financiacion.index');
        Route::get('financiacion/{financiacion}/edit', [FinanciacionesController::class,'edit'])->name('financiacion.edit');
        Route::patch('financiacion/{financiacion}',[FinanciacionesController::class,'update'])->name('financiacion.update');
        Route::delete('financiacion/{financiacion}', [FinanciacionesController::class,'destroy'])->name('financiacion.destroy');
    
        //POSVENTA
        Route::get('posventa', [PosventasController::class, 'index'])->name('posventa.index');
        Route::get('posventa/{posventa}/edit', [PosventasController::class,'edit'])->name('posventa.edit');
        Route::patch('posventa/{posventa}',[PosventasController::class,'update'])->name('posventa.update');
        Route::delete('posventa/{posventa}', [PosventasController::class,'destroy'])->name('posventa.destroy');
    
        //PQRS
        Route::get('pqrs', [PqrsController::class, 'index'])->name('pqrs.index');
        Route::get('pqrs/{pqrs}/edit', [PqrsController::class,'edit'])->name('pqrs.edit');
        Route::patch('pqrs/{pqrs}',[PqrsController::class,'update'])->name('pqrs.update');
        Route::delete('pqrs/{pqrs}', [PqrsController::class,'destroy'])->name('pqrs.destroy');
    
        //ROLES Y PERMISOS
        Route::get('permisos',[Seguridad\PermisosController::class, 'index'])->name('permisos.index');
        Route::resource('roles', Seguridad\RolesController::class);
    
        //TESTDRIVE
        Route::get('testdrive', [TestdriveController::class, 'index'])->name('testdrive.index');
        Route::get('testdrive/{testdrive}/edit', [TestdriveController::class,'edit'])->name('testdrive.edit');
        Route::patch('testdrive/{testdrive}',[TestdriveController::class,'update'])->name('testdrive.update');
        Route::delete('testdrive/{testdrive}', [TestdriveController::class,'destroy'])->name('testdrive.destroy');
    
        //USUARIOS
        Route::resource('users', UserController::class);
    });
});

Route::get('/', [AutosController::class,'welcome'])->name('index');


//AUTOS
Route::get('autos', [AutosController::class, 'index'])->name('autos.index');
Route::get('autos/{auto}',[AutosController::class,'show'])->name('autos.show');

//COTIZACIONES
Route::get('cotizacion/pdf/{id}', [CotizacionesController::class,'pdf'])->name('cotizacion.pdf');
Route::get('cotizacion/create', [CotizacionesController::class,'create'])->name('cotizacion.create');
Route::post('cotizacion', [CotizacionesController::class,'store'])->name('cotizacion.store');
Route::get('cotizacion/{cotizacion}',[CotizacionesController::class,'show'])->name('cotizacion.show');

//FINANCIACIONES
Route::get('financiacion/pdf/{id}', [FinanciacionesController::class,'pdf'])->name('financiacion.pdf');
Route::get('financiacion/create', [FinanciacionesController::class,'create'])->name('financiacion.create');
Route::post('financiacion', [FinanciacionesController::class,'store'])->name('financiacion.store');
Route::get('financiacion/{financiacion}',[FinanciacionesController::class,'show'])->name('financiacion.show');

//POSVENTA
Route::get('posventa/pdf/{id}', [PosventasController::class,'pdf'])->name('posventa.pdf');
Route::get('posventa/create', [PosventasController::class,'create'])->name('posventa.create');
Route::post('posventa', [PosventasController::class,'store'])->name('posventa.store');
Route::get('posventa/{posventa}',[PosventasController::class,'show'])->name('posventa.show');

//PQRS
Route::get('pqrs/create', [PqrsController::class,'create'])->name('pqrs.create');
Route::post('pqrs', [PqrsController::class,'store'])->name('pqrs.store');
Route::get('pqrs/{pqrs}',[PqrsController::class,'show'])->name('pqrs.show');

//TESTDRIVE
Route::get('testdrive/pdf/{id}', [TestdriveController::class,'pdf'])->name('testdrive.pdf');
Route::get('testdrive/create', [TestdriveController::class,'create'])->name('testdrive.create');
Route::post('testdrive', [TestdriveController::class,'store'])->name('testdrive.store');
Route::get('testdrive/{testdrive}',[TestdriveController::class,'show'])->name('testdrive.show');