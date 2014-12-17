<?php namespace App\Repositories;

use Sahib\Elegan\Repositories\Repository;

/**
 * Class UsersRepository
 * @package App\Repositories
 */
class UsersRepository extends Repository
{
    /**
     * Model name.
     *
     * @var string
     */
    protected $model = 'App\Models\User';

    /**
     * Find a user by their username, if not exists then a new
     * user is created.
     *
     * @param string $username
     *
     * @return \App\Models\User|static
     */
    public function findByUsernameOrCreate($username)
    {
        $user = $this->findByUsername($username);

        if ( ! $user)
        {
            $user = $this->create(['username' => $username]);
        }

        return $user;
    }

    /**
     * Find a user by their username.
     *
     * @param string $username
     *
     * @return \App\Models\User|null
     */
    private function findByUsername($username)
    {
        return $this->query()->whereUsername($username)->first();
    }
}
