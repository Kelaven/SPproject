<?php
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../helpers/connect.php');



class Picture
{
    // * Attributes
    private ?int $id_picture;
    private int $isSelection;
    private ?string $name;
    private ?string $photo;
    private ?string $description;
    private ?int $picture_like;
    private ?DateTime $created_at;
    private ?DateTime $updated_at;
    private ?DateTime $deleted_at;
    private ?int $id_gallery;

    // * Magic method construct
    public function __construct(
        ?int $id_picture = null,
        int $isSelection = 0,
        ?string $name = null,
        ?string $photo = null,
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
    public function setIsSelection(int $isSelection): void
    {
        $this->isSelection = $isSelection;
    }
    public function getIsSelection(): int
    {
        return $this->isSelection;
    }

    // Setter et getter pour name
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
    public function getName(): ?string
    {
        return $this->name;
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

    // * Method to insert new picture
    /**
     * Method to insert new picture
     * @return bool true if insert works
     */
    public function insert(): bool
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `pictures`
        (`isSelection`, `name`, `photo`, `description`)
        VALUES (:isSelection, :name, :photo, :description);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':isSelection', $this->getIsSelection());
        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':photo', $this->getPhoto());
        $sth->bindValue(':description', $this->getDescription());

        $sth->execute();

        if ($sth->rowCount() <= 0) {
            throw new Exception('Erreur lors de l\'enregistrement de la catégorie');
        } else {
            return true;
        }
    }

    // * Method isExist
    /**
     * method to check if data already exist in base. Please read below details : 
     * @param null enter $name if you want to check if the same name already exists in base
     * @param null enter $description if you want to check if the same description already exists in base
     * @param null enter $id_picture, only when update a picture, if you want to check if the same name or description already exists in base (NB : use this with $name and $description wich must not be null here)
     * 
     * @return bool
     */
    public static function isExist($name = null, $description = null, $currentId_picture = null): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_picture`) AS "count"
                FROM `pictures`';
        $sql .= ' WHERE 1 = 1';

        if ($name != null) {
            $sql .= ' AND `name` = :name';
        }
        if ($description != null) {
            $sql .= ' AND `description` = :description';
        }
        if ($currentId_picture != null) {
            $sql .= ' AND `id_picture` != :id_picture';
        }

        $sth = $pdo->prepare($sql);

        if ($name != null) {
            $sth->bindValue(':name', $name);
        }
        if ($description != null) {
            $sth->bindValue(':description', $description);
        }
        if ($currentId_picture != null) {
            $sth->bindValue(':id_picture', $currentId_picture, PDO::PARAM_INT);
        }

        $sth->execute();

        $rowCount = $sth->fetchColumn(); // to have number of lignes wich are corresponding themself

        return $rowCount > 0;
    }

    // * method get
    /**
     * method to get informations from $id_picture
     * @param int $id_picture
     * 
     * @return null|object with informations
     */
    public static function get(?int $id_picture): null|object
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `pictures` 
        WHERE id_picture = :id_picture;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_picture', $id_picture, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    // * method update
    /**
     * method to update picture' informations
     * @return bool if execute works
     */
    public function update(): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `pictures`
        SET `isSelection` = :isSelection,
        `name` = :name,
        `photo` = :photo,
        `description` = :description
        WHERE `id_picture` = :id_picture;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':isSelection', $this->getIsSelection(), PDO::PARAM_INT);
        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':photo', $this->getPhoto());
        $sth->bindValue(':description', $this->getDescription());
        $sth->bindValue(':id_picture', $this->getIdPicture(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }


    // *  method archive
    /**
     * metho to archive a picture
     * @param int $toArchive
     * 
     * @return bool if execute workd
     */
    public static function archive(int $toArchive): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `pictures` 
            SET `deleted_at` = NOW()
            WHERE `id_picture` = :id_picture;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_picture', $toArchive, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    // * method unarchive
    /**
     * metho to unarchive a photo
     * @param int $archive
     * 
     * @return bool true if execute works
     */
    public static function unarchive(int $archive): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `pictures`
            SET `deleted_at` = NULL
            WHERE `id_picture` = :id_picture;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_picture', $archive, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    // * method delete
    public static function delete(int $id_picture): bool
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `pictures`
            WHERE `id_picture` = :id_picture;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_picture', $id_picture, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }


    // * Method search
    public static function search(string $search = '', bool $archive = false): array|null
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `pictures`';

        $sql .= ' WHERE 1 = 1';

        if ($search != '') {
            $sql .= ' AND `name` LIKE :search';
        }
        if ($archive === false) {
            $sql .= ' AND `pictures`.`deleted_at` IS NULL'; // is the column is NULL, don't display at list.php
        } else {
            $sql .= ' AND `pictures`.`deleted_at` IS NOT NULL';
        }

        $sth = $pdo->prepare($sql);

        if ($search != '') {
            $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        }

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
