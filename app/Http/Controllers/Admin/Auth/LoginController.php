<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin.guest');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLogin()
    {
        return view('admin.login');
    }
    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $array = $request->all();

        $user = User::where('email',$array['email'])->first();
        if ($user && $user->role != 'admin'){
            return redirect('/')
                ->withErrors(['email' =>  'You have not admin access.']);
        }


        $validator = Validator::make($request->all(), [
            "email" => 'required|email',]);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }


        $remember = $request->has('remember');

        if (Auth::guard('admin')->attempt(
            [
                'email' => $array['email'],
                'password' => $array['password'],
            ], $remember)) {

          return redirect()->intended($this->redirectTo);
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'These credentials do not match our records.']);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

}
