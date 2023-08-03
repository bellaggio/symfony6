<?php

namespace App\Infra\Entity;

use App\Infra\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class BookEntity
{
    use EntityTimeStamp;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private string $title;
    #[ORM\Column(type: Types::DECIMAL, nullable: false)]
    private string $price;

    #[ORM\Column(type: Types::DATETIME_MUTABLE,nullable: false)]
    private \DateTime $created_at;
    #[ORM\Column(type: Types::DATETIME_MUTABLE,nullable: false)]
    private \DateTime $updated_at;

    #[ORM\OneToOne(mappedBy: "book", targetEntity: BookDescriptionEntity::class, cascade: ["persist", "remove"])]
    private $description;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return BookEntity
     */
    public function setId(int $id): BookEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return BookEntity
     */
    public function setTitle(string $title): BookEntity
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return BookEntity
     */
    public function setPrice(string $price): BookEntity
    {
        $this->price = $price;
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
     * @return BookEntity
     */
    public function setCreatedAt(\DateTime $created_at): BookEntity
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
     * @return BookEntity
     */
    public function setUpdatedAt(\DateTime $updated_at): BookEntity
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription():mixed
    {
        return $this->description;
    }
}
