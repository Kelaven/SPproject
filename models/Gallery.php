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

    //  ! méthodes

    // * Méthode pour afficher la listes des galeries
    /**
     * Méthode permettant d'afficher la liste des galeries 
     * @return array tableau d'objets
     */
    public static function getAll(): array
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `galleries`;';

        $sth = $pdo->query($sql); // la méthode query prépare et exécute en même temps à condition qu'il n'y ait pas de marqueurs

        $datas = $sth->fetchAll(PDO::FETCH_OBJ); // récupération des résultats sous forme d'objets grâce à FETCH_OBJ (par défaut c'est du tableau indexé associatif)

        return $datas;
    }

    // * Méthode pour insérer une nouvelle galerie
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
     * Method to test if a data with the same name already exists
     * @param mixed $name
     * 
     * @return bool True if the data exists already
     */
    public static function isExistByName($name, $currentId_gallery): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_gallery`) AS "count"
        FROM `galleries`
        WHERE `name` = :name 
        AND `id_gallery` != :id_gallery;'; // if the same name is already in another data in base it don't work but if the same name if only on the current data it will work !!!!!!

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $name);
        $sth->bindValue(':id_gallery', $currentId_gallery);

        $sth->execute();

        $rowCount = $sth->fetchColumn(); // to have number of lignes wich are corresponding themself

        return (bool) $rowCount > 0;
    }
    /**
     * Method to test if a data with the same name already exists
     * @param mixed $mail
     * @param mixed $firstname

     * 
     * @return bool True if the data exists already
     */
    public static function isExistByPassword($password, $currentId_gallery): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_gallery`) AS "count"
        FROM `galleries`
        WHERE `password` = :password
        AND `id_gallery` != :id_gallery;'; // if the same name is already in another data in base it don't work but if the same name if only on the current data it will work !!!!!!

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':password', $password);
        $sth->bindValue(':id_gallery', $currentId_gallery);

        $sth->execute();

        $rowCount = $sth->fetchColumn(); // to have number of lignes wich are corresponding themself

        return $rowCount > 0;
    }

    // * get method
    /**
     * method to get informations from $id_gallery
     * @param int $id_gallery
     * 
     * @return null|object with informations
     */
    public static function get(?int $id_gallery): null|object
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `galleries` 
        WHERE id_gallery = :id_gallery;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_gallery', $id_gallery);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    // * update method
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
}
