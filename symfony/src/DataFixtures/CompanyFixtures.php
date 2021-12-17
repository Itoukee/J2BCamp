<?php

namespace App\DataFixtures;

use App\Entity\Companies;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompanyFixtures extends Fixture
{
    /// Fonction générant une entreprise pour les tests
    public function load(ObjectManager $manager): void
    {
        $company=new Companies();
        $company->setPhoneNumber('0144080023');
        $company->setName('ETNA');
        $company->setSiret('4495982');
        $company->setStreet_number('7');
        $company->setRoute('Rue Maurice Grandcoing');
        $company->setLocality('Ivry-Sur-Seine');
        $company->setCountry('France');
        $company->setLat('48.8131354');
        $company->setLng('2.393143');
        $manager->persist($company);
        $manager->flush();
    }
}
