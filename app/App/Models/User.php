<?php namespace App\Models;

use App\Traits\ModelUuidTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Sahib\Elegan\Models\ModelWithImages;

/**
 * Class User
 * @package App\Models
 */
class User extends ModelWithImages implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, ModelUuidTrait;

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
	protected $fillable = ['username', 'photo', 'name'];

	/**
	 * Votes to other users.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function votes()
	{
		return $this->hasMany('App\Models\Vote');
	}

	/**
	 * Votes from other users to this user.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function votesToMe()
	{
		return $this->hasMany('App\Models\Vote', 'voted_user_id');
	}

	public function getEmailAttribute()
	{
		return "{$this->username}@verticecom.com";
	}
}
