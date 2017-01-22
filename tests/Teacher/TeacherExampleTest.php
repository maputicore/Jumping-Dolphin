<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeacherExampleTest extends \TeacherTestCase
{
    protected $credentials = [
        'email'    => 'iwgac1026@gmail.com',
        'password' => '12345678'
    ];

    /** @test */
    function it_should_display_title()
    {
        $this->visit('/')
             ->see('Laravel');
    }

    /** @test */
    function it_should_login_user()
    {
        $this->visit('/')
             ->type('iwgac1026@gmail.com', 'email')
             ->type('12345678', 'password')
             ->press('Login')
             ->seeIsAuthenticated('teacher');
    }

    /** @test */
    function it_should_display_error()
    {
        $this->visit('/')
             ->see('Login')
             ->type('something@gmail.com', 'email')
             ->type('12345678', 'password')
             ->check('remember')
             ->press('Login')
             ->seePageIs('/login')
             ->see('These credentials do not match our records');
    }
}
