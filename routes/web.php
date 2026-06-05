<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CoachController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\GalleryItemController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\TrainingScheduleController;
use App\Http\Controllers\Admin\VenueController;
use App\Http\Controllers\Admin\VideoItemController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicPageController::class, 'home'])->name('home');
Route::get('/articles/{article}', [PublicPageController::class, 'article'])->name('article.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return redirect()->route('admin.settings.edit');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/settings', [SiteSettingController::class, 'edit'])->name('admin.settings.edit');
    Route::post('/admin/settings', [SiteSettingController::class, 'update'])->name('admin.settings.update');

    Route::resource('/admin/programs', ProgramController::class)->names('admin.programs');
    Route::resource('/admin/coaches', CoachController::class)->names('admin.coaches');
    Route::resource('/admin/venues', VenueController::class)->names('admin.venues');
    Route::resource('/admin/schedules', TrainingScheduleController::class)->names('admin.schedules');
    Route::resource('/admin/gallery', GalleryItemController::class)->names('admin.gallery');
    Route::resource('/admin/videos', VideoItemController::class)->names('admin.videos');
    Route::resource('/admin/articles', ArticleController::class)->names('admin.articles');
    Route::resource('/admin/contact-messages', ContactMessageController::class)->only(['index', 'show', 'destroy'])->names('admin.contact-messages');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
