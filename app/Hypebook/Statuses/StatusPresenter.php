<?php

namespace Hypebook\Statuses;

use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter {

    /**
     * Display how long its been
     * @return mixed
     */
    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }
}