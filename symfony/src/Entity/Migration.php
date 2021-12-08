<?php

namespace App\Entity;

use App\Repository\MigrationRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Product;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ORM\Entity(repositoryClass=MigrationRepository::class)
 */
class Migration
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    private $firstname;
    private $lastname;
    private $password;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
}
