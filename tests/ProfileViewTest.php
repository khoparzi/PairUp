<?php

/*
 * Functional tests for viewing the profile page
 */
class ProfileViewTest extends PersistanceBasedTest
{
    /**
     * Checks that the username is suitably reflected in the page subheading
     */
    public function testProfileTitle()
    {
        $faker = Faker\Factory::create();
        $username = $faker->username;
        factory(App\Models\Profile::class, 'withAUser', 1)
            ->create(['username'=>$username]);
        $profile = DB::table('profiles')->first();
        $this->assertNotNull($profile->id);
        // Goto the profile browse page
        $this->visit(route('profile.show', ['name'=>$username]))
            ->see(trans('profile.title'));
    }

    /**
     * Checks that user information is reflected in the personal info section
     */
    public function testProfilePersonalInfo()
    {
        $faker = Faker\Factory::create();
        $username = $faker->username;
        factory(App\Models\Profile::class, 'withAUser', 1)
            ->create(['username'=>$username, 'country_id'=>4]);
        $profile = DB::table('profiles')->first();
        $this->assertNotNull($profile->id);
        // Goto the profile browse page
        $this->visit(route('profile.show', ['name'=>$username]))
            ->see('seeInElement', '.country', Models\Country::find(4)->full_name);
    }

    /**
     * Checks that an empty skills matrix renders correctly
     */
    public function testProfileEmptySkillsMatrix()
    {
        $faker = Faker\Factory::create();
        $username = $faker->username;
        factory(App\Models\Profile::class, 'withAUser', 1)
            ->create(['username'=>$username]);
        $this->visit(route('profile.show', ['name'=>$username]))
            ->see('seeInElement', '.skills', trans('profile.show.no_skills'));
    }

    /**
     * Checks that skills/stars/flags are correct
     *
     * (Have to decide an ordering here - probably alphabetical on skill name, case-insensitive)
     */
    public function testProfileNonEmptySkillsMatrix()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Checks that the message box sends an email
     *
     * (I believe Laravel has a feature for this, so an email is not actually sent)
     */
    public function testProfileSendEmail()
    {
        // @todo Finish this
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
