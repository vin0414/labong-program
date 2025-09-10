<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function login(){
        return view('login');
    }

    public function auth(Request $request){
        $UserModel = new \App\Models\User();
        $request->validate([
            'email' => 'required|email:rfc,dns|exists:users,email',
            'password' => 'required|min:8|max:255|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $user = $UserModel->where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            // Authentication passed
            $request->session()->put('user', $user);
            return redirect('/')->with('success', 'Login successful');
        } else {
            // Authentication failed
            return redirect('/login')->with('error', 'Invalid email or password');
        }
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('/login')->with('success', 'Logout successful');
    }

    //save project
    public function saveProject(Request $request){
        $projectModel = new \App\Models\projectModel();
        // Validate the incoming request data
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'category' => 'required|string',
            'budget_source' => 'required|string|max:255',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'budget_amount' => 'required|numeric|min:0',
            'implementation_date' => 'required|date',
            'description' => 'required|string',
        ]);

        // Assign validated data to the model
        $projectModel->name = $validatedData['project_name'];
        $projectModel->category = $validatedData['category'];
        $projectModel->budget_source = $validatedData['budget_source'];
        $projectModel->first_name = $validatedData['first_name'];
        $projectModel->last_name = $validatedData['last_name'];
        $projectModel->budget_amount = $validatedData['budget_amount'];
        $projectModel->amount_spent = 0; // Default amount spent
        $projectModel->implementation_date = $validatedData['implementation_date'];
        $projectModel->description = $validatedData['description'];
        $projectModel->status = 0; // Default status
        $projectModel->created_by = $request->session()->get('user')->id;
        $projectModel->save();

        return redirect('/')->with('success','Great! Successfully submitted');
    }
}
