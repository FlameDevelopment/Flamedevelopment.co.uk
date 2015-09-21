<?php
namespace FlameDevelopment\Modules\User;
use \FlameDevelopment\Modules\User\Factory\UserFactory;
use \FlameDevelopment\Modules\User\Factory\UserProfileFactory;

use \FlameDevelopment\Validation\EmailAddress;
use \FlameDevelopment\Validation\Username;

class UserService
{
    /**
     * Returns a User object
     * contains a UserProfile object
     * @param int $id - the unique identifier for the User
     * @return User
     */
    public function getUser($id)
    {
        $username = new Username('testy.testerton');
        $email = new EmailAddress('test@test.com');
        $profile = UserProfileFactory::make($username, $email);
        $user = UserFactory::make($id, $profile);
        
        return $user;
    }
}

