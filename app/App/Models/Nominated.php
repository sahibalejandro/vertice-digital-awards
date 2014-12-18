<?php namespace App\Models;

use Eloquent;

/**
 * Class Nominated
 * @package App\Models
 */
class Nominated extends Eloquent
{
    /**
     * @var string
     */
    protected $table = 'votes';

    /**
     * Relation with the nominated user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'voted_user_id');
    }
}
