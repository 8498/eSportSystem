<?php

namespace App\ViewComposers;

use Illuminate\View\View;

use App\Modules\Teammanagement\Facades\TeamManager;

class TeamComposer
{
    public $teams;
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct(TeamManager $teamManager)
    {
        $this->teamManager = $teamManager;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('teams', $this->teamManager->getAll());
    }
}