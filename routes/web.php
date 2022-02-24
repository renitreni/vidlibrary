<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Homepage;
use App\Http\Livewire\PayOuts;
use App\Http\Livewire\PermissionEdit;
use App\Http\Livewire\RoleCreate;
use App\Http\Livewire\RoleEdit;
use App\Http\Livewire\Roles;
use App\Http\Livewire\UserCreate;
use App\Http\Livewire\UserEdit;
use App\Http\Livewire\UserForm;
use App\Http\Livewire\VerifyVideos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic;

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

Route::get('/', Homepage::class)->name('home');
Route::get('/about', Homepage::class)->name('about');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', Dashboard::class)->name('dashboard');
    });
    Route::prefix('verify-videos')->group(function () {
        Route::get('/', VerifyVideos::class)->name('verify-videos')->middleware('permission:can.verify.videos');
    });
    Route::prefix('pay-outs')->group(function () {
        Route::get('/', PayOuts::class)->name('pay-outs')->middleware('permission:can.manage.payouts');
    });
    Route::prefix('manage-users')->group(function () {
        Route::get('/users', fn() => view('users'))->name('users')->middleware('permission:view.users');
        Route::get('/user/edit/{user}', UserEdit::class)->name('user.edit');
        Route::get('/user/create', UserCreate::class)->name('user.create');
        Route::get('/roles', Roles::class)->name('roles')->middleware('permission:view.roles');;
        Route::get('/edit/{role}', RoleEdit::class)->name('role.edit');
        Route::get('/create', RoleCreate::class)->name('role.create');
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/edit/{role}', PermissionEdit::class)->name('permission.edit');
    });


    Route::prefix('receipt/')->group(function () {
        Route::get('{name}', function (Request $request) {
            $path = storage_path('app/receipt/'.$request->name);

            if (!File::exists($path)) {
                abort(404);
            }
            return Image::make($path)->response('jpg');
        })->name('permission.edit');
    });
});
