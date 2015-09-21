<?php

namespace FlameDevelopment\Validation;

class PhoneNumber
{
    protected $phoneNumber;
    
    public function __construct($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
}

