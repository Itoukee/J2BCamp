<?php

namespace App\Entity;

use App\Repository\TrainingsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrainingsRepository::class)
 */
class Trainings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $price;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $duration;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\OneToMany(targetEntity=Bills::class, mappedBy="training")
     */
    private $bills;



    public function __construct()
    {
        $this->bills = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Bills[]
     */
    public function getBills(): Collection
    {
        return $this->bills;
    }

    public function addBill(Bills $bill): self
    {
        if (!$this->bills->contains($bill)) {
            $this->bills[] = $bill;
            $bill->setTraining($this);
        }

        return $this;
    }

    public function removeBill(Bills $bill): self
    {
        if ($this->bills->removeElement($bill)) {
            // set the owning side to null (unless already changed)
            if ($bill->getTraining() === $this) {
                $bill->setTraining(null);
            }
        }

        return $this;
    }





}
