<?php

namespace App\Http\Controllers;

//use App\Classes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private readonly Auth $auth,
    )
    {}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $result['error'] = '';
        return view('auth.login', $result);

    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('report');
        }

        return back()->withErrors([
            'email' => 'Пользователь не найден или неверные данные',
        ])->onlyInput('email');
    }
}
