<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function forget_Password(Request $request)
    {
        return view('forget_password'); 
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function register_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'Phone' => 'required|unique:users',
            'Department' => 'required',
            'Position' => 'required',
            'Salary' => 'required|numeric|min:0',
            'Joining_Date' => 'required|date',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
    
        // Create a new user instance
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->Phone = $request->Phone;
        $user->department = $request->Department;
        $user->position = $request->Position;
        $user->salary = $request->Salary;
        $user->joining_date = $request->Joining_Date;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
    
        // Save the user to the database
        $user->save();
    
        return redirect('/')->with('success', 'Register Successfully');
    }
    
    public function checkemail(Request $request)     // Check if email exists
    {
        $email = $request->input('email');
        $isExists = User::where('email', $email)->exists();
        return response()->json(['exists' => $isExists]);
    }

    public function login_post(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            if(Auth::User()->is_role == '1'){
                return redirect()->intended('admin/Dashboard');
            }
            else{
                return redirect('/')->with('error', 'Invalid Account');  //if user is not admin
            }
           
        }
        else
        {
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }
    }
    
    //logout fn
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}


?>