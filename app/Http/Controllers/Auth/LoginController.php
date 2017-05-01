<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @var string
     * Redirects to given url
     */
    private $redirectTo = "home";

    /**
     * Login View
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('auth.login');
    }


    public function post(Request $request)
    {
        $this->validate($request, [
            'email' =>  'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt(['email' => $request['email'] , 'password' => $request['password']])) {
            return redirect()->back()->with(['Failure' => 'Invalid Credentials']);
        }
        return redirect()->route($this->redirectTo)->with('Success', 'Successfully Logged In');

    }
}
