<?php

$I = new FunctionalTester($scenario);
$I->am('a Hypebook member');
$I->wantTo('I want to view my profile');

$I->signIn();
$I->postAStatus('My new status.');

$I->click('Your Profile');

$I->seeCurrentUrlEquals('/@FooBar');

$I->see('My new status.');