<?php namespace App\Traits;

/**
 * Class FindByUuidTrait
 * @package App\Traits
 */
trait FindByUuidTrait
{

    /**
     * Find a resource by its UUID.
     *
     * @param string $uuid
     *
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function findByUuid($uuid)
    {
        return $this->query()->whereUuid($uuid)->first();
    }

}
