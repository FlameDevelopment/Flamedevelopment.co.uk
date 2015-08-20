<?php

namespace FlameDevelopment\Errors;

class InvalidArgumentException extends \InvalidArgumentException
{
    protected $message;
    
    /**
     * Throws a new InvalidArgumentException
     * @param string $value
     * @param array $allowed_types
     */
    public function __construct($value, array $allowed_types)
    {
        $this->message = sprintf('Argument "%s" is invalid. Allowed types for argument are "%s".', $value, implode(', ', $allowed_types));
        parent::__construct($this->message, 341, __FILE__);
    }
}

