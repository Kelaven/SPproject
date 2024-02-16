<?php

class Comment
{
    // * Attributes
    private ?int $id_comment;
    private ?string $text;
    private ?DateTime $created_at;
    private ?DateTime $confirmed_at;
    private ?DateTime $deleted_at;
    private ?int $id_gallery;
    private ?int $id_user;

    // * Magic method construct
    public function __construct(
        ?int $id_comment = null,
        ?string $text = null,
        ?DateTime $created_at = null,
        ?DateTime $confirmed_at = null,
        ?DateTime $deleted_at = null,
        ?int $id_gallery = null,
        ?int $id_user = null
    ) {
        $this->id_comment = $id_comment;
        $this->text = $text;
        $this->created_at = $created_at;
        $this->confirmed_at = $confirmed_at;
        $this->deleted_at = $deleted_at;
        $this->id_gallery = $id_gallery;
        $this->id_user = $id_user;
    }

    // Setter et getter pour id_comment
    public function setIdComment(?int $id_comment): void
    {
        $this->id_comment = $id_comment;
    }
    public function getIdComment(): ?int
    {
        return $this->id_comment;
    }

    // Setter et getter pour text
    public function setText(?string $text): void
    {
        $this->text = $text;
    }
    public function getText(): ?string
    {
        return $this->text;
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

    // Setter et getter pour confirmed_at
    public function setConfirmedAt(?DateTime $confirmed_at): void
    {
        $this->confirmed_at = $confirmed_at;
    }
    public function getConfirmedAt(): ?DateTime
    {
        return $this->confirmed_at;
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

    // Setter et getter pour id_user
    public function setIdUser(?int $id_user): void
    {
        $this->id_user = $id_user;
    }
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }


    // ! Methods

    // * Method to display comments' list
    /**
     * Method to display comments' list
     * @return array objects array
     */
    public static function getAll(bool $archive = false): array
    {
        $pdo = Database::connect();

        $sql = 'SELECT `comments` . *, `galleries`.`name` AS gallery_name, `users`.`username` AS user_username
        FROM `comments`
        JOIN `galleries` ON `comments`.`id_gallery` = `galleries`.`id_gallery`
        LEFT JOIN `users` ON `comments`.`id_user` = `users`.`id_user`';
        $sql .= ' WHERE 1 = 1';

        if ($archive === false) {
            $sql .= ' AND `comments`.`deleted_at` IS NULL'; // is the column is NULL, don't display at list.php
        } else {
            $sql .= ' AND `comments`.`deleted_at` IS NOT NULL';
        }

        $sth = $pdo->query($sql); // the query method prepare and execute in same time provided there are no markers

        $datas = $sth->fetchAll(PDO::FETCH_OBJ); // return objects thanks to FETCH_OBJ (by default it's associative indexed array)

        return $datas;
    }

    // * Method to confirm a comment
    public static function confirm(int $id_comment)
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `comments`
        SET `confirmed_at` = NOW()
        WHERE `id_comment` = :id_comment;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_comment', $id_comment, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }


    // *  method archive
    /**
     * metho to archive a comment
     * @param int $toArchive
     * 
     * @return bool if execute workd
     */
    public static function archive(int $toArchive): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `comments` 
            SET `deleted_at` = NOW()
            WHERE `id_comment` = :id_comment;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_comment', $toArchive, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    // * method unarchive
    /**
     * metho to unarchive a comment
     * @param int $archive
     * 
     * @return bool true if execute works
     */
    public static function unarchive(int $archive): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `comments`
            SET `deleted_at` = NULL
            WHERE `id_comment` = :id_comment;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_comment', $archive, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    // * method delete
    public static function delete(int $id_comment): bool
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `comments`
                WHERE `id_comment` = :id_comment;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_comment', $id_comment, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    // * Method to insert new comment
    /**
     * Method to insert new comment
     * @return bool true if comment works
     */
    public function insert(): bool
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `comments`
        (`text`, `id_gallery`, `id_user`)
        VALUES (:text, :id_gallery, :id_user);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':text', $this->getText());
        $sth->bindValue(':id_gallery', $this->getIdGallery());
        $sth->bindValue(':id_user', $this->getIdUser());

        $sth->execute();

        if ($sth->rowCount() <= 0) {
            throw new Exception('Erreur lors de l\'enregistrement du commentaire');
        } else {
            return true;
        }
    }


}
