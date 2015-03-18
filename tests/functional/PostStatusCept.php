<?php


$I = new FunctionalTester($scenario);
$I->am('a Hypebook member');
$I->wantTo('perform actions and see result');


$I->amOnPage('statuses');

$I->postAStatus(['body' => 'My first post!']);

$I->seeInCurrentUrl('statuses');

$I->see('My first post!');