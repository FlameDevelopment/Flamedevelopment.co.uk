<?php
namespace FlameDevelopment\Modules\User;

use \FlameDevelopment\Modules\User\UserProfile;

class User
{
    protected $id;
    protected $profile;
    
    public function __construct($id, UserProfile $profile)
    {
        $this->id = $id;
        $this->profile = $profile;
    }
}

