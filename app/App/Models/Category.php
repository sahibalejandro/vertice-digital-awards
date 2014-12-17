<?php namespace App\Models;

use App\Traits\ModelUuidTrait;
use Sahib\Elegan\Models\ModelWithImages;

/**
 * Class Category
 * @package App\Models
 */
class Category extends ModelWithImages
{
    use ModelUuidTrait;

    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = ['name', 'image'];

}
