<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    // return view('welcome');

    //DB Statements in Laravel - Raw Sql Queries

    //Select Statement
    // $users = DB::select('select * from users where email = ?', ['yuvabharathi001vp@gmail.com']);

    // $total_users = DB::select('select * from users ');

    // //Insert statement
    // $insert = DB::insert('insert into users (user_name,email,password) values (?, ?,?)', ['Gokul', 'gokul@gmail.com', 'gokul@123']);

    //Update statement
    // $update = DB::update('update users set email = ? where user_id = ?', ['yuva@123', 1]);

    //Delete Statement
    // $delete_user = DB::delete('delete from users where email = ?', ['gokul@gmail.com']);


    //Laravel Query Builder

    //Select Statements
    // $total_users = DB::table('users')->get();
    // $first_user = DB::table('users')->first();

    // $specific_user = DB::table('users')->where('user_id', 1)->get();
    // //select particular column
    // $select_user = DB::table('users')
    //     ->select('user_name', 'email as user_email')
    //     ->get();

    //insert statement
    // $insert_value = array(
    //     ['email' => 'gokul@123', 'user_name' => 'Gokul', 'password' => md5('gokul@123')],
    //     ['email' => 'sasi@123', 'user_name' => 'Sasi dharan', 'password' => md5('sasi@123')]
    // );
    // $insert = DB::table('users')->insert($insert_value);

    //Insert and Return last inserted ID
    $get_last_inserted_id = DB::table('users')->insertGetId(['user_name' => 'Ubesh', 'email' => 'ubesh@123', 'password' => md5('ubesh@123')]);

    dd($get_last_inserted_id);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
