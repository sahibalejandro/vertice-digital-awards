<?php namespace App\Repositories;

use App\Models\Category;
use App\Support\Nominated;
use DB;
use Sahib\Elegan\Repositories\Repository;

/**
 * Class VotesRepository
 * @package App\Repositories
 */
class VotesRepository extends Repository
{
    /**
     * Model name.
     *
     * @var string
     */
    protected $model = 'App\Models\Vote';
    /**
     * @var
     */
    private $usersRepository;

    function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Create a new vote.
     *
     * @param integer $userId
     * @param integer $categoryId
     * @param integer $participantId
     *
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function vote($userId, $categoryId, $participantId)
    {
        $data = [
            'user_id'       => $userId,
            'category_id'   => $categoryId,
            'voted_user_id' => $participantId,
        ];

        return $this->create($data);
    }

    /**
     * Returns the nominees data of a category.
     *
     * @param \App\Models\Category $category
     * @param int                  $count
     *
     * @return array
     */
    public function nominees(Category $category, $count = 3)
    {
        $columns = [
            'voted_user_id',
            DB::raw('count(*) as votes'),
            DB::raw("{$category->id} as category_id")
        ];

        return $this->query()
            ->limit($count)
            ->orderBy(DB::raw(2), 'desc')
            ->whereCategoryId($category->id)
            ->groupBy('voted_user_id')
            ->get($columns);
    }
}
