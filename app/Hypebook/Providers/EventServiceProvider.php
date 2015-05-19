<?php
/**
 * Created by PhpStorm.
 * User: Jonbrobinson
 * Date: 5/18/15
 * Time: 11:50 PM
 */

namespace Hypebook\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    /**
     * Register Hypebook event Listeners
     */
    public function register()
    {
        $this->app['events']->listen('Hypebook.*', 'Hypebook\Handlers\EmailNotifier');
    }
}