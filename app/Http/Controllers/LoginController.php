<?php


    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;
    use App\Models\Student; // Import the Student model
    
    class LoginController extends Controller
    {
        // Show login form
        public function showLoginForm()
        {
            return view('login');
        }
    
        // Handle login logic
        public function login(Request $request)
        {
            $request->validate([
                'emailid' => 'required|email',
                'password' => 'required'
            ]);
    
            // Check credentials
           
            $student = Student::where('email', $request->emailid)->first();
    
            if ($student && password_verify($request->password, $student->password)) {
                // Store session data
                Session::put('student_id', $student->id);
                Session::put('emailid', $student->emailid);
    
                return redirect('/home')->with('success', 'Login successful!');
            }
    
            return back()->with('error', 'Invalid email or password');
        }
    
        // Logout function
        public function logout()
        {
            // Log the user out
            Session::flush(); // This clears all session data
            return redirect()->route('login')->with('success', 'Logged out successfully.');
        }
       
    }
    
