<?php namespace App\Models;

use App\Traits\ModelUuidTrait;
use Sahib\Elegan\Models\ModelWithImages;

/**
 * Class Participant
 * @package App\Models
 */
class Participant extends ModelWithImages
{
    use ModelUuidTrait;

    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = ['name', 'photo'];

    /**
     * Return the number of votes over this participant.
     *
     * @return mixed
     */
    public function getVotesAttribute()
    {
        return $this->votes()->count();
    }

    /**
     * Return votes over this participant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany('App\Models\Vote');
    }
}
