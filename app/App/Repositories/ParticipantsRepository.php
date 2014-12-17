<?php namespace App\Repositories;

use App\Traits\FindByUuidTrait;
use Sahib\Elegan\Repositories\Repository;

class ParticipantsRepository extends Repository
{
    use FindByUuidTrait;

    /**
     * Model name.
     *
     * @var string
     */
    protected $model = 'App\Models\Participant';

    public function all(array $columns = ['*'])
    {
        $this->setUp(function ($query)
        {
            $query->orderBy('name');
        });

        return parent::all();
    }
}
