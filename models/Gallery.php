<?php
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../helpers/connect.php');

class Gallery
{
    // * attributs
    private bool $isAdministrator;
    private string $identifiant;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $mobile;
    private string $password;
    private DateTime $created_at;
    private DateTime $updated_at;
    private ?DateTime $confirmed_at = NULL;

    // * Setter et getter de l'attribut $isAdministrator
    public function setIsAdministrator(bool $isAdministrator): void // void pour expliciter que le setter ne retourne rien
    {
        $this->isAdministrator = $isAdministrator;
    }
    public function getIsAdministrator(): bool
    {
        return $this->isAdministrator;
    }

    // * Setter et getter de l'attribut $identifiant
    public function setIdentifiant(string $identifiant): void
    {
        $this->identifiant = $identifiant;
    }
    public function getIdentifiant(): string
    {
        return $this->identifiant;
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
}
