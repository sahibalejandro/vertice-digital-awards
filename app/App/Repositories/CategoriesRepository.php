<?php namespace App\Repositories;

use App\Models\User;
use App\Traits\FindByUuidTrait;
use Sahib\Elegan\Repositories\Repository;

/**
 * Class CategoriesRepository
 * @package App\Repositories
 */
class CategoriesRepository extends Repository
{
    use FindByUuidTrait;

    /**
     * Model name.
     *
     * @var string
     */
    protected $model = 'App\Models\Category';

    /**
     * Get a category where a user has not voted yet.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function availableCategoryForUser(User $user)
    {
        $votedCategoryIds = $user->votes()->lists('category_id');

        if (empty($votedCategoryIds)) return $this->query()->first();

        return $this->query()->whereNotIn('id', $votedCategoryIds)->first();
    }
}
