<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SplashScreenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignOutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EOAccountController;
use App\Http\Controllers\EOEditProfileController;
use App\Http\Controllers\EOPromoCodeCollectionController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\OrderPaymentController;
use App\Http\Controllers\ActiveTicketController;
use App\Http\Controllers\ViewTicketController;
use App\Http\Controllers\EventDetailController;
use App\Http\Controllers\BuyTicketController;
use App\Http\Controllers\PrePaymentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AfterPaymentController;
use App\Http\Controllers\EOHomeController;
use App\Http\Controllers\EOCalendarController;
use App\Http\Controllers\EOEventsController;
use App\Http\Controllers\EOEventDetailController;
use App\Http\Controllers\AddEventProposalController;
use App\Http\Controllers\AddPromoCodeController;
use App\Http\Controllers\ForgetPasswordController;

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

Route::get('/', [SplashScreenController::class, 'render']);

Route::prefix('login')->group(function()
{
    Route::get('/', [LoginController::class, 'render']);
    Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
});

Route::prefix('sign-up')->group(function()
{
    Route::get('/{role}', [SignUpController::class, 'render']);
    Route::post('/{role}/create', [SignUpController::class, 'create']);
});

Route::prefix('home')->group(function()
{
    Route::get('/', [HomeController::class, 'render']);
});

Route::prefix('account')->group(function()
{
    Route::get('/', [AccountController::class, 'render']);

    Route::get('/edit-profile', [EditProfileController::class, 'render']);
    Route::post('/edit-profile/save', [EditProfileController::class, 'save']);

    Route::get('/order-history', [OrderHistoryController::class, 'render']);
    
    Route::get('/active-ticket', [ActiveTicketController::class, 'render']);
    Route::get('/view-ticket/{transactionID}', [ViewTicketController::class, 'render']);
    
    Route::get('/order-payment', [OrderPaymentController::class, 'render']);
});

Route::prefix('eo-account')->group(function()
{
    Route::get('/', [EOAccountController::class, 'render']);

    Route::get('/edit-profile', [EOEditProfileController::class, 'render']);
    Route::post('/edit-profile/save', [EOEditProfileController::class, 'save']);

    Route::get('/promo-code-collection', [EOPromoCodeCollectionController::class, 'render']);
});

Route::prefix('event')->group(function()
{
    Route::get('/{id}', [EventDetailController::class, 'render']);
    Route::post('/buy', [EventDetailController::class, 'buyTicket']);
});

Route::prefix('pre-payment')->group(function()
{
    Route::get('/{transactionID}', [PrePaymentController::class, 'render']);
    Route::get('/pay/{transactionID}', [PrePaymentController::class, 'pay']);
    Route::get('/cancel/{transactionID}', [PrePaymentController::class, 'cancel']);
});

Route::prefix('payment')->group(function()
{
    Route::get('/{transactionID}', [PaymentController::class, 'render']);
    Route::post('/{transactionID}/apply-promo', [PaymentController::class, 'applyPromo']);
    Route::post('/{transactionID}/pay', [PaymentController::class, 'pay']);
});

Route::get('/after-payment/{transactionID}', [AfterPaymentController::class, 'render']);

Route::get('sign-out', [SignOutController::class, 'signOut']);

Route::get('/eo-home', [EOHomeController::class, 'render']);
Route::get('/eo-calendar', [EOCalendarController::class, 'render']);
Route::get('/eo-events', [EOEventsController::class, 'render']);

Route::prefix('add-event-proposal')->group(function()
{
    Route::get('/', [AddEventProposalController::class, 'render']);
    Route::post('/request', [AddEventProposalController::class, 'request']);
    Route::get('/success', [AddEventProposalController::class, 'success']);
});

Route::prefix('eo-event')->group(function()
{
    Route::get('/{eventID}', [EOEventDetailController::class, 'render']);
    Route::get('/{eventID}/add-promo-code', [AddPromoCodeController::class, 'render']);
    Route::post('/{eventID}/add-promo-code/add', [AddPromoCodeController::class, 'add']);
    Route::get('/{eventID}/add-promo-code/success', [AddPromoCodeController::class, 'success']);
});

Route::prefix('/forget-password')->group(function()
{
    Route::get('/', [ForgetPasswordController::class, 'render']);
    Route::post('/send-email', [ForgetPasswordController::class, 'sendEmail']);
});