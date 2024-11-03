<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EventTypeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FilterDateController;
use App\Http\Controllers\PhotograperController;
use App\Http\Controllers\SearchBookingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'service'])->name('service');
Route::get('/services/{eventType}', [HomeController::class, 'filterByEventType'])->name('services.filter');
Route::get('/get-photographers/{event_type_id}', [PhotograperController::class, 'getUserByEventType']);


Route::get('/mail', [HomeController::class, 'mail'])->name('mail');
Route::post('/mail', [HomeController::class, 'submit_mail'])->name('mail.submit');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('reset-password');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password.submit');



Route::middleware(['auth'])->group(callback: function () {
    Route::get('/profile', [UserProfileController::class, 'profile'])->name('profile');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('/change-password', [UserProfileController::class, 'showChangePasswordForm'])->name('change-password');
    Route::post('/change-password', [UserProfileController::class, 'changePassword'])->name('change-password.update');

    Route::get('/booking-history', [BookController::class, 'history'])->name('booking.history');
    Route::get('/bookings/create/{id}', [BookController::class, 'create'])->name('booking.create');
    Route::post('/booking/store/{id}', [BookController::class, 'store'])->name('booking.store');
    Route::get('/booking/view/{id}', [BookController::class, 'view'])->name('booking.view');
    Route::get('/cities', [CityController::class, 'index'])->name('cities');

    // Admin routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Profile
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::controller(ProfileController::class)->group(function () {
                Route::get('/', 'profile')->name('index');
                Route::put('/', 'update')->name('update');
                Route::get('/change-password', 'showChangePasswordForm')->name('change-password');
                Route::post('/change-password', 'changePassword')->name('change-password.update');
            });
        });


        // Settings
        Route::controller(SettingsController::class)->prefix('settings')->name('settings.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'update')->name('update');
        });

        // Services
        Route::controller(ServiceController::class)->prefix('services')->name('services.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}',  'update')->name('update');
            Route::delete('/{id}',  'destroy')->name('destroy');
        });

        // Event Types
        Route::controller(EventTypeController::class)->prefix('event-types')->name('event-types.')->group(function () {
            Route::get('/', 'index')->name('index');

            Route::get('detail/{id}', 'detail')->name('detail');
            Route::post('addPhotographer/{id}', 'addPhotographer')->name('addPhotographer');
            Route::delete('removePhotographer/{id}/{photographer_id}', 'removePhotographer')->name('removePhotographer');

            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // Pages
        Route::controller(PageController::class)->prefix('pages')->name('pages.')->group(function () {
            Route::get('/about', 'about')->name('about');
            Route::put('/about', 'update_about')->name('update.about');

            Route::get('/contact', 'contact')->name('contact');
            Route::put('/contact', 'update_contact')->name('update.contact');
        });


        // Bookings
        Route::controller(BookingController::class)->prefix('bookings')->name('bookings.')->group(function () {
            Route::get('/all', 'all')->name('all');
            Route::get('/new', 'new')->name('new');
            Route::get('/approved', 'approved')->name('approved');
            Route::get('/cancelled', 'cancelled')->name('cancelled');
            Route::get('/detail/{id}', 'detail')->name('detail');
            Route::put('/update/{id}', 'update')->name('update');
        });

        // Contact
        Route::controller(ContactController::class)->prefix('contact-query')->name('contact-query.')->group(function () {
            Route::get('/unread', 'unread')->name('unread');
            Route::get('/read', 'read')->name('read');
            Route::get('/view/{id}', 'view')->name('view');
        });


        // Filter
        Route::controller(FilterDateController::class)->prefix('filter')->name('filter-date.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'filter')->name('filter');
        });

        // Search
        Route::controller(SearchBookingController::class)->prefix('search')->name('search-booking.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
    });
});
