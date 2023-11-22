<?php

namespace App\Entity;

use App\Repository\PaintingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaintingRepository::class)]
class Painting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nameEn = null;

    #[ORM\Column(nullable: true, unique: true)]
    private ?int $number = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $alt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $altEn = null;

    #[ORM\Column(length: 255)]
    private ?string $galleryImage = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $creationYear = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 1, nullable: true)]
    private ?string $hight = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 1, nullable: true)]
    private ?string $width = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $material = "холст и масло";

    #[ORM\Column]
    private ?bool $enable = null;

    #[ORM\ManyToOne(inversedBy: 'paintings')]
    private ?Category $category = null;

    #[ORM\OneToMany(mappedBy: 'painting', targetEntity: PaintingImage::class)]
    private Collection $paintingImages;

    public function __construct()
    {
        $this->paintingImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNameEn(): ?string
    {
        return $this->nameEn;
    }

    public function setNameEn(?string $nameEn): static
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): static
    {
        $this->alt = $alt;

        return $this;
    }

    public function getAltEn(): ?string
    {
        return $this->altEn;
    }

    public function setAltEn(?string $altEn): static
    {
        $this->altEn = $altEn;

        return $this;
    }

    public function getGalleryImage(): ?string
    {
        return $this->galleryImage;
    }

    public function setGalleryImage(string $galleryImage): static
    {
        $this->galleryImage = $galleryImage;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCreationYear(): ?int
    {
        return $this->creationYear;
    }

    public function setCreationYear(int $creationYear): static
    {
        $this->creationYear = $creationYear;

        return $this;
    }

    public function getHight(): ?string
    {
        return $this->hight;
    }

    public function setHight(?string $hight): static
    {
        $this->hight = $hight;

        return $this;
    }

    public function getWidth(): ?string
    {
        return $this->width;
    }

    public function setWidth(?string $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(?string $material): static
    {
        $this->material = $material;

        return $this;
    }

    public function isEnable(): ?bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): static
    {
        $this->enable = $enable;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, PaintingImage>
     */
    public function getPaintingImages(): Collection
    {
        return $this->paintingImages;
    }

    public function addPaintingImage(PaintingImage $paintingImage): static
    {
        if (!$this->paintingImages->contains($paintingImage)) {
            $this->paintingImages->add($paintingImage);
            $paintingImage->setPainting($this);
        }

        return $this;
    }

    public function removePaintingImage(PaintingImage $paintingImage): static
    {
        if ($this->paintingImages->removeElement($paintingImage)) {
            // set the owning side to null (unless already changed)
            if ($paintingImage->getPainting() === $this) {
                $paintingImage->setPainting(null);
            }
        }

        return $this;
    }
}
