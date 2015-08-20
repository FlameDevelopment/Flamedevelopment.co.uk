<?php
namespace FlameDevelopment\Modules\User;
use \FlameDevelopment\Modules\User;
use \FlameDevelopment\Modules\User\UserProfile;
/* 
 * User Factory
 */
class UserFactory
{
    public function make($id, UserProfile $profile)
    {
        return new User($id, $profile);
    }
}

