<?php

//use Illuminate\Testing\DatabaseTransactions;

/*
 * Extensible Test case for db based tests that sets up, migrates and seeds db before each test
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
