<?php namespace App\Models;

use App\Repositories\NomineesRepository;
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

    /**
     * Return the nominated users on this category.
     *
     * @return array(\App\Models\Nominated)
     */
    public function nominees()
    {
        return with(new NomineesRepository())->categoryNominees($this->id);
    }

}
