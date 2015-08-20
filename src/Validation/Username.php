<?php

namespace FlameDevelopment\Validation;

class Username
{
    protected $username;
    
    /**
     * Returns a valid username object
     * @param string $username
     */
    public function __construct($username)
    {
        $this->username = $username;
    }
}
