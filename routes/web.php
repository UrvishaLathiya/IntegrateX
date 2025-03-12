<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/home', function () {
    return view('home'); // Create a dashboard page after login
})->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Home and other pages
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/resume', [PageController::class, 'resume'])->name('resume');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/github', [GitHubController::class, 'showRepos'])->name('github');


// // Route to update the profile
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

// Set student ID manually for now (temporary login simulation)
Route::get('/set-student/{id}', function ($id) {
    session(['student_id' => $id]); // Store student ID in session
    return redirect()->route('skills')->with('success', 'Student set successfully!');
});

Route::get('/skill', [SkillController::class, 'index'])->name('skills');
Route::post('/skills/save', [SkillController::class, 'save'])->name('skills.save');

// Show all projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

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
