<?php namespace App\Controllers;

use App\Repositories\UsersRepository;
use Auth;
use Flash;
use Input;
use OAuth;
use OAuth\Common\Http\Exception\TokenResponseException;
use Redirect;
use View;

/**
 * Class LoginController
 * @package App\Controllers
 */
class LoginController extends \BaseController {

	/**
	 * @var \OAuth\Common\Service\AbstractService
     */
	protected $oauthService;

	/**
	 * @var \App\Repositories\UsersRepository
	 */
	private $usersRepository;

	/**
	 * @param \App\Repositories\UsersRepository $usersRepository
     */
	public function __construct(UsersRepository $usersRepository)
	{
		$this->usersRepository = $usersRepository;
		$this->oauthService = OAuth::consumer('Google', url('login/google'));
	}

	/**
	 * Show the view to login with one oauth service.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$oauthUrl = $this->oauthService->getAuthorizationUri();

		return View::make('login.create')->withOauthUrl($oauthUrl);
	}

	/**
	 * Handle the response from google oauth to login the user.
	 *
	 * @return \Illuminate\Http\RedirectResponse
     */
	public function google()
	{
		$code = Input::get('code');

		try
		{
			$token = $this->oauthService->requestAccessToken($code);

			$userInfo = json_decode($this->oauthService->request('https://www.googleapis.com/oauth2/v1/userinfo'));

			$this->loginUser($userInfo->email);

			return Redirect::home();
		} catch (TokenResponseException $e)
		{
			Flash::error('Hum... algo no funcionó, vuelve a intentarlo.');
			return Redirect::route('login');
		}
	}

	/**
	 * Login a user.
	 *
	 * @param string $username
	 *
	 * @return \App\Models\User|static
     */
    private function loginUser($username)
	{
		$user = $this->usersRepository->findByUsernameOrCreate($username);

		Auth::login($user);

		return $user;
	}

}
