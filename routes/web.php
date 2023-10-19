<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\ScoreHistoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\ModuleController as AdminModuleController;
use App\Http\Controllers\Admin\WebinarController as AdminWebinarController;
use App\Http\Controllers\Admin\GiftCardController as AdminGiftCardController;
use App\Http\Controllers\Admin\PharmacyController as AdminPharmacyController;
use App\Http\Controllers\Admin\QuestionController as AdminQuestionController;
use App\Http\Controllers\Admin\ChallengeController as AdminChallengeController;
use App\Http\Controllers\Admin\ResourcesController as AdminResourcesController;
use App\Http\Controllers\Admin\ParticipationController as AdminParticipationController;

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
    return Inertia::render('Home');
})->name('home');

Route::get('/aviso-legal', function () {
    return Inertia::render('Legal');
})->name('legals');
Route::get('/politica-de-privacidad', function () {
    return Inertia::render('Privacy');
})->name('privacy-policy');


Route::get('/contacto', [ContactController::class, 'index'])->name('contact');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
    // My account
    Route::get('/mi-cuenta', [ProfileController::class, 'index'])->name('profile');

    Route::get('/mis-datos', function () {
        return Inertia::render('Profile/MyAccount');
    })->name('my-account');

    Route::get('/salir', function () {
        return Inertia::render('Profile/Exit');
    })->name('exit');

    Route::get('/historico-puntos', [ScoreHistoryController::class, 'index'])
        ->name('points-history')
        ->middleware(['role:auxiliar|adjunto']);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/resources', AdminResourcesController::class)->except(['show']);
    Route::resource('/pharmacies', AdminPharmacyController::class)->except(['show']);

    Route::get('/challenges/toggleActive/{challenge_id}', [AdminChallengeController::class, 'toggleActive'])->name('challenges.toggle.active');
    Route::resource('/challenges', AdminChallengeController::class)->except(['show']);

    Route::get('/users/export', [ AdminUserController::class, 'export' ])->name('users.export');
    Route::get('/users/exportusersbypharmacy', [ AdminUserController::class, 'exportUsersByPharmacy' ])->name('users.exportusersbypharmacy');
    Route::resource('/users', AdminUserController::class)->only(['index', 'edit', 'update', 'destroy']);

    Route::get('/participation/export', [ AdminParticipationController::class, 'export' ])->name('participation.export');
    Route::get('/participation/approve/{id}/{approve}/{approved_score?}', [AdminParticipationController::class, 'approve'])->name('participation.approve');
    Route::resource('/participation', AdminParticipationController::class)->only(['index', 'show']);

    Route::get('/courses/toggleActive/{course_id}', [AdminCourseController::class, 'toggleActive'])->name('courses.toggle.active');
    Route::resource('/courses', AdminCourseController::class)->except(['show']);

    Route::get('/modules/toggleActive/{module_id}', [AdminModuleController::class, 'toggleActive'])->name('modules.toggle.active');
    Route::resource('/modules', AdminModuleController::class)->except(['show']);
    Route::get('/modules/{course_id}', [AdminModuleController::class, 'getModulesByCourse'])->name('modules.course.options');

    Route::get('/questions/toggleActive/{question_id}', [AdminQuestionController::class, 'toggleActive'])->name('questions.toggle.active');
    Route::resource('/questions', AdminQuestionController::class)->except(['show']);

    Route::post('/giftcards/import', [ AdminGiftCardController::class, 'import' ])->name('giftcards.import');
    Route::resource('/giftcards', AdminGiftCardController::class)->only(['index', 'create', 'destroy']);

    Route::get('/webinars/toggleActive/{course_id}', [ AdminWebinarController::class, 'toggleActive' ])->name('webinars.toggle.active');
    Route::resource('/webinars', AdminWebinarController::class)->except(['show']);
});

// Products
Route::get('/productos', function () {
    return Inertia::render('Products');
})->name('products');

Route::get('/productos/{category}/{product}', function ($category, $product) {
    return Inertia::render('Product', [
        'category' => $category,
        'product' => $product
    ]);
})->name('product');

Route::middleware('auth')->group(function () {
    // My account
    Route::get('/biblioteca-esteve', [ ResourcesController::class, 'index' ])->name('resources');

    // Formation
    Route::get('/formacion', [ CourseController::class, 'index' ])->name('courses.index');
    // Course
    Route::get('/curso/{id}', [ CourseController::class, 'show' ])->name('courses.show');

    // Module
    Route::get('/module/{id}', [ ModuleController::class, 'index' ])->name('module.index');
    Route::post('/module/{id}', [ ModuleController::class, 'store' ])->name('module.store');

    // Retos
    Route::get('/retos', [ChallengeController::class, 'index'])->name('sellout.index');
    Route::get('/retos/{challenge}', [ChallengeController::class, 'show'])->name('sellout.show');
    Route::post('/retos', [ChallengeController::class, 'store'])->name('sellout.store');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
});


Route::get('/confirmacion-registro', function () {
    return Inertia::render('RegisterConfirmation');
})->name('register-confirmation');

Route::get('/confirmacion-email', function () {
    return Inertia::render('EmailConfirmation');
})->name('email-confirmation');

Route::post('/link-email-confirmation', function () {
    return Inertia::render('EmailLinkConfirmation');
})->name('link-email-confirmation');

Route::get('/faqs', function () {
    return Inertia::render('Faqs');
})->name('faqs');

Route::get('/calendario', function () {
    return Inertia::render('Calendar');
})->name('calendar');

// Webinar
Route::get('/webinars', [ WebinarController::class, 'index' ])->name('webinar');

require __DIR__ . '/auth.php';
