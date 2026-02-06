<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(
    min: 2,
    max: 50,
    minMessage: "Le nom doit contenir au moins 2 caractères.",
    maxMessage: "Le nom ne doit pas dépasser 50 caractères."
)]
    #[Assert\Regex(
        pattern: "/^[A-Za-zÀ-ÖØ-öø-ÿ' -]{2,50}$/",
        message: "Le nom ne doit contenir que des lettres, espaces, tirets ou apostrophes."
    )]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Regex(
        pattern: "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/",
        message: "Veuillez entrer une adresse e-mail valide."
    )]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $books = null;

    #[ORM\ManyToOne(targetEntity: Book::class,inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Book $book = null;

    private ?string $email = null;

    #[ORM\ManyToMany(targetEntity: Book::class)]
    private Collection $books;

    /**
     * @var Collection<int, Book>
     */
    

    public function __construct()
    {
        $this->books = new ArrayCollection();
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): static
    {
        $this->book = $book;
        return $this;
    }


    public function getBooks(): ?string
    public function getBooks(): Collection
    {
        return $this->books; // retourne bien une Collection
    }


    public function addBook(Book $book): static
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
        }

        return $this;
    }

    public function removeBook(Book $book): static
    {
        $this->books->removeElement($book);

        return $this;
    }
}
