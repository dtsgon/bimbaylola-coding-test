<?php

namespace App\Entity;

use App\Repository\MoviesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoviesRepository::class)]
class Movies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'date', nullable: true)]
    private $release_date;

    #[ORM\Column(type: 'integer')]
    private $duration;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $productora;

    #[ORM\ManyToMany(targetEntity: Genres::class, inversedBy: 'movies')]
    private $genres;

    #[ORM\ManyToMany(targetEntity: People::class)]
    #[ORM\JoinTable(name: "movies_actors")]
    private $actors;

    #[ORM\ManyToMany(targetEntity: People::class)]
    #[ORM\JoinTable(name: "movies_directors")]
    private $directors;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
        $this->actors = new ArrayCollection();
        $this->directors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(?\DateTimeInterface $release_date): self
    {
        $this->release_date = $release_date;

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

    public function getProductora(): ?string
    {
        return $this->productora;
    }

    public function setProductora(?string $productora): self
    {
        $this->productora = $productora;

        return $this;
    }

    /**
     * @return Collection<int, Genres>
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function addGenre(Genres $genre): self
    {
        if (!$this->genres->contains($genre)) {
            $this->genres[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genres $genre): self
    {
        $this->genres->removeElement($genre);

        return $this;
    }

    /**
     * @return Collection<int, People>
     */
    public function getActors(): Collection
    {
        return $this->actors;
    }

    public function addActor(People $actor): self
    {
        if (!$this->actors->contains($actor)) {
            $this->actors[] = $actor;
        }

        return $this;
    }

    public function removeActor(People $actor): self
    {
        $this->actors->removeElement($actor);

        return $this;
    }

    /**
     * @return Collection<int, People>
     */
    public function getDirectors(): Collection
    {
        return $this->directors;
    }

    public function addDirector(People $director): self
    {
        if (!$this->directors->contains($director)) {
            $this->directors[] = $director;
        }

        return $this;
    }

    public function removeDirector(People $director): self
    {
        $this->directors->removeElement($director);

        return $this;
    }
}
