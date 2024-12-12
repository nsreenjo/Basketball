<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // استيراد Request الصحيح
use App\Models\User; // تأكد من استيراد الموديل User
use Illuminate\Support\Facades\Auth; // استيراد Auth
use Illuminate\Support\Facades\Hash; // استيراد Hash

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // البحث عن المستخدم
        $user = User::where('email', $request->email)->first();

        // التحقق من كلمة المرور
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); // تسجيل الدخول
            return redirect($this->redirectTo); // إعادة التوجيه بعد تسجيل الدخول
        }

        // في حال كانت البيانات غير صحيحة
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
