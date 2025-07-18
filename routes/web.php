<?php

use App\Helpers\TripayHelper;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\MonthlyReportController;
use App\Http\Controllers\PaymentController;

Route::get('/',[HomeController::class,'index']);
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::resource('campaign', CampaignController::class);
Route::get('/articles',[ArticleController::class,'index'])->name('article.index');
Route::get('/articles/{id}',[ArticleController::class,'show'])->name('article.show');
Route::get('/payment/{reference}',[PaymentController::class,'detail'])->name('payment.detail');
Route::post('/payment/callback',[PaymentController::class,'callback'])->name('payment.callback');
Route::resource('laporan-keuangan',MonthlyReportController::class);

Route::prefix('donation')->group(function () {
    Route::post('/store', [PaymentController::class, 'store'])->name('donation.store');
    Route::post('/update-status', [PaymentController::class, 'updateStatus'])->name('donation.update-status');
    Route::get('/success/{id}', [PaymentController::class, 'success'])->name('donation.success');
    Route::get('/pending/{id}', [PaymentController::class, 'pending'])->name('donation.pending');
    Route::post('/webhook', [PaymentController::class, 'webhook'])->name('donation.webhook');
});


Route::get('/getChanels',function(){
    return TripayHelper::getChanels();
})->name('get.payment.channels');

