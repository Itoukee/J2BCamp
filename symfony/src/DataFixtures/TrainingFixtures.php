<?php

namespace App\DataFixtures;

use App\Entity\Trainings;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrainingFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $training = new Trainings();
        $training->setName('CodeCamp');
        $training->setPrice('200');
        $training->setDuration('14');
        $training->setDescription('Code Camp pour J2B');

        $manager->persist($training);

        $manager->flush();
    }
}
