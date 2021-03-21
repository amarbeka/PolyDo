<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
       
            $browser->visit('/login')->type('email', 'admin@demo.com')->type('password', 'password')->press('Login');
            $browser->visit(route('users.index'))->screenshot('User List');
            $browser->assertRouteIs('users.index');

            $browser->visit(route('roles.index'))->screenshot('Roles List');
            $browser->assertRouteIs('roles.index');

            $browser->visit(route('permissions.index'))->screenshot('Permissions List');
            $browser->assertRouteIs('permissions.index');

            $browser->visit(route('project.index'))->screenshot('Project List');
            $browser->assertRouteIs('project.index');

            $browser->visit(route('task.index'))->screenshot('Task List');
            $browser->assertRouteIs('task.index');
    
});
    }

}