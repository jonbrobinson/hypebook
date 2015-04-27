<?php

namespace Hypebook\Statuses;

use Hypebook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Status extends \Eloquent {

    use EventGenerator, PresentableTrait;

    /**
     * Fillable field for the body
     *
     * @var array
     */
    protected  $fillable = ['body'];

    /**
     * Path to presenter
     *
     * @var string
     */
    protected $presenter = 'Hypebook\Statuses\StatusPresenter';

    /**
     * A status belongs to a user
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('Hypebook\Users\User');
    }

    /**
     * Publish a new status
     *
     * @param $body
     * @return static
     */
    public static function publish($body)
    {
        $status = new static (compact('body'));

        $status->raise(new StatusWasPublished($body));

        return $status;
    }

}