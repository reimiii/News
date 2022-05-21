<?php

use Illuminate\Support\Facades\Route;

// AdminRoute
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminAdsController;
use App\Http\Controllers\Admin\AdminCategoryController;

// FrontRoute
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;

// Depannya

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// end depannya

// Admin
Route::middleware(['admin:admin'])->group(function () {
  //

  // AdminHomeController
  Route::get('admin', [AdminHomeController::class, 'index'])->name('admin_home');

  // AdminLoginController
  Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');

  // AdminProfileController
  Route::get('admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile');
  Route::post('admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name(
    'admin_profile_submit'
  );

  // AdminAdsController

  //center ads
  Route::get('admin/ads/center-ads', [AdminAdsController::class, 'home_ad_show'])->name('admin_ads_home');
  Route::post('admin/ads/center-ads-update', [AdminAdsController::class, 'home_ad_update'])->name('admin_ads_home_update');
  // end center ads

  // top
  Route::get('admin/ads/top-ads', [AdminAdsController::class, 'top_ad_show'])->name('admin_ads_top');
  Route::post('admin/ads/top-ads-update', [AdminAdsController::class, 'top_ad_update'])->name('admin_ads_top_update');
  // end top

  // side
  Route::get('admin/ads/side-ads', [AdminAdsController::class, 'side_ad_show'])->name('admin_ads_side');
  Route::get('admin/ads/side-ads-add', [AdminAdsController::class, 'side_ad_show_create'])->name('admin_ads_side_create');

  Route::post('admin/ads/side-ads-store', [AdminAdsController::class, 'side_ad_store'])->name('admin_ads_side_store');

  Route::get('admin/ads/side-ads-edit/{id}', [AdminAdsController::class, 'side_ad_show_edit'])->name('admin_ads_side_edit');

  Route::get('admin/ads/side-ads-delete/{id}', [AdminAdsController::class, 'side_ad_show_delet'])->name('admin_ads_side_delete');

  Route::post('admin/ads/side-ads-update/{id}', [AdminAdsController::class, 'side_ad_update'])->name('admin_ads_side_update');

  // end side

  // category
  Route::get('admin/category', [AdminCategoryController::class, 'show'])->name('admin_category_show');
  Route::get('admin/category/create', [AdminCategoryController::class, 'create'])->name('admin_category_create');
  Route::post('admin/category/store', [AdminCategoryController::class, 'store'])->name('admin_category_store');
  Route::get('admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin_category_edit');
  Route::post('admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin_category_update');
  Route::get('admin/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin_category_delete');

});

// login

Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');

// endloginn

// reset password
Route::get('/admin/forgot-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forgot-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name(
  'admin_forget_password_submit'
);
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name(
  'admin_reset_password'
);
Route::post('/admin/reset-password-submit',
[AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

// endreset password
// End Admin
