<?php

use App\Models\User;
use App\Models\Profile;

/*
 * Functional tests for the profile browser screen
 */
class ProfileBrowserTest extends TestCase
{
    /**
     * Default preparation for each test
     */
    public function setUp()
    {
        parent::setUp();

        $this->prepareForTests();
    }

    /**
     * Tests that a user's details are reflected correctly on a card in the browser
     */
    public function testSingleUserCard()
    {
        $user = factory(User::class)->create(['username'=>'johndoe']);
        $profile = factory(Profile::class)->make(['country_id'=>4]);
        $user->profile()->save($profile);
        $this->visit(route('profile.browse'))
            ->see('johndoe');
    }

    /**
     * Checks that the browser works fine with no users
     */
    public function testBrowserNoUsers()
    {
        $this->visit(route('profile.browse'))
            ->see(tran('profile.browse.nousers'));
    }

    /**
     * Checks that there is no pagination for a low number of users
     */
    public function testBrowserNoPagination()
    {
        factory(Profile::class, 'withAUser', 12)->create();
        $this->visit(route('profile.browse'))
            ->dontSee(tran('pagination.next'));
    }

    /**
     * Check that there is contiguous page numbers for a few screens of users
     */
    public function testBrowserContiguousPagination()
    {
        factory(Profile::class, 'withAUser', 36)->create();
        $this->visit(route('profile.browse'))
            ->see(tran('pagination.next'))
            ->seeInElement('pagination', '1, 2, 3');
    }

    /**
     * Checks that there are pagination number gaps for a large number of users
     */
    public function testBrowserGapsInPagination()
    {
        factory(Profile::class, 'withAUser', 144)->create();
        $this->visit(route('profile.browse'))
            ->see(tran('pagination.next'))
            ->seeInElement(
                'pagination',
                '1, 2, 3' . tran('pagination.gap') . '10, 11, 12');
    }

    /**
     * Checks that clicking on a page gets the right set of profiles
     */
    public function testPageNumbers()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Checks left pagination arrow appears when it should
     *
     * (It should be hidden for page 1 and not for other pages)
     */
    public function testLeftArrow()
    {
        factory(Profile::class, 'withAUser', 36)->create();
        $this->visit(route('profile.browse'))
            ->dontSeeInElement('pagination', tran('pagination.prev'));
        $this->visit(route('profile.browse', ['page'=>3]))
            ->seeInElement('pagination', tran('pagination.prev'));
    }

    /**
     * Checks right pagination arrow appears when it should
     *
     * (It should be hidden for the last page and not for other pages)
     */
    public function testRightArrow()
    {
        factory(Profile::class, 'withAUser', 36)->create();
        $this->visit(route('profile.browse'))
            ->seeInElement('pagination', tran('pagination.next'));
        $this->visit(route('profile.browse', ['page'=>3]))
            ->dontSeeInElement('pagination', tran('pagination.next'));
    }

    /**
     * Migrates the database and set the mailer to 'pretend'.
     * This will cause the tests to run quickly.
     */
    private function prepareForTests()
    {
        Artisan::call('migrate:refresh');
        $this->seed('CountriesSeeder');
    }
}
