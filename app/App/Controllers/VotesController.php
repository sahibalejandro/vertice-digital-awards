<?php namespace App\Controllers;

use Flash;
use Redirect;
use Sahib\Elegan\Controllers\ResourceController;
use App\Repositories\VotesRepository;
use App\Validation\VoteInputValidator;

class VotesController extends ResourceController
{
    /**
     * Name of the variable which represents a single resource on views.
     *
     * @var string
     */
    protected $resource = 'vote';

    /**
     * Name of the variable which represents a collection of resources on views.
     *
     * @var string
     */
    protected $resources = 'votes';

    /**
     * Views prefix.
     *
     * @var string
     */
    protected $viewsPrefix = 'votes';

    /**
     * Routes prefix.
     *
     * @var string
     */
    protected $routesPrefix = 'votes';

    /**
     * @param \App\Repositories\VotesRepository $repository;
     * @param \App\Validation\VoteInputValidator $validator;
     */
    public function __construct(VotesRepository $repository, VoteInputValidator $validator)
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
        Flash::message("New vote created!");

        return Redirect::route($this->routeName('index'));
    }

    /**
     * @param \Eloquent $resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function updatedResourceResponse(\Eloquent $resource)
    {
        Flash::message("The vote was updated!");

        return Redirect::route($this->routeName('index'));
    }

    /**
     * @param \Eloquent $resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destroyedResourceResponse(\Eloquent $resource)
    {
        Flash::message("The vote was destroyed!");

        return Redirect::route($this->routeName('index'));
    }
}
