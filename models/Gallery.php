<?php
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../helpers/connect.php');

class Gallery
{
    // * attributs
    private ?int $id_gallery;
    private string $name;
    private string $date;
    private string $password;
    private ?DateTime $created_at;
    private ?DateTime $updated_at;
    private ?DateTime $deleted_at;

    // * méthode magique construct
    public function __construct(int $id_gallery = NULL, string $name  = '', string $date = '', string $password = '', DateTime $created_at = NULL, DateTime $updated_at = NULL, DateTime $deleted_at = NULL)
    {
        $this->id_gallery = $id_gallery;
        $this->name = $name;
        $this->date = $date;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
    }

    // * Setter et getter pour id_gallery
    public function setIdGallery(int $id_gallery): void
    {
        $this->id_gallery = $id_gallery;
    }
    public function getIdGallery(): int
    {
        return $this->id_gallery;
    }

    // * Setter et getter pour name
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }

    // * Setter et getter pour date
    public function setDate(string $date): void
    {
        $this->date = $date;
    }
    public function getDate(): string
    {
        return $this->date;
    }

    // * Setter et getter pour password
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    // * Setter et getter pour created_at
    public function setCreatedAt(DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    // * Setter et getter pour updated_at
    public function setUpdatedAt(DateTime $updated_at): void
    {
        $this->updated_at = $updated_at;
    }
    public function getUpdatedAt(): DateTime
    {
        return $this->updated_at;
    }

    // * Setter et getter pour deleted_at
    public function setDeletedAt(DateTime $deleted_at): void
    {
        $this->deleted_at = $deleted_at;
    }
    public function getDeletedAt(): DateTime
    {
        return $this->deleted_at;
    }


    //  ! methods

    // * Method to display galleries' list
    /**
     * Method to display galleries' list
     * 
     * $isCover is to display galleries in the page accesclient only when a gallery have a cover picture
     * 
     * @return array objects array
     */
    public static function getAll(bool $archive = false, string $search = '', int $isCover = 0): array
    {
        $pdo = Database::connect();

        $sql = 'SELECT `galleries`.*, `pictures`.`photo` AS `gallery_photo`, `pictures`.`isCover` AS `gallery_isCover`
        FROM `galleries`
        LEFT JOIN `pictures` ON `galleries`.`id_gallery` = `pictures`.`id_gallery`'; // LEFT JOIN to have galeries without photos too
        $sql .= ' WHERE 1 = 1';

        if ($archive === false) {
            $sql .= ' AND `galleries`.`deleted_at` IS NULL'; // is the column is NULL, don't display at list.php
        } else {
            $sql .= ' AND `galleries`.`deleted_at` IS NOT NULL';
        }
        if ($search != '' && $isCover != 0) {
            $sql .= ' AND `galleries`.`name` LIKE :search AND `pictures`.`isCover` = 1';
        } else if ($search != '' && $isCover == 0) {
            $sql .= ' AND `galleries`.`name` LIKE :search';
        }
        if ($isCover === 1) {
            $sql .= ' AND `pictures`.`isCover` = 1';
        }

        $sth = $pdo->prepare($sql);

        if ($search != '') {
            $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        }

        $sth->execute();

        $datas = $sth->fetchAll(PDO::FETCH_OBJ); // return objects thanks to FETCH_OBJ (by default it's associative indexed array)

        return $datas;
    }

    // public static function getAllDashboard(bool $archive = false, string $search = '', bool $displayWithoutDuplicate = false)
    // {
    //     $pdo = Database::connect();

    //     $sql = 'SELECT `galleries`.*, COUNT(`pictures`.`photo`) AS `gallery_photo`, COUNT(`pictures`.`isCover`) AS `gallery_isCover`
    //     FROM `galleries`
    //     LEFT JOIN `pictures` ON `galleries`.`id_gallery` = `pictures`.`id_gallery`'; 
    //     $sql .= ' WHERE 1 = 1';

    //     if ($archive === false) {
    //         $sql .= ' AND `galleries`.`deleted_at` IS NULL'; // is the column is NULL, don't display at list.php
    //     } else {
    //         $sql .= ' AND `galleries`.`deleted_at` IS NOT NULL';
    //     }
    //     if ($search != '') {
    //         $sql .= ' AND `galleries`.`name` LIKE :search';
    //     }
    //     if ($displayWithoutDuplicate != false) {
    //         $sql .= ' GROUP BY `galleries`.`id_gallery`';
    //     }

    //     $sth = $pdo->prepare($sql);

    //     if ($search != '') {
    //         $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    //     }

    //     $sth->execute();

    //     $datas = $sth->fetchAll(PDO::FETCH_OBJ); // return objects thanks to FETCH_OBJ (by default it's associative indexed array)

    //     return $datas;
    // }

    // * Method to insert new gallery
    /**
     * Method to insert new gallery
     * @return bool true if insert works
     */
    public function insert(): bool
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `galleries` 
                (`name`, `date`, `password`, `id_user`)
                VALUES
                (:name, :date, :password, 1);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':date', $this->getDate());
        $sth->bindValue(':password', $this->getPassword());

        $sth->execute();

        if ($sth->rowCount() <= 0) {
            throw new Exception('Erreur lors de l\'enregistrement de la catégorie');
        } else {
            return true;
        }
    }

    // * method isExist
    /**
     * method to check if data already exist in base. Please read below details : 
     * @param null enter $name if you want to check if the same name already exists in base
     * @param null enter $password if you want to check if the same password already exists in base
     * @param null enter $id_gallery, only when update a gallery, if you want to check if the same name or password already exists in base (NB : use this with $name and $password wich must not be null here)
     * 
     * @return bool
     */
    public static function isExist($name = null, $password = null, $currentId_gallery = null): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_gallery`) AS "count"
                FROM `galleries`';
        $sql .= ' WHERE 1 = 1';

        if ($name != null) {
            $sql .= ' AND `name` = :name';
        }
        if ($password != null) {
            $sql .= ' AND `password` != :password';
        }
        if ($currentId_gallery != null) {
            $sql .= ' AND `id_gallery` != :id_gallery'; // if the same name or password is already in another data in base it don't work but if the same name if only on the current data it will work !!!!!!
        }

        $sth = $pdo->prepare($sql);

        if ($name != null) {
            $sth->bindValue(':name', $name);
        }
        if ($password != null) {
            $sth->bindValue(':password', $password);
        }
        if ($currentId_gallery != null) {
            $sth->bindValue(':id_gallery', $currentId_gallery, PDO::PARAM_INT);
        }

        $sth->execute();

        $rowCount = $sth->fetchColumn(); // to have number of lignes wich are corresponding themself

        return $rowCount > 0;
    }

    // * method get
    /**
     * method to get informations from $id_gallery
     * @param int $id_gallery
     * 
     * @return null|object with informations
     * @return false if the gallery hasn't pictures or cover picture !!!!
     */
    public static function get(?int $id_gallery): null|false|object
    {
        $pdo = Database::connect();

        $sql = 'SELECT `galleries`.*, `pictures`.`photo` AS `picture_photoCover`
        FROM `galleries`
        JOIN `pictures` ON `galleries`.`id_gallery` = `pictures`.`id_gallery` -- Warning : if the galerie hasnt pic, the result return false
        WHERE `galleries`.`id_gallery` = :id_gallery AND `pictures`.`isCover` = 1;'; // Warning : if the galerie hasnt cover pic, the result return false

        // if ($isCover === 1) {
        //     $sql .= ' AND `pictures`.`isCover` = 1';
        // }

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_gallery', $id_gallery, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    // * method update
    /**
     * method to update galleries' informations
     * @return bool if execute works
     */
    public function update(): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `galleries`
        SET `name` = :name,
        `date` = :date,
        `password` = :password
        WHERE `id_gallery` = :id_gallery;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':date', $this->getDate());
        $sth->bindValue(':password', $this->getPassword());
        $sth->bindValue(':id_gallery', $this->getIdGallery(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    // *  method archive
    public static function archive(int $toArchive): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `galleries` 
        SET `deleted_at` = NOW()
        WHERE `id_gallery` = :id_gallery;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_gallery', $toArchive, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    // * method unarchive
    public static function unarchive(int $archive): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `galleries`
        SET `deleted_at` = NULL
        WHERE `id_gallery` = :id_gallery;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_gallery', $archive, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    // * method delete
    public static function delete(int $id_gallery): bool
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `galleries`
        WHERE `id_gallery` = :id_gallery;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_gallery', $id_gallery, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }
}
