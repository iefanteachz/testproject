<?php


use Illuminate\Support\Facades\Route;
use App\Livewire\PostCrud;
use App\Livewire\Dashboard;
use App\Livewire\StudentLivewire;
use App\Livewire\LogSystem;



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users', function () {
        return 'Users page';
    })->name('users');

    Route::get('/settings', function () {
        return 'Settings page';
    })->name('settings');
});



Route::get('/students', StudentLivewire::class)->name('students');
Route::get('/posts', PostCrud::class)->name('posts');
Route::get('/logs', LogSystem::class)->name('logs');

Route::view('/', 'welcome');
Route::get('/dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
