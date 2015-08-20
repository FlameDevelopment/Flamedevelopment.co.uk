<?php

namespace FlameDevelopment\Modules\User;

use \FlameDevelopment\Validation\EmailAddress;
use \FlameDevelopment\Validation\Username;

class UserProfile
{
    protected $username;
    protected $email;
    
    /**
     * Returns a new UserProfile object
     * @param string $username
     * @param Email $email
     */
    public function __construct(Username $username, EmailAddress $email)
    {
        $this->username = $username;
        $this->email = $email;
    }
}

