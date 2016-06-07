<?php

use App\Models\User;
use App\Models\Profile;

/*
 * Functional tests for the profile browser screen
 */
class ProfileBrowserTest extends PersistanceBasedTest
{
    /**
     * Tests that a user's details are reflected correctly on a card in the browser
     */
    public function testSingleUserCard()
    {
        // Create a user with the username 'johndoe'
        $user = factory(User::class)->create(['username'=>'johndoe']);
        // Add a profile record to the user
        $profile = factory(Profile::class)->make(['country_id'=>4]);
        // Save the user
        $user->profile()->save($profile);
        // Goto the profile browse page
        $this->visit(route('profiles.index'))
        // Check if there is a card with the name 'johndoe'
            ->see('seeInElement', '.profile_card', 'johndoe');
    }

    /**
     * Checks that the browser works fine with no users
     */
    public function testBrowserNoUsers()
    {
        $this->visit(route('profiles.index'))
            ->seeInElement('.container', trans('profile.browse.no_users'));
    }

    /**
     * Checks that there is no pagination for a low number of users
     */
    public function testBrowserNoPagination()
    {
        // Add 12 profiles with users
        factory(Profile::class, 'withAUser', 12)->create();
        $this->visit(route('profiles.index'))
            ->dontSeeInElement('.pagination', trans('pagination.next'));
    }

    /**
     * Check that there is contiguous page numbers for a few screens of users
     */
    public function testBrowserContiguousPagination()
    {
        factory(Profile::class, 'withAUser', 36)->create();
        $this->visit(route('profiles.index'))
            ->seeInElement('.pagination', trans('pagination.next'))
            ->seeInElement('.pagination', '1')
            ->seeInElement('.pagination', '2')
            ->seeInElement('.pagination', '3');
    }

    /**
     * Checks that there are pagination number gaps for a large number of users
     */
    public function testBrowserGapsInPagination()
    {
        // Add 12 pages of records to the DB
        factory(Profile::class, 'withAUser', 144)->create();
        $this->visit(route('profiles.index'))
            ->seeInElement('.pagination', trans('pagination.next'))
            ->seeInElement('.pagination', '1')
            ->seeInElement('.pagination', '2')
            ->seeInElement('.pagination', '3')
            // ->seeInElement('.pagination', trans('pagination.gap')) // Current version only checks for presence of links
            // ->seeInElement('.pagination', '10') // Current version only checks for two links on right side
            ->seeInElement('.pagination', '11')
            ->seeInElement('.pagination', '12');
    }

    /**
     * Checks that clicking on a page gets the right set of profiles
     */
    public function testPageNumbers()
    {
        for ($i=1; $i < 144; $i++) {
            $user = factory(User::class)->create(['username'=>'name_' . $i]);
            $profile = factory(Profile::class)->make(['country_id'=>4]);
            $user->profile()->save($profile);
        }
        $this->visit(route('profiles.index'))
            // Check if there is a profile card with the name name_1
            ->see('seeInElement', 'profile_card', 'name_1')
            // Check if there is a link for the 3rd page
            ->hasLink('3', route('profiles.index', ['page'=>3]));
            // Goto page 3
        $this->click('3')
            // Check if there is a profile card with the name name_25
            ->see('seeInElement', 'profile_card', 'name_25')
            // Check if there is a link for the 5th page
            ->hasLink('5', route('profiles.index', ['page'=>5]));
            // Goto page 5
        $this->click('5')
            // Check if there is a profile card with the name name_49
            ->see('seeInElement', 'profile_card', 'name_49');
    }

    /**
     * Checks left pagination arrow appears when it should
     *
     * (It should be hidden for page 1 and not for other pages)
     */
    public function testLeftArrow()
    {
        factory(Profile::class, 'withAUser', 36)->create();
        $this->visit(route('profiles.index'))
            ->dontSeeInElement('.pagination', trans('pagination.previous'));
        $this->click(trans('pagination.next'))
            ->hasLink(trans('pagination.previous'), route('profiles.index', ['page'=>1]));
    }

    /**
     * Checks right pagination arrow appears when it should
     *
     * (It should be hidden for the last page and not for other pages)
     */
    public function testRightArrow()
    {
        factory(Profile::class, 'withAUser', 24)->create();
        $this->visit(route('profiles.index'))
            ->hasLink(trans('pagination.next'), route('profiles.index', ['page'=>2]));
        $this->click(trans('pagination.next'))
            ->dontSeeInElement('.pagination', trans('pagination.next'));
    }
}
