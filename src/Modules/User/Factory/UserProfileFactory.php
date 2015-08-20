<?php
namespace FlameDevelopment\Modules\User;

use \FlameDevelopment\Modules\User\UserProfile;

class UserProfileFactory
{
    /**
     * Builds a new UserProfile object
     * @param string $username
     * @param string $emailAddress
     * @return UserProfile
     */
    public function make($username, $emailAddress)
    {
        return new UserProfile($username, $emailAddress);
    }
}

