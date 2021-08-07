<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    public function setUp() : void
    {
        parent::setUp();
        $this->loginWithFakeUser();
    }

    protected function loginWithFakeUser()
    {
        $user = new User([
            'id' => '1b0b10da-f495-4d1c-a4e1-5e16dcd7cdbe',
            'name' => 'ahmad afandi'
        ]);

        $this->be($user);
    }
}
