<?php namespace App\Controllers;

use Auth;
use Flash;
use Input;
use Redirect;
use View;

/**
 * Class AdminLoginController
 * @package App\Controllers
 */
class AdminLoginController extends \BaseController
{
    /**
     * Show login form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return View::make('admin.login.index');
    }

    /**
     * Login attempt.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $auth = Auth::admin()->attempt([
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        ]);

        if ( ! $auth)
        {
            Flash::error('Wrong values, try again!');
            return Redirect::route('admin.login.create');
        }

        return Redirect::route('admin.dashboard.index');
    }

    public function destroy()
    {
        Auth::admin()->logout();

        return Redirect::route('admin.login.create');
    }
}
