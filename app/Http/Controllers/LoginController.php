<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
       
        return view('auth.login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
    
        if (!Auth::validate($credentials)) {
            $userByEmail = User::where('email', $credentials['email'])->first();
            $userByPassword = User::where('email', $credentials['email'])
                                  ->where('password', bcrypt($credentials['password']))
                                  ->first();
    
            if (!$userByEmail) {
                dd('البريد الإلكتروني غير مسجل.');
            } elseif (!$userByPassword) {
               
                dd('كلمة المرور غير صحيحة.');
            } else {
                dd('معلومات الدخول خاطئة.');
            }
    
            return redirect()->to('login')->withErrors(trans('auth.failed'));
        }
    
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
    
        Auth::login($user);
    
        return $this->authenticated($request, $user);
    }
    

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect('home');
    }
}