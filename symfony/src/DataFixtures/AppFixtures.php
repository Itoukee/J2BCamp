<?php

namespace App\DataFixtures;

use App\Entity\Trainings;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
       //
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CompanyFixtures::class,
            TrainingFixtures::class,
        ];
    }
}
