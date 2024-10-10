<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\OneToMany(mappedBy: 'book_id', targetEntity: Reservation::class)]
    private Collection $reservations;

    #[ORM\OneToOne(mappedBy: 'book_id', cascade: ['persist', 'remove'])]
    private ?Borrow $borrow = null;

    #[ORM\OneToMany(mappedBy: 'book_id', targetEntity: Historical::class)]
    private Collection $historicals;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->historicals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;

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
            $reservation->setBookId($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getBookId() === $this) {
                $reservation->setBookId(null);
            }
        }

        return $this;
    }

    public function getBorrow(): ?Borrow
    {
        return $this->borrow;
    }

    public function setBorrow(Borrow $borrow): static
    {
        // set the owning side of the relation if necessary
        if ($borrow->getBookId() !== $this) {
            $borrow->setBookId($this);
        }

        $this->borrow = $borrow;

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
            $historical->setBookId($this);
        }

        return $this;
    }

    public function removeHistorical(Historical $historical): static
    {
        if ($this->historicals->removeElement($historical)) {
            // set the owning side to null (unless already changed)
            if ($historical->getBookId() === $this) {
                $historical->setBookId(null);
            }
        }

        return $this;
    }
}
