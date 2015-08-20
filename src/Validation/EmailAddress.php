<?php

namespace FlameDevelopment\Validation;

use \FlameDevelopment\Validation\ValidationException;

class EmailAddress
{
    protected $emailAddress;
    
    /**
     * Returns a valid e-mail address object
     * @param string $emailAddress
     */
    public function __construct($emailAddress)
    {
        $filteredValue = filter_var($emailAddress, FILTER_VALIDATE_EMAIL);
        if($filteredValue === false)
        {
            throw new ValidationException($emailAddress, array('string (valid email address)'));
        }
        $this->emailAddress = $filteredValue;
    }
}

