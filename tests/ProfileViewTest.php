<?php

use App\Models\User;
use App\Models\Profile;
use App\Models\Tag;

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
        // Create a user with the username 'johndoe'
        $user = factory(User::class)->create(['username'=>'johndoe']);
        // Add a profile record to the user
        $profile = factory(Profile::class)->make(['country_id'=>4]);
        // Save the user
        $user->profile()->save($profile);
        // Goto the profile browse page
        $this->visit(route('profile.view', ['name'=>'johndoe']))
            ->see(trans('profile.title'));
    }

    /**
     * Checks that user information is reflected in the personal info section
     */
    public function testProfilePersonalInfo()
    {
        // Create a user with the username 'johndoe'
        $user = factory(User::class)->create(['username'=>'johndoe']);
        // Add a profile record to the user
        $profile = factory(Profile::class)->make(['country_id'=>4]);
        // Save the user
        $user->profile()->save($profile);
        // Goto the profile browse page
        $this->visit(route('profile.view', ['name'=>'johndoe']))
            ->see('seeInElement', '.country', Models\Country::find(4)->full_name);
    }

    /**
     * Checks that an empty skills matrix renders correctly
     */
    public function testProfileEmptySkillsMatrix()
    {
        factory(App\Models\Profile::class, 'withAUser', 1)->create();
        $user = DB::table('users')->first();
        $this->visit(route('profile.view', ['name'=>$user->username]))
            ->see('seeInElement', '.skills', trans('profile.show.no_skills'));
    }

    /**
     * Checks that skills/stars/flags are correct
     *
     * (Have to decide an ordering here - probably alphabetical on skill name, case-insensitive)
     */
    public function testProfileNonEmptySkillsMatrix()
    {
        $faker = Faker\Factory::create();
        factory(App\Models\Profile::class, 'withAUser', 1)->create();
        factory(App\Models\Tag::class, 3)->create();
        $profile = App\Models\Profile::first();

        foreach (App\Models\Tag::all() as $tag) {
            $rating = 6;
            $seeking = $faker->boolean;
            $offering = $faker->boolean;
            $profile->add_tag($tag, $rating, $seeking, $offering);
            $tags[] = [$tag->name, $rating, $seeking, $offering];
            $rating = $rating - 2;
        }

        $this->visit(route('profile.view', ['name'=>$profile->user->username]))
            ->see('seeInElement', '.rating:nth-child(1)', 6)
            ->see('seeInElement', '.rating:nth-child(2)', 4)
            ->see('seeInElement', '.rating:nth-child(3)', 2);
    }

    /**
     * Checks that the message box sends an email
     *
     * (I believe Laravel has a feature for this, so an email is not actually sent)
     */
    public function testProfileSendEmail()
    {
        $faker = Faker\Factory::create();
        factory(App\Models\Profile::class, 'withAUser', 1)->create();
        $user = App\Models\User::first();
        $message = $faker->sentences(3);
        $this->visit(route('profile.view', ['name'=>$user->username]))
            ->type($message, 'message_box')
            ->pressSubmit();
        $mock = \Mockery::mock($this->app['mailer']->getSwiftMailer());
        $this->app['mailer']->setSwiftMailer($mock);
        $mock
            ->shouldReceive('send')
            ->withArgs([\Mockery::on(function($message)
            {
                $this->assertEquals(trans('profile.message_subject', ['from' => Auth::user()->username]), $message->getSubject());
                $this->assertSame([$user->profile->email => null], $message->getTo());
                $this->assertContains(trans('profile.message_body'), $message->getBody());
                return true;
            }), \Mockery::any()])
            ->once();
    }
}
