<?php
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;/*
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
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware' => ['auth','role:administrator']],function (){
Route::group(['middleware' => ['auth']],function (){
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);    
    Route::resource('menus', App\Http\Controllers\MenusController::class);
    Route::resource('menuPermissions', App\Http\Controllers\MenuPermissionsController::class);

    Route::get('/selectAjax', [App\Http\Controllers\SelectAjaxController::class, 'index'])->name('selectAjax');
    Route::get('/events', [App\Http\Controllers\EventsController::class, 'index'])->name('events.index');
});

/* builder generator */
Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');