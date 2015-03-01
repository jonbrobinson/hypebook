<?php
    $I = new FunctionalTester($scenario);
    $I->am('a guest');
    $I->wantTo('perform actions and see result');

    $I->amOnPage('/');
    $I->click('Sign Up!');
    $I->seeCurrentUrlEquals('/register');

    $I->fillField('Username:', 'JohnDoe');
    $I->fillField('Email:', 'john@example.com');
    $I->fillField('Password:', 'demo');
    $I->fillField('Password Confirmation:', 'demo');
    $I->click('Sign Up', 'input[type="submit"]');

    $I->seeCurrentUrlEquals('');
    $I->see('Welcome to Hypebook');
    $I->seeRecord('users', [
        'username' => 'JohnDoe',
        'email' => 'john@example.com'
    ]);

    $I->assertTrue(Auth::check());