<?php

namespace App\Infra\Entity;

use App\Infra\Repository\BookDescriptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookDescriptionRepository::class)]
class BookDescriptionEntity
{
    use EntityTimeStamp;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;
    #[ORM\OneToOne(inversedBy: "description", targetEntity: BookEntity::class)]
    #[ORM\JoinColumn(name: "book_id", referencedColumnName: "id", onDelete: "CASCADE")]
    private $book;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE,nullable: false)]
    private \DateTime $created_at;
    #[ORM\Column(type: Types::DATETIME_MUTABLE,nullable: false)]
    private \DateTime $updated_at;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return BookDescriptionEntity
     */
    public function setId(int $id): BookDescriptionEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param mixed $book
     * @return BookDescriptionEntity
     */
    public function setBook($book)
    {
        $this->book = $book;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return BookDescriptionEntity
     */
    public function setDescription(?string $description): BookDescriptionEntity
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     * @return BookDescriptionEntity
     */
    public function setCreatedAt(\DateTime $created_at): BookDescriptionEntity
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    /**
     * @param \DateTime $updated_at
     * @return BookDescriptionEntity
     */
    public function setUpdatedAt(\DateTime $updated_at): BookDescriptionEntity
    {
        $this->updated_at = $updated_at;
        return $this;
    }
}
