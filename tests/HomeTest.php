<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class HomeTest, test related to the homepage of the app.
 */
class HomeTest extends TestCase
{
    /**
     * Checks that the homepage is accessible
     */
    public function testHomesPageAccessible()
    {
        $this
            ->visit(route('public.welcome'))
            ->seePageIs(route('public.welcome'))
            ->see(trans("public.words.welcome"));
    }

    /**
     * Checks that the top users link exist and redirects correctly to the users page
     */
    public function testUsersLinkExistAndIsValid()
    {
        $this
            ->visit(route('public.welcome'))
            ->seePageIs(route('public.welcome'))
            ->see(trans("public.links.login"))
            ->press(trans("public.links.login"))
            ->seePageIs(route('public.user.list'));
    }

    /**
     * Checks that top register link exist and redirects correctly to the register page
     */
    public function testRegisterLinkExistAndIsValid()
    {
        $this
            ->visit(route('public.welcome'))
            ->seePageIs(route('public.welcome'))
            ->see(trans("public.links.register"))
            ->press(trans("public.links.register"))
            ->seePageIs(route('public.user.register'));
    }

    /**
     * Checks that top sign-in link exist and redirects correctly to the sign-in page
     */
    public function testSignInLinkExistAndIsValid()
    {
        $this
            ->visit(route('public.welcome'))
            ->seePageIs(route('public.welcome'))
            ->see(trans("public.links.login"))
            ->press(trans("public.links.login"))
            ->seePageIs(route('public.user.login'));
    }

    /**
     * Checks that textbox to input the username (for availability check) does exist and also the trigger button
     */
    public function testUsernameTextBoxExist()
    {
        $this
            ->visit(route('public.welcome'))
            ->seePageIs(route('public.welcome'))
            ->see(trans("public.words.usernameStartingInputBox"))
            ->see("usernameInputBox")
            ->see("usernameSearchButton");
    }

    /**
     * Checks that the user is correctly redirected when he search for his username availability
     */
    public function testUsernameSearchTriggersToNewPage()
    {
        $this
            ->visit(route('public.welcome'))
            ->seePageIs(route('public.welcome'))
            ->type("usernameInTheDatabase", "usernameInputBox")
            ->press("searchUsernameButton");
    }

}
