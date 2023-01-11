<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentController;


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

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('is_admin');


Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket.store');

Route::get('/ticket/tickets', [TicketController::class, 'showTicket'])->name('ticket.show');
Route::get('/ticket/detail/{slug}', [TicketController::class, 'showTicketDetail'])->name('ticket.detail');


Route::post('/update-ticket/{id}', [TicketController::class, 'updateTicketDetail'])->name('ticket.update'); 
Route::post('/reject-request/{id}', [TicketController::class, 'rejection']);



Route::post('/comment/store',  [CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store',  [CommentController::class, 'replyStore'])->name('reply.add');