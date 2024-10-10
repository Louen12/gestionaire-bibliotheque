<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Reservation::class)]
    private Collection $reservations;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Borrow::class)]
    private Collection $borrows;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Historical::class)]
    private Collection $historicals;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->borrows = new ArrayCollection();
        $this->historicals = new ArrayCollection();
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setUserId($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getUserId() === $this) {
                $reservation->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Borrow>
     */
    public function getBorrows(): Collection
    {
        return $this->borrows;
    }

    public function addBorrow(Borrow $borrow): static
    {
        if (!$this->borrows->contains($borrow)) {
            $this->borrows->add($borrow);
            $borrow->setUserId($this);
        }

        return $this;
    }

    public function removeBorrow(Borrow $borrow): static
    {
        if ($this->borrows->removeElement($borrow)) {
            // set the owning side to null (unless already changed)
            if ($borrow->getUserId() === $this) {
                $borrow->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Historical>
     */
    public function getHistoricals(): Collection
    {
        return $this->historicals;
    }

    public function addHistorical(Historical $historical): static
    {
        if (!$this->historicals->contains($historical)) {
            $this->historicals->add($historical);
            $historical->setUserId($this);
        }

        return $this;
    }

    public function removeHistorical(Historical $historical): static
    {
        if ($this->historicals->removeElement($historical)) {
            // set the owning side to null (unless already changed)
            if ($historical->getUserId() === $this) {
                $historical->setUserId(null);
            }
        }

        return $this;
    }
}
