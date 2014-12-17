<?php namespace App\Controllers;

use Flash;
use Redirect;
use Sahib\Elegan\Controllers\ResourceController;
use App\Repositories\UsersRepository;
use App\Validation\UserInputValidator;

class AdminUsersController extends ResourceController
{
    /**
     * Name of the variable which represents a single resource on views.
     *
     * @var string
     */
    protected $resource = 'user';

    /**
     * Name of the variable which represents a collection of resources on views.
     *
     * @var string
     */
    protected $resources = 'users';

    /**
     * Views prefix.
     *
     * @var string
     */
    protected $viewsPrefix = 'admin.users';

    /**
     * Routes prefix.
     *
     * @var string
     */
    protected $routesPrefix = 'admin.users';

    protected $files = true;

    /**
     * @param \App\Repositories\UsersRepository $repository;
     * @param \App\Validation\UserInputValidator $validator;
     */
    public function __construct(UsersRepository $repository, UserInputValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * @param \Eloquent $resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createdResourceResponse(\Eloquent $resource)
    {
        Flash::message("New user created!");

        return Redirect::route($this->routeName('index'));
    }

    /**
     * @param \Eloquent $resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function updatedResourceResponse(\Eloquent $resource)
    {
        Flash::message("The user was updated!");

        return Redirect::route($this->routeName('index'));
    }

    /**
     * @param \Eloquent $resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destroyedResourceResponse(\Eloquent $resource)
    {
        Flash::message("The user was destroyed!");

        return Redirect::route($this->routeName('index'));
    }
}
