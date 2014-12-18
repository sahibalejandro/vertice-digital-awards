<?php namespace App\Controllers;

use App\Mail\UserMailer;
use App\Repositories\UsersRepository;
use Flash;
use Redirect;
use View;

class AdminNotifyDesertersController extends \BaseController
{

    /**
     * @var \App\Repositories\UsersRepository
     */
    private $usersRepository;
    /**
     * @var \App\Mail\UserMailer
     */
    private $userMailer;

    public function __construct(UsersRepository $usersRepository, UserMailer $userMailer)
    {

        $this->usersRepository = $usersRepository;
        $this->userMailer = $userMailer;
    }

    /**
     * Display a listing of the resource.
     * GET /adminnotifydeserters
     *
     * @return Response
     */
    public function index()
    {
        $deserters = $this->usersRepository->deserters();

        return View::make('admin.deserters.index')->withDeserters($deserters);
    }

    /**
     * Show the form for creating a new resource.
     * GET /adminnotifydeserters/create
     *
     * @return Response
     */
    public function store()
    {
        $users = $this->usersRepository->deserters();

        foreach ($users as $user)
        {
            $this->userMailer->sendDeserter($user);
        }

        Flash::message('Usuarios notificados');

        return Redirect::back();
    }

}
