<?php namespace App\Repositories;

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
        return $this->create([
            'user_id'        => $userId,
            'category_id'    => $categoryId,
            'participant_id' => $participantId,
        ]);
    }
}
