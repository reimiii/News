<?php

use Illuminate\Support\Facades\Route;

// AdminRoute
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminAdsController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PhotoController;

// FrontRoute
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\NewsPostController;
use App\Http\Controllers\Front\SubCatController;
use App\Http\Controllers\Front\PController;

// Depannya

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('photo-gallery', [PController::class, 'index'])->name('photo_gallery');
Route::get('video-gallery', [PController::class, 'video'])->name('video_gallery');

// detail
Route::get('news/{id}', [NewsPostController::class, 'detail'])->name('news_detail');
Route::get('category/{id}', [SubCatController::class, 'index'])->name('category');

// end depannya

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

// Admin
Route::middleware(['admin:admin'])->group(function () {
    // AdminHomeController
    Route::get('admin', [AdminHomeController::class, 'index'])->name('admin_home');

    // SettingController
    Route::get('setting', [SettingController::class, 'index'])->name('admin_setting');
    Route::post('setting/update', [SettingController::class, 'update'])->name('admin_update_setting');

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
    // end category

    // sub category
    Route::get('admin/sub-category', [SubCategoryController::class, 'show'])->name('admin_sub_category_show');
    Route::get('admin/sub-category/create', [SubCategoryController::class, 'create'])->name('admin_sub_category_create');
    Route::post('admin/sub-category/store', [SubCategoryController::class, 'store'])->name('admin_sub_category_store');
    Route::get('admin/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin_sub_category_edit');
    Route::post('admin/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('admin_sub_category_update');
    Route::get('admin/sub-category/delete/{id}', [SubCategoryController::class, 'delete'])->name('admin_sub_category_delete');

    // post
    Route::get('admin/post', [PostController::class, 'show'])->name('admin_post_show');
    Route::get('admin/post/create', [PostController::class, 'create'])->name('admin_post_create');
    Route::post('admin/post/store', [PostController::class, 'store'])->name('admin_post_store');
    Route::get('admin/post/edit/{id}', [PostController::class, 'edit'])->name('admin_post_edit');
    Route::post('admin/post/update/{id}', [PostController::class, 'update'])->name('admin_post_update');
    Route::get('admin/post/delete/{id}', [PostController::class, 'delete'])->name('admin_post_delete');
    Route::get('admin/post/tags/delete/{id}/{id1}', [PostController::class, 'tag_delete'])->name('admin_post_tag_delete');


    // photo
    Route::get('admin/photo', [PhotoController::class, 'show'])->name('admin_photo_show');
    Route::get('admin/photo/create', [PhotoController::class, 'create'])->name('admin_photo_create');
    Route::post('admin/photo/store', [PhotoController::class, 'store'])->name('admin_photo_store');
    Route::get('admin/photo/edit/{id}', [PhotoController::class, 'edit'])->name('admin_photo_edit');
    Route::post('admin/photo/update/{id}', [PhotoController::class, 'update'])->name('admin_photo_update');
    Route::get('admin/photo/delete/{id}', [PhotoController::class, 'delete'])->name('admin_photo_delete');
    // end photo


    // video
    Route::get('admin/video', [\App\Http\Controllers\Admin\AdminVideoController::class, 'show'])->name('admin_video_show');
    Route::get('admin/video/create', [\App\Http\Controllers\Admin\AdminVideoController::class, 'create'])->name('admin_video_create');
    Route::post('admin/video/store', [\App\Http\Controllers\Admin\AdminVideoController::class, 'store'])->name('admin_video_store');
    Route::get('admin/video/edit/{id}', [\App\Http\Controllers\Admin\AdminVideoController::class, 'edit'])->name('admin_video_edit');
    Route::post('admin/video/update/{id}', [\App\Http\Controllers\Admin\AdminVideoController::class, 'update'])->name('admin_video_update');
    Route::get('admin/video/delete/{id}', [\App\Http\Controllers\Admin\AdminVideoController::class, 'delete'])->name('admin_video_delete');
    // end photo


});

Route::fallback(function () {
    return view('errors.404');
});


// End Admin
