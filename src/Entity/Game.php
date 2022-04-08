<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     * @Assert\LessThanOrEqual(
     *      propertyPath = "max_players",
     *      message = "Le nombre de joueurs min doit être inférieur au nombre de joueurs max"
     * )
     */
    #[Assert\LessThanOrEqual(propertyPath: 'max_players', message: 'Le nombre de joueurs min...')]
    private $min_players;

    /**
     * @ORM\Column(type="integer")
     * @Assert\GreaterThanOrEqual(
     *      propertyPath = "min_players",
     *      message = "Le nombre de joueurs max doit être supérieur au nombre de joueurs min"
     * )
     */
    #[Assert\GreaterThanOrEqual(propertyPath: 'min_players', message: 'Le nombre de joueurs min...')]
    private $max_players;

    /**
     * @ORM\OneToMany(targetEntity=Contest::class, mappedBy="game", orphanRemoval=true)
     */
    private $contests;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function __construct()
    {
        $this->contests = new ArrayCollection();
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

    public function getMinPlayers(): ?int
    {
        return $this->min_players;
    }

    public function setMinPlayers(int $min_players): self
    {
        $this->min_players = $min_players;

        return $this;
    }

    public function getMaxPlayers(): ?int
    {
        return $this->max_players;
    }

    public function setMaxPlayers(int $max_players): self
    {
        $this->max_players = $max_players;

        return $this;
    }

    /**
     * @return Collection<int, Contest>
     */
    public function getContests(): Collection
    {
        return $this->contests;
    }

    public function addContest(Contest $contest): self
    {
        if (!$this->contests->contains($contest)) {
            $this->contests[] = $contest;
            $contest->setGame($this);
        }

        return $this;
    }

    public function removeContest(Contest $contest): self
    {
        if ($this->contests->removeElement($contest)) {
            // set the owning side to null (unless already changed)
            if ($contest->getGame() === $this) {
                $contest->setGame(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
