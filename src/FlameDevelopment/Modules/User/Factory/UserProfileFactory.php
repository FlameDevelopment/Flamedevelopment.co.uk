<?php
namespace FlameDevelopment\Modules\User\Factory;

use \FlameDevelopment\Modules\User\UserProfile;
use \FlameDevelopment\Validation\EmailAddress;
use \FlameDevelopment\Validation\Username;

class UserProfileFactory
{
    /**
     * Builds a new UserProfile object
     * @param string $username
     * @param string $emailAddress
     * @return UserProfile
     */
    public function make(Username $username, EmailAddress $emailAddress)
    {
        return new UserProfile($username, $emailAddress);
    }
}

