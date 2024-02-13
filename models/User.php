<?php
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../helpers/connect.php');

class User
{
    // * attributs
    private int $id_user;
    private bool $isAdministrator = FALSE;
    private string $username;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $mobile;
    private string $password;
    private DateTime $created_at;
    private DateTime $updated_at;
    private ?DateTime $confirmed_at = NULL;

    // * méthode magique __constrcut
    // public function __construct(
    //     ?int $id_user = NULL,
    //     bool $isAdministrator = FALSE,
    //     ?string $username = NULL,
    //     ?string $firstname = NULL,
    //     ?string $lastname = NULL,
    //     ?string $email = NULL,
    //     ?string $mobile = NULL,
    //     ?string $password = NULL,
    //     ?DateTime $created_at = NULL,
    //     ?DateTime $updated_at = NULL,
    //     ?DateTime $confirmed_at = NULL
    // ) {
    //     $this->id_user = $id_user;
    //     $this->isAdministrator = $isAdministrator;
    //     $this->username = $username;
    //     $this->firstname = $firstname;
    //     $this->lastname = $lastname;
    //     $this->email = $email;
    //     $this->mobile = $mobile;
    //     $this->password = $password;
    //     $this->created_at = $created_at;
    //     $this->updated_at = $updated_at;
    //     $this->confirmed_at = $confirmed_at;
    // }

    // * Setter et getter de l'attribut $id_user
    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }
    public function getIdUser(): int
    {
        return $this->id_user;
    }
    // * Setter et getter de l'attribut $isAdministrator
    public function setIsAdministrator(bool $isAdministrator): void // void pour expliciter que le setter ne retourne rien
    {
        $this->isAdministrator = $isAdministrator;
    }
    public function getIsAdministrator(): bool
    {
        return $this->isAdministrator;
    }

    // * Setter et getter de l'attribut $username
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
    public function getUsername(): string
    {
        return $this->username;
    }

    // * Setter et getter de l'attribut $firstname
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    // * Setter et getter de l'attribut $lastname
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }

    // * Setter et getter de l'attribut $email
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    // * Setter et getter de l'attribut $mobile
    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }
    public function getMobile(): string
    {
        return $this->mobile;
    }

    // * Setter et getter de l'attribut $password
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    // * Setter et getter de l'attribut $created_at
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->created_at = $createdAt;
    }
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    // * Setter et getter de l'attribut $updated_at
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updated_at = $updatedAt;
    }
    public function getUpdatedAt(): DateTime
    {
        return $this->updated_at;
    }

    // * Setter et getter de l'attribut $confirmed_at
    public function setConfirmedAt(?DateTime $confirmedAt): void
    {
        $this->confirmed_at = $confirmedAt;
    }
    public function getConfirmedAt(): ?DateTime
    {
        return $this->confirmed_at;
    }

    // ! méthodes

    // * Method to display users' list
    /**
     * Method to display users' list
     * @return array objects array
     */
    public static function getAll(): array
    {
        $pdo = Database::connect();

        $sql = 'SELECT *
        FROM `users`;';

        $sth = $pdo->query($sql); // the query method prepare and execute in same time provided there are no markers

        $datas = $sth->fetchAll(PDO::FETCH_OBJ); // return objects thanks to FETCH_OBJ (by default it's associative indexed array)

        return $datas;
    }

    // * méthode insert
    /**
     * Method to insert new user (sign up)
     * @return bool True if the insert has worked
     */
    public function insert(): bool
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `users`
        (`username`, `firstname`, `lastname`, `email`, `mobile`, `password`)
        VALUES
        (:username, :firstname, :lastname, :email, :mobile, :password);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':username', $this->getUsername());
        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':email', $this->getEmail());
        $sth->bindValue(':mobile', $this->getMobile());
        $sth->bindValue(':password', $this->getPassword());

        $sth->execute();

        if ($sth->rowCount() <= 0) {
            throw new Exception('Erreur lors de l\'enregistrement de l\'utilisateur');
        } else {
            return true;
        }
    }

    // * method isExist
    /**
     * Method to test if the data already exists
     * @param mixed $email
     * 
     * @return bool True if the data exists already
     */
    public static function isExist($email): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_user`) AS "count"
        FROM `users`
        WHERE `email` = :email;';

        $sth = $pdo->prepare($sql);

        // $sth->bindValue(':username', $username);
        // $sth->bindValue(':firstname', $firstname);
        // $sth->bindValue(':lastname', $lastname);
        $sth->bindValue(':email', $email);
        // $sth->bindValue(':mobile', $mobile);

        $sth->execute();

        $rowCount = $sth->fetchColumn(); // to have number of lignes wich are corresponding themself

        return $rowCount > 0;
    }

    // * method getByMail
    public static function getByMail(?string $email): false|object
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM users 
        WHERE email = :email;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':email', $email);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    // * method delete
    public static function delete(int $id_user): bool
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `users`
                    WHERE `id_user` = :id_user;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }
}
