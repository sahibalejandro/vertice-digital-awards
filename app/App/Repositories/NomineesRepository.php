<?php namespace App\Repositories;

use DB;
use Sahib\Elegan\Repositories\Repository;

/**
 * Class NomineesRepository
 * @package App\Repositories
 */
class NomineesRepository extends Repository
{
    /**
     * Model name.
     *
     * @var string
     */
    protected $model = 'App\Models\Nominated';

    /**
     * Returns the nominees data of a category.
     *
     * @param int $categoryId
     * @param int $count
     *
     * @return array
     */
    public function categoryNominees($categoryId, $count = 3)
    {
        $columns = [
            'voted_user_id',
            DB::raw('count(*) as votes'),
            DB::raw("{$categoryId} as category_id")
        ];

        return $this->query()
            ->limit($count)
            ->orderBy(DB::raw(2), 'desc')
            ->whereCategoryId($categoryId)
            ->groupBy('voted_user_id')
            ->with('user')
            ->get($columns)
            ->shuffle();
    }
}
