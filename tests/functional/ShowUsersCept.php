<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');

$I->am('a Hypebook member');
$I->wantTo('list all users who are registered for Hypebook');

$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'Bar']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bar');



