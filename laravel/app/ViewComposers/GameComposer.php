<?php

namespace App\ViewComposers;

use Illuminate\View\View;

use App\Modules\Teammanagement\Facades\GameManager;

class GameComposer
{
    public $games;
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct(GameManager $gameManager)
    {
        $this->gameManager = $gameManager;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('games', $this->gameManager->getAll());
    }
}