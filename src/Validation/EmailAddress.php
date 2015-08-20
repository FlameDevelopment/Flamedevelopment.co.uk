<?php

namespace FlameDevelopment\Validation;

class EmailAddress
{
    protected $emailAddress;
    
    /**
     * Returns a valid e-mail address object
     * @param string $emailAddress
     */
    public function __construct($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }
}

