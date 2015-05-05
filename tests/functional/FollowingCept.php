<?php 
$I = new FunctionalTester($scenario);

$I->am('a Hypebook user.');
$I->wantTo('follow other Hypebook users.');

$I->haveAnAccount('Hypebook\Users\User', ['username' => 'OtherUser']);
$I->signIn();

$I->click('Browse Users');
$I->click('OtherUser');

$I->seeCurrentUrlEquals('/@OtherUser');