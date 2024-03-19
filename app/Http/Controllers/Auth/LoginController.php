<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    }

    public function login()
    {
        if (request()->ajax()) {
            $field = filter_var(request()->username, FILTER_VALIDATE_EMAIL)
                ? 'email'
                : 'username';
            $user = User::where($field, request()->username)->first();
            if (! $user || ! Hash::check(request()->password, $user->password)) {
                return response()->json(['status' => "Validation-Errors", 'errors' => ['username' => ['These credentials do not match our records.']], 'html' => 'These credentials do not match our records.']);
            }
            $userStatuses = config('constants.user_status');
            $userStatusActiveIndex = config('constants.user_active');
            if ($user->status === $userStatuses[$userStatusActiveIndex]) {
                $rememberToken = (bool)request()->remember;
                Auth::login($user, $rememberToken);
                if (Auth::check()) {
//                    if (auth()->user()->tokens()->count() > 0) {
//                        auth()->user()->tokens()->delete();
//                    }
                    $user = auth()->user()->createToken('eallisto_v1');
                    $url = route('admin.dashboard');
                    return response()->json(['status' => "Success", 'html' => 'Congratulations! You have successfully logged in to your account.', 'url' => $url, 'token' => $user->plainTextToken]);
                }
            }
            return response()->json(['status' => "Validation-Errors", 'errors' => ['username' => ['Your account status is Inactive. Please contact admin']], 'html' => 'Your account status is Inactive. Please contact admin']);
        }
        abort('400', 'Bad Request');
    }


    public function logout(Request $request)
    {
        if (auth()->user()->tokens()->count() > 0) {
            auth()->user()->tokens()->delete();
        }
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }
}
