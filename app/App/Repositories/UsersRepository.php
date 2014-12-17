<?php namespace App\Repositories;

use App\Traits\FindByUuidTrait;
use Sahib\Elegan\Repositories\Repository;

/**
 * Class UsersRepository
 * @package App\Repositories
 */
class UsersRepository extends Repository
{
    use FindByUuidTrait;

    /**
     * Model name.
     *
     * @var string
     */
    protected $model = 'App\Models\User';

    /**
     * Find a user by their username.
     *
     * @param string $username
     *
     * @return \App\Models\User|null
     */
    public function findByUsername($username)
    {
        return $this->query()->whereUsername($username)->first();
    }
}
