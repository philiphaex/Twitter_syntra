<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TweetTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {


        $this->browse(function ($browser){
            $message = str_random(10);
            $browser->visit('/login')
                ->type('email', 'test@test.com')
                ->type('password', '123456')
                ->press('Login')
                ->visit('/profile/test')
                ->assertDontSee('Follow')
                ->assertDontSee('Unfollow')
                ->type('message', $message)
                ->press('Tweet')
                ->waitForText($message)

        });
    }
}
