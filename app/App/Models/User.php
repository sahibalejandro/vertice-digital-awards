<?php namespace App\Models;

use Eloquent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * Class User
 * @package App\Models
 */
class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * Fillable attributes.
	 *
	 * @var array
     */
	protected $fillable = ['username'];

	/**
	 * Get user votes.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function votes()
	{
		return $this->hasMany('App\Models\Vote');
	}
}
