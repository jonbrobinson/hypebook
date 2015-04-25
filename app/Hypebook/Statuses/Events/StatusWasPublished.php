<?php

namespace Hypebook\Statuses\Events;


class StatusWasPublished {

    public $body;

    function __construct($body)
    {
        $this->body = $body;
    }

}