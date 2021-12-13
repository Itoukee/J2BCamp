<?php

namespace App\Entity;

use App\Repository\BillsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BillsRepository::class)
 */
class Bills
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_stage;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $bdc;

    /**
     * @ORM\ManyToOne(targetEntity=Companies::class, inversedBy="bills")
     */
    private $id_company;

    /**
     * @ORM\ManyToOne(targetEntity=Trainings::class)
     */
    private $id_training;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumStage(): ?int
    {
        return $this->num_stage;
    }

    public function setNumStage(int $num_stage): self
    {
        $this->num_stage = $num_stage;

        return $this;
    }

    public function getBdc(): ?string
    {
        return $this->bdc;
    }

    public function setBdc(string $bdc): self
    {
        $this->bdc = $bdc;

        return $this;
    }

    public function getIdCompany(): ?Companies
    {
        return $this->id_company;
    }

    public function setIdCompany(?Companies $id_company): self
    {
        $this->id_company = $id_company;

        return $this;
    }

    public function getIdTraining(): ?Trainings
    {
        return $this->id_training;
    }

    public function setIdTraining(?Trainings $id_training): self
    {
        $this->id_training = $id_training;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
