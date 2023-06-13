<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function set_up()
    {
        parent::setUp();
        $this->artisan('passport:install');
    }
}
