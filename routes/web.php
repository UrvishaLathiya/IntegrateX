<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Session;






use App\Http\Controllers\OfficerController;
use App\Http\Controllers\StudentMonitoringController;
use App\Http\Controllers\StudentPlacementController;
use App\Http\Controllers\PlacementSkillController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\OfficerProfileController;




Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);



Route::get('/student/logout', function () {
    Session::forget('student_logged_in');
    return redirect('/student/login');
})->name('student.logout');
Route::post('/student/logout', [LoginController::class, 'logout'])->name('student.logout');


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
Route::get('/student-profile', [ProfileController::class, 'edit'])->name('profile.edit');
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
    return view('select_login');
})->name('select_login');
Route::get('/home', function () {
    if (!session()->has('student_id')) {
        return redirect()->route('login.form')->with('error', 'Please login first');
    }
    return view('home');
})->name('home');



//Placement officer

// Registration Routes
Route::get('/officerregister', [OfficerController::class, 'showRegistrationForm'])->name('officerregister');
Route::post('/officerregister', [OfficerController::class, 'register'])->name('officerregister.post');

// Login Routes
Route::get('/officerlogin', [OfficerController::class, 'showLoginForm'])->name('officerlogin');
Route::post('/officerlogin', [OfficerController::class, 'login'])->name('officerlogin.post');
    
Route::get('/placement/logout', function () {
    Session::forget('placement_logged_in');
    return redirect('/placement/login');
})->name('placement.logout');
Route::post('/placement/logout', [OfficerController::class, 'logout'])->name('placement.logout');

// Dummy Dashboard Route (To test login session)
Route::get('/index', function () {
    if (!session()->has('officer_id')) {
        return redirect()->route('officerlogin')->with('error', 'Please log in first.');
    }
    return view('placementofficer.index'); // Create this blade file for a dashboard
})->name('index');

Route::get('/showskill', [StudentMonitoringController::class, 'index'])->name('placement.showskill');

Route::get('/student-placement', [StudentPlacementController::class, 'index'])->name('student.placement');
Route::get('/student/placement/download', [StudentPlacementController::class, 'downloadPDF'])->name('student.placement.download');

// ✅ Show skill management page
// ✅ Show all skills & sub-skills
Route::get('/assign-skill', [PlacementSkillController::class, 'index'])->name('placement.assign-skill');

// ✅ Store new skill
Route::post('/store-skill', [PlacementSkillController::class, 'storeSkill'])->name('placement.store-skill');

// ✅ Store new sub-skill
Route::post('/store-sub-skill', [PlacementSkillController::class, 'storeSubSkill'])->name('placement.store-sub-skill');

// ✅ Assign skill to student (if needed)
Route::post('/assign-skill', [PlacementSkillController::class, 'assignSkill'])->name('placement.assign-skill');


Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
Route::post('/branches/store', [BranchController::class, 'store'])->name('branches.store');

// Student Dashboard Route (Show branches)
Route::get('/student/dashboard', [PageController::class, 'index'])->name('student.dashboard');

// ✅ Show profile edit form (GET)
Route::get('/profile', [OfficerProfileController::class, 'edit'])->name('officer.profile.edit');

// ✅ Update profile (POST)
Route::post('/profile/update', [OfficerProfileController::class, 'update'])->name('officer.profile.update');