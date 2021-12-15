<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Repository\ComedianDocumentsRepository;

/**
 * @ORM\Entity(repositoryClass=ComedianDocumentsRepository::class)
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

    private $imageFile;

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
}
