<?php

namespace App\Service;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;

class Securizer
{
    public function __construct(private AccessDecisionManagerInterface $accessDecisionManager){}

    public function isGranted(User $user, $attribute, $object = null): bool
    {
        $token = new UsernamePasswordToken($user, 'main',$user->getRoles());
        return ($this->accessDecisionManager->decide($token,[$attribute],$object));
    }
}