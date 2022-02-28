<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $url;

    /**
     * @ORM\OneToOne(targetEntity=Annonce::class, mappedBy="image", cascade={"persist", "remove"})
     */
    private $annonce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        // unset the owning side of the relation if necessary
        if ($annonce === null && $this->annonce !== null) {
            $this->annonce->setImage(null);
        }

        // set the owning side of the relation if necessary
        if ($annonce !== null && $annonce->getImage() !== $this) {
            $annonce->setImage($this);
        }

        $this->annonce = $annonce;

        return $this;
    }
}
