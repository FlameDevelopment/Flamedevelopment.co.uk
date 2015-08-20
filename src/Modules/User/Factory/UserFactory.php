<?php
namespace FlameDevelopment\Modules\User;
use \FlameDevelopment\Modules\User;
/* 
 * User Factory
 */
class UserFactory
{
    public function make($id, $profile)
    {
        return new User($id, $profile);
    }
}

