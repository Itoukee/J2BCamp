<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }
<<<<<<< HEAD

=======
>>>>>>> nino
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setfirstName('Emma');
        $user->setlastName("Brunat");
        $user->setEmail('emma@agencej2b.com');
        $user->setPhoneNumber('06 81 76 95 03');
        $user->setPassword($this->hasher->hashPassword($user, $_ENV['ADMIN_PASSWORD']));
        $user->setRoles(["ROLE_ADMIN"]);



        $manager->persist($user);

        $manager->flush();

        $user = new User();
        $user->setfirstName('Nino');
        $user->setlastName("Garo");
        $user->setEmail('nino.garo@gmail.com');
        $user->setPassword($this->hasher->hashPassword($user, $_ENV['ADMIN_PASSWORD']));
        $user->setRoles(["ROLE_COMEDIAN"]);


        $manager->persist($user);

        $manager->flush();
    }
}
