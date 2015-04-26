<?php


use Hypebook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected function _before()
    {
        $this->repo = new StatusRepository();
    }

    protected function _after()
    {
    }

    /**
     * @test
     */
    public function it_gets_all_statuses_for_a_user()
    {
        //give I have two users

        $users = TestDummy::times(2)->create('Hypebook\Users\User');

        //and statuses for both of them

        TestDummy::times(2)->create('Hypebook\Statuses\Status', [
            'user_id' => $users[0]->id,
            'body' => 'My status'
        ]);

        TestDummy::times(2)->create('Hypebook\Statuses\Status', [
            'user_id' => $users[1]->id,
            'body' => 'His status'
        ]);

        //when i fetch statuses for one user

        $statusesForUser = $this->repo->getAllForUser($users[0]);

        //then I should receive only the relevant ones

        $this->assertCount(2, $statusesForUser);
        $this->assertEquals('My status', $statusesForUser[0]->body);
        $this->assertEquals('My status', $statusesForUser[1]->body);

    }

    /**
     * @test
     */
    public function it_saves_status_for_a_user()
    {
        //given I have an unsaved status
        $status = TestDummy::create('Hypebook\Statuses\Status', [
            'user_id' => null,
            'body' => 'My status'
        ]);
        //And an existing user

        $user = TestDummy::create('Hypebook\Users\User');

        //When I try to persist this status
        $savedStatus = $this->repo->save($status, $user->id);

        // Then it should be saved
        $this->tester->seeRecord('statuses', [
            'body' => 'My status'
        ]);

        // An the status should have the correct user_id
        $this->assertEquals($user->id, $savedStatus->user_id);
    }
}