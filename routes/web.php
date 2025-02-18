<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\StudentRegisterController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/home', function () {
    return view('home'); // Create a dashboard page after login
})->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/student-register', [StudentRegisterController::class, 'showRegistrationForm'])->name('student.register');
Route::post('/student-register', [StudentRegisterController::class, 'register'])->name('register');

// Home and other pages
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/resume', [PageController::class, 'resume'])->name('resume');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/github', [GitHubController::class, 'showRepos'])->name('github');
//Route::get('/myprofile', [GitHubController::class, 'myprofile'])->name('myprofile');
// Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// // Route to update the profile
// Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


// Default route redirects to login
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/home', function () {
    if (!session()->has('student_id')) {
        return redirect()->route('login.form')->with('error', 'Please login first');
    }
    return view('home');
})->name('home');
