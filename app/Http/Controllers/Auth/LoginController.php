<?php

namespace App\Http\Controllers\Auth;

use App\models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }
    //custom loging
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {

            if (auth()->user()->employee_id == 0) {
                return redirect()->route('employees');
            } else if (auth()->user()->employee_id != 0) {
                $employee =   Employee::where('id', auth()->user()->employee_id)->first();
                if ($employee->type == 'Full time') {
                    return redirect()->route('profile', $employee->id);
                } else if ($employee->type == 'Casual') {
                    return redirect()->route('casual.profile', $employee->id);
                }
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Username And Password Are Wrong.');
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
