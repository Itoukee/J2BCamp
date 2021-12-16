<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Entity\File;
use App\Repository\ComedianDocumentsRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class ComedianDocuments
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
    private $comedian_id;

    /** 
     * @Vich\UploadableField(mapping="document_image",fileNameProperty="imageName",size="imageSize")
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string",nullable=true)
     * @var string|null
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer",nullable=true)
     *
     * @var int|null
     */
    private $imageSize;


    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Bills::class, mappedBy="comedian", orphanRemoval=true)
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComedianId(): ?int
    {
        return $this->comedian_id;
    }

    public function setComedianId(int $comedian_id): self
    {
        $this->comedian_id = $comedian_id;

        return $this;
    }
    /**
     *
     * @param File|UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @see UserInterface
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    /**
     * @see UserInterface
     */
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }


    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
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
