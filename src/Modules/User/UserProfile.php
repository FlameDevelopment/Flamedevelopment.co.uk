<?php

namespace FlameDevelopment\Modules\User;

use \FlameDevelopment\Validation\EmailAddress;
use \FlameDevelopment\Validation\Username;

class UserProfile
{
    protected $username;
    protected $email;
    protected $passkey;
    protected $avatar;
    
    /**
     * Returns a new UserProfile object
     * @param string $username
     * @param Email $email
     */
    public function __construct(Username $username, EmailAddress $email, $passkey = null, $avatar = null)
    {
        $this->username = $username;
        $this->email = $email;
        $this->passkey = $passkey;
        $this->avatar = $avatar;
    }
}

