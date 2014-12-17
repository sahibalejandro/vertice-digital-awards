<?php namespace App\Traits;

use Rhumsaa\Uuid\Uuid;

/**
 * Class ModelUuidTrait
 * @package App\Traits
 */
trait ModelUuidTrait
{

    /**
     * Boot Model
     */
    public static function boot()
    {
        parent::boot();

        /**
         * Add UUID to model.
         */
        static::creating(function ($model)
        {
            $model->uuid = Uuid::uuid4();
        });
    }

}
