<?php namespace App\Controllers;

use Flash;
use Redirect;
use Sahib\Elegan\Controllers\ResourceController;
use App\Repositories\CategoriesRepository;
use App\Validation\CategoryInputValidator;

class AdminCategoriesController extends ResourceController
{
    /**
     * Name of the variable which represents a single resource on views.
     *
     * @var string
     */
    protected $resource = 'category';

    /**
     * Name of the variable which represents a collection of resources on views.
     *
     * @var string
     */
    protected $resources = 'categories';

    /**
     * Views prefix.
     *
     * @var string
     */
    protected $viewsPrefix = 'admin.categories';

    /**
     * Routes prefix.
     *
     * @var string
     */
    protected $routesPrefix = 'admin.categories';

    protected $files = true;

    /**
     * @param \App\Repositories\CategoriesRepository $repository;
     * @param \App\Validation\CategoryInputValidator $validator;
     */
    public function __construct(CategoriesRepository $repository, CategoryInputValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Show categories list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->setUp(function ($query)
        {
            $query->orderBy('name');
        });

        return parent::index();
    }

    /**
     * @param \Eloquent $resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createdResourceResponse(\Eloquent $resource)
    {
        Flash::message("New category created!");

        return Redirect::route($this->routeName('index'));
    }

    /**
     * @param \Eloquent $resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function updatedResourceResponse(\Eloquent $resource)
    {
        Flash::message("The category was updated!");

        return Redirect::route($this->routeName('index'));
    }

    /**
     * @param \Eloquent $resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destroyedResourceResponse(\Eloquent $resource)
    {
        Flash::message("The category was destroyed!");

        return Redirect::route($this->routeName('index'));
    }
}
