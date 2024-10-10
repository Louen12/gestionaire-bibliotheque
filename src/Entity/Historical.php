<?php

namespace App\Entity;

use App\Repository\HistoricalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoricalRepository::class)]
class Historical
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'historicals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'historicals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Book $book_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $borrow_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $return_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getBookId(): ?Book
    {
        return $this->book_id;
    }

    public function setBookId(?Book $book_id): static
    {
        $this->book_id = $book_id;

        return $this;
    }

    public function getBorrowDate(): ?\DateTimeInterface
    {
        return $this->borrow_date;
    }

    public function setBorrowDate(\DateTimeInterface $borrow_date): static
    {
        $this->borrow_date = $borrow_date;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->return_date;
    }

    public function setReturnDate(\DateTimeInterface $return_date): static
    {
        $this->return_date = $return_date;

        return $this;
    }
}
