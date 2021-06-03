<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\IUser;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $userRepository;

    public function __construct(IUser $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function registerPost(Request $request)
    {
        $requiredData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:4',
            'confirmPassword' => 'required',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Name is required',
        	'password.required' => 'Password is required',
            'confirmPassword.required' => 'Confirm Password is required'
        ]);


        if (!empty($this->userRepository->findUserByEmail($requiredData['email'] ))) 
        {
            return redirect()->back()
                ->withErrors(['invalid' => 'This email has been taken.Try another one.'])
                ->withInput($request->only('email', 'name'));
        }
        elseif ($requiredData['password'] != $requiredData['confirmPassword']) 
        {
            return redirect()->back()
                ->withErrors(['invalid' => 'Password and Confirm Password should be same'])
                ->withInput($request->only('email', 'name'));
        }
        else 
        {
            $requiredData['password'] = bcrypt($requiredData['password']);

            $user = $this->userRepository->create($requiredData);

            Auth::login($user);
        
            return redirect()->route('login');
        }
        
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');
    	$remember = $request->input('remember');
        $user = $this->userRepository->findUserByEmail($credentials['email'] );

        if ($user->role == 'admin') 
        {
            if (Auth::attempt($credentials, $remember)) 
            {
                $request->session()->regenerate();
    
                return redirect()->route('dashboard');
             }
        }
        
        return redirect()->back()
        	->withErrors(['invalid' => 'This email or password is wrong.'])
        	->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
