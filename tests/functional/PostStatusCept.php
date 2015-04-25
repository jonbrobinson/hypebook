<?php

$I = new FunctionalTester($scenario);
$I->am('a Hypebook member');
$I->wantTo('perform actions and see result');

$I->signIn();

$I->amOnPage('statuses');

$I->postAStatus('My first post!');

$I->seeInCurrentUrl('statuses');

$I->see('My first post!');