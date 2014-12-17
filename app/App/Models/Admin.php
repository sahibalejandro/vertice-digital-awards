<?php namespace App\Models;

use Eloquent;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

class Admin extends Eloquent implements UserInterface
{
    use UserTrait;
}
