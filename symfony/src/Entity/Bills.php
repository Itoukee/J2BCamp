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
     * @ORM\Column(type="string",length=50)
     */
    private $case_number;
    /**
     * @ORM\Column(type="string",length=50)
     */
    private $num_stage;

    /**
     * @ORM\Column(type="string", length=50,nullable=true)
     */
    private $bdc;


    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Trainings::class, inversedBy="bills")
     */
    private $training;

    /**
     * @ORM\ManyToOne(targetEntity=Companies::class, inversedBy="bills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $comedian;

    /**
     * @ORM\Column(type="boolean")
     */
    private $paid;

    /**
     * @ORM\Column(type="date")
     */
    private $inter_date;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTimeImmutable('now'));
    }

    /**
     *
     * @ORM\PreUpdate
     */
    public function updatedTimestamps(): void
    {
        $this->setUpdatedAt(new \DateTime('now'));

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumStage(): ?string
    {
        return $this->num_stage;
    }

    public function setNumStage(string $num_stage): self
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

    public function getCompany(): ?Companies
    {
        return $this->company;
    }

    public function setCompany(?Companies $company): self
    {
        $this->company = $company;

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

    public function getTraining(): ?Trainings
    {
        return $this->training;
    }

    public function setTraining(?Trainings $training): self
    {
        $this->training = $training;

        return $this;
    }

    public function getComedian(): ?User
    {
        return $this->comedian;
    }

    public function setComedian(?User $comedian): self
    {
        $this->comedian = $comedian;

        return $this;
    }

    public function getPaid(): ?bool
    {
        return $this->paid;
    }

    public function setPaid(bool $paid): self
    {
        $this->paid = $paid;

        return $this;
    }

    public function getInterDate(): ?\DateTimeInterface
    {
        return $this->inter_date;
    }

    public function setInterDate(\DateTimeInterface $inter_date): self
    {
        $this->inter_date = $inter_date;

        return $this;
    }

    public function getCaseNumber(): ?string
    {
        return $this->case_number;
    }

    public function setCaseNumber(string $case_number): self
    {
        $this->case_number = $case_number;

        return $this;
    }

}
