<?php

//use Illuminate\Testing\DatabaseTransactions;

/*
 * Functional tests for the profile browser screen
 */
abstract class PersistanceBasedTest extends TestCase
{
    // use DatabaseTransactions;

    /**
     * Default preparation for each test
     */
    public function setUp()
    {
        parent::setUp();

        $this->prepareForTests();
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
