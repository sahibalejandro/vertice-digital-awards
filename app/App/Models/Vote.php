<?php namespace App\Models;

use Eloquent;

/**
 * Class Vote
 * @package App\Models
 */
class Vote extends Eloquent
{
    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'category_id', 'participant_id'];
}
