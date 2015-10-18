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
     * Checks that the homepage is accesible
     */
    public function testHomesPageAccesible()
    {
        //@TODO: Implementation pending
    }

    /**
     * Checks that the top users link exist and redirects correctly to the users page
     */
    public function testUsersLinkExistAndIsValid()
    {
        //@TODO: Implementation pending
    }

    /**
     * Checks that top register link exist and redirects correctly to the register page
     */
    public function testRegisterLinkExistAndIsValid()
    {
        //@TODO: Implementation pending
    }

    /**
     * Checks that top sign-in link exist and redirects correctly to the sign-in page
     */
    public function testSignInLinkExistAndIsValid()
    {
        //@TODO: Implementation pending
    }

    /**
     * Checks that textbox to input the username (for availability check) does exist
     */
    public function testUsernameTextBoxExist()
    {
        //@TODO: Implementation pending
    }

    /**
     * Checks that the user is correctly redirected when he search for his username availability
     */
    public function testUsernameSearchTriggersToNewPage()
    {
        //@TODO: Implementation pending
    }

}
