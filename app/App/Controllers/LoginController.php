<?php namespace App\Controllers;

use App\Mail\UserMailer;
use App\Repositories\UsersRepository;
use Auth;
use Flash;
use Input;
use OAuth;
use Redirect;
use View;

/**
 * Class LoginController
 * @package App\Controllers
 */
class LoginController extends \BaseController
{

    /**
     * @var \OAuth\Common\Service\AbstractService
     */
    protected $oauthService;

    /**
     * @var \App\Repositories\UsersRepository
     */
    private $usersRepository;
    /**
     * @var \App\Mail\UserMailer
     */
    private $userMailer;

    /**
     * @param \App\Repositories\UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository, UserMailer $userMailer)
    {
        $this->usersRepository = $usersRepository;
        $this->userMailer = $userMailer;
    }

    /**
     * Show the view to login with one oauth service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('login.create');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $username = Input::get('username');

        $user = $this->usersRepository->findByUsername($username);

        if (!$user)
        {
            Flash::error("No encontramos a ningún participante con el correo {$username}@verticecom.com");

            return Redirect::back();
        }

        $this->userMailer->sendAccessLink($user);

        return Redirect::route('login.thanks');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function thanks()
    {
        return View::make('login.thanks');
    }

    /**
     * @param $uuid
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function attempt($uuid)
    {
        $user = $this->usersRepository->findByUuid($uuid);

        if (!$user) Redirect::route('login');

        Auth::user()->login($user, true);

        return Redirect::home();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Auth::user()->logout();

        return Redirect::home();
    }

}
