<?php
/**
 * Created by PhpStorm.
 * User: Jonbrobinson
 * Date: 3/1/15
 * Time: 4:49 PM
 */

namespace Hypebook\Statuses;


class PublishStatusCommand {

    public $body;

    public $userId;

    function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId = $userId;
    }


}