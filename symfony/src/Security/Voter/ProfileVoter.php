<?php

namespace App\Security\Voter;

use App\Entity\User;
use App\Service\Securizer;
use App\Service;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ProfileVoter extends Voter
{
    const VIEW = 'profile_view';
    const EDIT = 'profile_edit';

    public function __construct(private Securizer $securizer)
    {
    }

    protected function supports(string $attribute, $subject): bool
    {
        if (!in_array($attribute, [self::VIEW, self::EDIT])) {
            return false;
        }
        if (!$subject instanceof User) {
            return false;
        }
        return true;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // il faut que le user soit login
        if (!$user instanceof User) {
            return false;
        }

        return match ($attribute) {
            self::EDIT => $this->canEdit($subject, $user),
            self::VIEW => $this->canView($subject, $user),
            default => false,
        };

    }

    private function canView(User $profile, User $user): bool
    {
        if ($this->canEdit($profile, $user)) {
            return true;
        }
        return false;

    }

    private function canEdit(User $profile, User $user): bool
    {
        // this assumes that the Post object has a `getOwner()` method
        return ($user->getId() == $profile->getId()) || ($this->securizer->isGranted($user, "ROLE_ADMIN"));
    }
}
