<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\CalendarController;

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

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// user
Route::get('/user', [UserController::class, 'index'])->name('user-management');
Route::post('/user-save', [UserController::class, 'save'])->name('user-save');
Route::post('/user-update/{id}', [UserController::class, 'update'])->name('user-update');
Route::get('/user-delete/{id}', [UserController::class, 'delete'])->name('user-delete');

// prospects
Route::get('/prospects', [ProspectController::class, 'index'])->name('prospects.index');
Route::get('/prospects-create', [ProspectController::class, 'create'])->name('prospects.create');
Route::post('/prospects-store', [ProspectController::class, 'Store'])->name('prospects.store');
Route::get('/prospects-edit/{id}', [ProspectController::class, 'edit'])->name('prospects.edit');
Route::post('/prospects-update/{id}', [ProspectController::class, 'update'])->name('prospects.update');
Route::get('/prospects-delete/{id}', [ProspectController::class, 'delete'])->name('prospects.delete');
Route::get('/prospects/{id}/show', [ProspectController::class, 'show'])->name('prospects.show');
Route::get('/prospects/transfer/{id}', [ProspectController::class, 'transferToLeads'])->name('prospects.transferToLeads');

Route::post('/prospects/{prospect}/feeds', [FeedController::class, 'store'])->name('feeds.store');
Route::get('/prospects/{prospect}', [FeedController::class, 'feedshow'])->name('feed.show');

// leads
Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
Route::get('/leads/create/{prospect}', [LeadController::class, 'create'])->name('leads.create');
Route::post('/leads/store', [LeadController::class, 'store'])->name('leads.store');
Route::get('/leads-delete/{id}', [LeadController::class, 'delete'])->name('leads.delete');
Route::get('/leads-edit/{id}', [LeadController::class, 'edit'])->name('leads.edit');
Route::post('/leads-update/{id}', [LeadController::class, 'update'])->name('leads.update');

// deal
Route::get('/deals', [DealController::class, 'index'])->name('deals.index');
Route::get('/leads/{lead}/convert', [DealController::class, 'create'])->name('deals.create');
Route::post('/deals', [DealController::class, 'store'])->name('deals.store');
Route::get('/deals-delete/{id}', [DealController::class, 'delete'])->name('deals.delete');
Route::post('/deals-update/{id}', [DealController::class, 'updateStatus'])->name('deals.update');

// Follow-up
Route::get('/deals/{deal}/followups', [FollowupController::class, 'create'])->name('followup.create');
Route::post('/deals/{deal}/followups', [FollowupController::class, 'store'])->name('followups.store');

// calendar
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/calendar/events', [CalendarController::class, 'events']);
