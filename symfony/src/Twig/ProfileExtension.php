<?php

namespace App\Twig;

use App\Entity\User;
use Symfony\Component\Security\Core\Security;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class ProfileExtension extends AbstractExtension
{
    const DEFAULT_PROFILE_PATH = "/images/default_picture.png";

    public function __construct(private Security $security)
    {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('handle_profile_picture', [$this, 'handleProfilePicture']),
        ];
    }

    public function handleProfilePicture(?string $path)
    {
        if ($path != null) {
            return $path;
        }
        return self::DEFAULT_PROFILE_PATH;
    }

}
