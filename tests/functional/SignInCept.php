<?php 
$I = new FunctionalTester($scenario);
$I->am('a Hypbook member');
$I->wantTo('login to my Hypebook account');

$I->signIn();

$I->seeInCurrentUrl('statuses');
$I->see('Welcome Back!');
$I->assertTrue(Auth::check());