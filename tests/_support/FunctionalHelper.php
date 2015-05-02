<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{
    /**
     * @throws \Codeception\Exception\Module
     */
    public function signIn()
    {
        $email = 'foo@example.com';
        $username = 'FooBar';
        $password = 'foo';

        $this->haveAnAccount(compact('email', 'username','password'));

        $I = $this->getModule('Laravel4');

        $I->amOnPage('/login');
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->click('Sign In');
    }

    public function postAStatus($body)
    {
        $I = $this->getModule('Laravel4');

        $I->fillField('body', $body);

        $I->click('Post Status');
//        $this->have('Hypebook\Statuses\Status', $overrides);
    }

    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);

    }


    /**
     * @param array $overrides
     * @return mixed
     */
    public function haveAnAccount($overrides = [])
    {
        return $this->have('Hypebook\Users\User', $overrides);
    }
}
