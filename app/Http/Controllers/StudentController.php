<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function login(){
        return view('frontend.login');
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }
    public function register(){
        return view('backend.register');
    }
    public function about(){
        return view('frontend.about');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function faq(){
        return view('frontend.faq');
    }
    public function courses(){
        return view('frontend.courses');
    }

    

    public function adminregister(Request $request){

        $formfields = $request->validate([
            'name' => 'required|max:15',
            'username' => 'required|min:5|max:12|unique:admins,username',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed|min:6|max:12'
        ]);
        $formfields['password'] = bcrypt($formfields['password']);
        $formfields['email_verified_at'] = Carbon::now();
        $formfields['created_at'] = Carbon::now();
        $formfields['updated_at'] = Carbon::now();

        $admin = Admin::create($formfields);
        Auth::guard('admin')->login($admin);
    
        return redirect('/dashboard')->with('success', 'Registration successful! You are now logged in.');
    }

    public function adminlogin(Request $request){

        $formfields = $request->validate([
            'username' => 'required|min:5|max:12',
            'password' => 'required|min:6|max:12',
        ]);

        if (Auth::guard('admin')->attempt(['username' => $formfields['username'], 'password' => $formfields['password']])) {

            $request->session()->regenerate();

            return redirect('dashboard')->with('success', 'You are now logged in');
        }
        return back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    public function __construct()
    {
        $this->middleware('auth:admin')->except([
            'login', 'adminlogin', 'register', 'adminregister', 'about', 'contact', 'faq', 'courses'
        ]);
    }
    


    public function dashboard() {
        $admin = Auth::guard('admin')->user();
        $students = Student::latest()->take(5)->get();
        $courses = Course::latest()->take(5)->get();
        $studentCount = Student::count();
        $courseCount = Course::count();
        $adminCount = Admin::count();
        $visitCount = DB::table('visits')->count();
    
        return view('backend.dashboard', compact('studentCount', 'courseCount', 'adminCount', 'visitCount', 'students', 'courses'), ['admin' => $admin]);
    }
    

    public function addcourse(){
        $admin = Auth::guard('admin')->user();
        return view('backend.addcourse', ['admin' => $admin]);
    }

    public function addadmin(){
        $admin = Auth::guard('admin')->user();
        return view('backend.addadmin', ['admin' => $admin]);
    }

    public function addstudent(){
        $admin = Auth::guard('admin')->user();
        $courses = Course::all();
        return view('backend.addstudent', compact('courses'), ['admin' => $admin]);
    }

    public function addcourselink(Request $request){

        $formfields = $request->validate([
            'coursename' => 'required|unique:courses,coursename', 
            'coursecode' => 'required|unique:courses,coursecode',
            'credits' => 'required', 
            'duration' => 'required',
            'description' => 'required',
        ]);
        $formfields['created_at'] = Carbon::now();
        $formfields['updated_at'] = Carbon::now();
        Course::create($formfields);
    
        return redirect('/viewcourses')->with('success', 'Course Added successfully!');
    }

    public function addadminlink(Request $request){

        $formfields = $request->validate([
            'name' => 'required|max:15',
            'username' => 'required|min:5|max:12|unique:admins,username',
            'email' => 'required|email|unique:admins,email', 
            'password' => 'required|confirmed|min:6|max:12'
        ]);
        $formfields['password'] = bcrypt($formfields['password']);
        $formfields['email_verified_at'] = Carbon::now();
        $formfields['created_at'] = Carbon::now();
        $formfields['updated_at'] = Carbon::now();
        Admin::create($formfields);
    
        return redirect('/viewadmins')->with('success', 'Admin Registration successful'.' ' . 'Details are: '. 'Username: '. $formfields['username']);
    }

    public function addstudentlink(Request $request)
    {
        $formfields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required', 
            'email' => 'required|email|unique:students,email',
            'phonenumber' => 'required|unique:students,phonenumber',
            'student_id' => 'required|unique:students,student_id',
            'courses' => 'required|array',
            'courses.*' => 'exists:courses,id',
        ]);

        $student = new Student([
            'firstname' => $formfields['firstname'],
            'lastname' => $formfields['lastname'],
            'email' => $formfields['email'],
            'phonenumber' => $formfields['phonenumber'],
            'student_id' => $formfields['student_id'],
            'description' => $request->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $student->save();

        $student->courses()->attach($formfields['courses']);

        return redirect('/viewstudents')->with('success', 'Student added and courses assigned successfully!');
    }

    public function viewcourses(){
        $admin = Auth::guard('admin')->user();
        $courses = Course::all();
        return view('backend.viewcourses', compact('courses'), ['admin' => $admin]);
    }

    public function viewadmins(){
        $admin = Auth::guard('admin')->user();
        $otheradmins = Admin::all();
        return view('backend.viewadmins', compact('otheradmins'), ['admin' => $admin]);
    }

    public function viewstudents(){
        $admin = Auth::guard('admin')->user();
        $students = Student::all();
        return view('backend.viewstudents', compact('students'), ['admin' => $admin]);
    }


    public function viewstudentdetails($id)
    {
        $admin = Auth::guard('admin')->user();
        $student = Student::with('courses')->findOrFail($id);
        return view('backend.viewstudentdetails', compact('student'), ['admin' => $admin]);
    }

    public function viewadminprofile($id)
    {
        $admin = Auth::guard('admin')->user();
        $admin = Admin::findOrFail($id);
        return view('backend.viewadminprofile', compact('admin'), ['admin' => $admin]);
    }

    public function editcourse($id)
    {
        $admin = Auth::guard('admin')->user();
        $course = Course::findOrFail($id);
        return view('backend.editcourse', compact('course'), ['admin' => $admin]);
    }

    public function editadmin($id)
    {
        $admin = Auth::guard('admin')->user();
        $admin = Admin::findOrFail($id);
        return view('backend.editadmin', compact('admin'), ['admin' => $admin]);
    }

    public function editprofile($id)
    {
        $admin = Auth::guard('admin')->user();
        $admin = Admin::findOrFail($id);
        return view('backend.editprofile', compact('admin'), ['admin' => $admin]);
    }
    

    public function editstudent($id)
    {
        $admin = Auth::guard('admin')->user();
        $student = Student::with('courses')->findOrFail($id);
        $courses = Course::all();
        return view('backend.editstudent', compact('student', 'courses', 'admin'), ['admin' => $admin]);
    }

    public function updatecourse(Request $request, $id)
    {
        $admin = Auth::guard('admin')->user();

        $course = Course::findOrFail($id);

        $validatedData = $request->validate([
            'coursename' => 'required|string|max:255|unique:courses,coursename', 
            'coursecode' => 'required|string|max:255|unique:courses,coursecode', 
            'credits' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'description' => 'required|string|max:2555',
        ]);

        $validatedData['updated_at'] = Carbon::now();
        $course->fill($validatedData);
        $course->save();

        return redirect()->route('viewcourses')->with('success', 'Course updated successfully' , ['admin' => $admin]);
    }


    public function updatestudent(Request $request, $id)
    {
        $admin = Auth::guard('admin')->user();
        $student = Student::findOrFail($id);

        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255', Rule::unique('students')->ignore($student->id),
            'phonenumber' => 'required|string|max:255', Rule::unique('students')->ignore($student->id),
            'student_id' => 'required|string|max:255', Rule::unique('students')->ignore($student->id),
            'courses' => 'required|array',
            'courses.*' => 'exists:courses,id',
        ]);

        $student->update($validatedData);
        $student->courses()->sync($request->courses);

        return redirect()->route('viewstudents')->with('success', 'Student updated successfully', ['admin' => $admin]);
    }

    public function updateprofile(Request $request, $id)
    {
        $admin = Auth::guard('admin')->user();

        $admin = Admin::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:15',
            'username' => 'required|min:5|max:12|unique:admins,username',
            'email' => 'required|email|unique:admins,email',
        ]);

        $formfields['email_verified_at'] = Carbon::now();
        $validatedData['updated_at'] = Carbon::now();
        $admin->fill($validatedData);
        $admin->save();

        return redirect()->route('viewadminprofile', $admin->id)->with('success', 'Profile updated successfully', ['admin' => $admin]);
    }

    public function updateadmin(Request $request, $id)
    {
        $admin = Auth::guard('admin')->user();

        $admin = Admin::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:15',
            'username' => 'required|min:5|max:12', Rule::unique('admins', 'username'),
            'email' => 'required|email', Rule::unique('admins', 'email'),
        ]);

        $formfields['email_verified_at'] = Carbon::now();
        $validatedData['updated_at'] = Carbon::now();
        $admin->fill($validatedData);
        $admin->save();

        return redirect()->route('viewadmins', $admin->id)->with('success', 'Admin updated successfully', ['admin' => $admin]);
    }

    public function destroycourse($id)
    {
        $admin = Auth::guard('admin')->user();
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('viewcourses')->with('delete', 'Course deleted successfully' , ['admin' => $admin]);
    }

    public function destroyadmin($id)
    {
        $admin = Auth::guard('admin')->user();
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('viewadmins')->with('delete', 'Admin deleted successfully' , ['admin' => $admin]);
    }

    public function destroystudent($id)
    {
        $admin = Auth::guard('admin')->user();
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('viewstudents')->with('delete', 'Student deleted successfully', ['admin' => $admin]);
    }

}
