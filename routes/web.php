<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    $users = User::all();
    foreach($users as $user){
        echo $user->name . " => " . $user->email
        . " => " .$user->password;
        echo "\n";
    }
});

Route::get('/populate', function(){

	// $user = User::create([
    //     'name' => 'sheikh',
    //     'email' => 'sheikh@gmail.com',
    //     'password' => bcrypt('password'),
    // ]);

    $data = ['name' => Str::random(10),
    'email' => Str::random(5).'@gmail.com',
    'password' => Str::random(10)];

    $id = User::create($data);

	print_r($data);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
