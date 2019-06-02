<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="article")
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image1", mappedBy="article")
     */
    private $image1;

    public function __construct()
    {
        $this->image = new ArrayCollection();
        $this->image1 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(Image $image): self
    {
        if (!$this->image->contains($image)) {
            $this->image[] = $image;
            $image->setArticle($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->image->contains($image)) {
            $this->image->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getArticle() === $this) {
                $image->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Image1[]
     */
    public function getImage1(): Collection
    {
        return $this->image1;
    }

    public function addImage1(Image1 $image1): self
    {
        if (!$this->image1->contains($image1)) {
            $this->image1[] = $image1;
            $image1->setArticle($this);
        }

        return $this;
    }

    public function removeImage1(Image1 $image1): self
    {
        if ($this->image1->contains($image1)) {
            $this->image1->removeElement($image1);
            // set the owning side to null (unless already changed)
            if ($image1->getArticle() === $this) {
                $image1->setArticle(null);
            }
        }

        return $this;
    }
}
