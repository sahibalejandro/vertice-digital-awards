<?php namespace App\Controllers;

use App\Repositories\CategoriesRepository;
use App\Repositories\ParticipantsRepository;
use App\Repositories\VotesRepository;
use Auth;
use Flash;
use Illuminate\Support\Facades\Redirect;
use Input;
use View;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends \BaseController
{
    /**
     * @var \App\Repositories\CategoriesRepository
     */
    private $categoriesRepository;
    /**
     * @var \App\Repositories\ParticipantsRepository
     */
    private $participantsRepository;
    /**
     * @var \App\Repositories\VotesRepository
     */
    private $votesRepository;

    /**
     * @param \App\Repositories\CategoriesRepository   $categoriesRepository
     * @param \App\Repositories\ParticipantsRepository $participantsRepository
     * @param \App\Repositories\VotesRepository        $votesRepository
     */
    public function __construct(CategoriesRepository $categoriesRepository, ParticipantsRepository $participantsRepository, VotesRepository $votesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
        $this->participantsRepository = $participantsRepository;
        $this->votesRepository = $votesRepository;
    }

    /**
     * Show a category and all participants to vote.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = $this->categoriesRepository->availableCategoryForUser(Auth::user());

        if ( ! $category) return Redirect::route('home.thanks');

        $participants = $this->participantsRepository->all();

        return View::make('home.index')->with(compact('category', 'participants'));
    }

    /**
     * Store a user vote.
     *
     * @return \Illuminate\Http\Response
     */
    public function vote()
    {
        $participant = $this->participantsRepository->findByUuid(Input::get('participant_uuid'));
        $category = $this->categoriesRepository->findByUuid(Input::get('category_uuid'));

        $this->votesRepository->vote(Auth::id(), $category->id, $participant->id);

        Flash::success('Voto registrado.');

        return Redirect::home();
    }

    /**
     * Say thanks to voter.
     *
     * @return \Illuminate\View\View
     */
    public function thanks()
    {
        $participants = $this->participantsRepository->all();

        return View::make('home.thanks')->withParticipants($participants);
    }
}
