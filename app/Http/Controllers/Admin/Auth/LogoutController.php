<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LogoutController extends Controller
{
    /**
     * Where to redirect users after login.
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct()
    {

    }
    /**
     * LoginController constructor.
     */

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
