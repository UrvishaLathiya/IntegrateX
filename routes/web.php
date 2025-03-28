<?php

use App\Http\Controllers\AddAdminController;
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


use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ShowProfessersController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BackupController;


use App\Http\Controllers\RecruiterLoginController;
use App\Http\Controllers\RecruiterRegisterController;
use App\Http\Controllers\RecruiterStudentOfficerController;
use App\Http\Controllers\RecruitmentController;

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

Route::get('/placement/notifications', [OfficerController::class, 'showNotifications'])->name('notifications');
Route::get('/placement/notifications/read/{id}', [OfficerController::class, 'markAsRead'])->name('markAsRead');
Route::get('/notifications/unread-count', [OfficerController::class, 'getUnreadCount'])->name('getUnreadCount');



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




//admin

Route::get('/admin', function () {
    return view('Admin.adminLogin');
})->name('adminLogin');


Route::get('/adminLogin', [AdminLoginController::class, 'showLogin'])->name('adminLogin');
Route::get('/adminIndex', [AdminLoginController::class, 'adminIndex'])->name('adminIndex');
Route::post('/adminLogin', [AdminLoginController::class, 'login']);
Route::get('/adminLogout', [AdminLoginController::class, 'logout'])->name('adminLogout');


Route::get('/addNew', [AddAdminController::class, 'showAddAdmin'])->name('admin.addNew');  
Route::post('/addNew', [AddAdminController::class, 'storeAdmin'])->name('admin.store');

Route::get('/placement-officers', [ShowProfessersController::class, 'showOfficers'])->name('showOfficers');
Route::post('/placement-officers', [ShowProfessersController::class, 'register'])->name('officers.add');
Route::get('/placement-officers/search', [ShowProfessersController::class, 'searchOfficers'])->name('officers.search');
Route::delete('/officers/{id}', [ShowProfessersController::class, 'deleteOfficer'])->name('officers.delete');


Route::get('/students', [StudentController::class, 'showStudents'])->name('students.show');
Route::post('/students/add', [StudentController::class, 'register'])->name('students.add');
Route::get('/students/search', [StudentController::class, 'searchStudents'])->name('students.search');
Route::get('/students/filter', [StudentController::class, 'filterStudents'])->name('students.filter');


Route::get('/admin/branches', [BranchController::class, 'showBranchesForAdmin'])->name('admin.branches.show');
Route::post('/admin/branches/add', [BranchController::class, 'store'])->name('admin.branches.add');



Route::get('/admin/logout', function () {
    session()->forget('admin'); // Remove the admin session
    return redirect()->route('adminLogin'); // Redirect to the login page
})->name('adminLogout');

Route::get('/admin/backup', [BackupController::class, 'downloadBackup'])->name('admin.backup');









//recruiter
Route::get('/recruiter', function () {
    return view('IndustryProfessionalModule.recruiterLogin');
})->name('recruiterLogin');

Route::get('/recruiter/login', [RecruiterLoginController::class, 'showLoginForm'])->name('recruiter.login');
Route::post('/recruiter/login', [RecruiterLoginController::class, 'login'])->name('recruiter.login.submit');
Route::post('/recruiter/logout', [RecruiterLoginController::class, 'logout'])->name('recruiter.logout');
Route::get('/recruiter/index', [RecruiterLoginController::class, 'indexPage'])->name('recruiter.index');

Route::get('/recruiter/register', [RecruiterRegisterController::class, 'showRegisterForm'])->name('recruiter.register');
Route::post('/recruiter/register', [RecruiterRegisterController::class, 'register'])->name('recruiter.register.submit');

// Route to show all placement officers
Route::get('/recruiter/officers', [RecruiterStudentOfficerController::class, 'showOfficers'])->name('recruiter.officers');

// Route to show all students
Route::get('/recruiter/students', [RecruiterStudentOfficerController::class, 'showStudents'])->name('recruiter.students');

Route::middleware(['auth:recruiter'])->group(function () {
    Route::post('/send-recruitment-alert', [RecruitmentController::class, 'sendRecruitmentAlert'])->name('send.recruitment.alert');
});
