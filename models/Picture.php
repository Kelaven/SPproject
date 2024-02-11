<?php
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../helpers/connect.php');



class Picture
{
    // * Attributes
    private ?int $id_picture;
    private bool $isSelection;
    private ?string $photo;
    private string $name;
    private ?string $description;
    private ?int $picture_like;
    private ?DateTime $created_at;
    private ?DateTime $updated_at;
    private ?DateTime $deleted_at;
    private ?int $id_gallery;

    // * Magic method construct
    public function __construct(
        ?int $id_picture = null,
        bool $isSelection = false,
        ?string $photo = null,
        string $name = null,
        ?string $description = null,
        ?int $picture_like = null,
        ?DateTime $created_at = null,
        ?DateTime $updated_at = null,
        ?DateTime $deleted_at = null,
        ?int $id_gallery = null
    ) {
        $this->id_picture = $id_picture;
        $this->isSelection = $isSelection;
        $this->photo = $photo;
        $this->name = $name;
        $this->description = $description;
        $this->picture_like = $picture_like;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
        $this->id_gallery = $id_gallery;
    }

    // Setter et getter pour id_picture
    public function setIdPicture(?int $id_picture): void
    {
        $this->id_picture = $id_picture;
    }
    public function getIdPicture(): ?int
    {
        return $this->id_picture;
    }

    // Setter et getter pour isSelection
    public function setIsSelection(bool $isSelection): void
    {
        $this->isSelection = $isSelection;
    }
    public function getIsSelection(): bool
    {
        return $this->isSelection;
    }

    // Setter et getter pour photo
    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    // Setter et getter pour name
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }

    // Setter et getter pour description
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }

    // Setter et getter pour picture_like
    public function setPictureLike(?int $picture_like): void
    {
        $this->picture_like = $picture_like;
    }
    public function getPictureLike(): ?int
    {
        return $this->picture_like;
    }

    // Setter et getter pour created_at
    public function setCreatedAt(?DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }
    public function getCreatedAt(): ?DateTime
    {
        return $this->created_at;
    }

    // Setter et getter pour updated_at
    public function setUpdatedAt(?DateTime $updated_at): void
    {
        $this->updated_at = $updated_at;
    }
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updated_at;
    }

    // Setter et getter pour deleted_at
    public function setDeletedAt(?DateTime $deleted_at): void
    {
        $this->deleted_at = $deleted_at;
    }
    public function getDeletedAt(): ?DateTime
    {
        return $this->deleted_at;
    }

    // Setter et getter pour id_gallery
    public function setIdGallery(?int $id_gallery): void
    {
        $this->id_gallery = $id_gallery;
    }
    public function getIdGallery(): ?int
    {
        return $this->id_gallery;
    }

    //  ! methods

    // * Method to display pictures' list
    /**
     * Method to display pictures' list
     * @return array objects array
     */
    public static function getAll(bool $archive = false): array
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `pictures`';
        $sql .= ' WHERE 1 = 1';

        if ($archive === false) {
            $sql .= ' AND `pictures`.`deleted_at` IS NULL'; // is the column is NULL, don't display at list.php
        } else {
            $sql .= ' AND `pictures`.`deleted_at` IS NOT NULL';
        }

        $sth = $pdo->query($sql);

        $datas = $sth->fetchAll(PDO::FETCH_OBJ);

        return $datas;
    }
}
