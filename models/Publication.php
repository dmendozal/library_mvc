<?php

class Publication
{
    //Publicacion
    private $idpublication, $description, $date_publication, $fkidusers, $fkidbook, $state;
    //Usuario
    private $users_username;
    //Libro
    private $book_title, $book_image, $book_likes, $book_stock;
    public function __construct($idpublication, $description, $date_publication, $fkidusers, $fkidbook, $state, $users_username, $book_title, $book_image, $book_likes, $book_stock)
    {
        $this->idpublication = $idpublication;
        $this->description = $description;
        $this->date_publication = $date_publication;
        $this->fkidusers = $fkidusers;
        $this->fkidbook = $fkidbook;
        $this->state = $state;
        $this->users_username = $users_username;
        $this->book_title = $book_title;
        $this->book_image = $book_image;
        $this->book_likes = $book_likes;
        $this->book_stock = $book_stock;
    }

    public static function all()
    {
        $list = [];
        $db = Connection::getConnection();
        $result = $db->query("SELECT p.idpublication,p.description,p.date_publication,p.fkidusers,p.fkidbook,p.state,u.user_name as users_username,b.title as book_title,b.image as book_image,b.likes as book_likes,b.stock as book_stock 
                              FROM publication p, book b, users u 
                              WHERE p.fkidbook = b.idbook and p.fkidusers=u.idusers and  p.state = '1'");
        Connection::closeConnection();
        foreach ($result->fetchAll() as $value) {
            $list[] = new Publication(
                $value['idpublication'],
                $value['description'],
                $value['date_publication'],
                $value['fkidusers'],
                $value['fkidbook'],
                $value['state'],
                $value['users_username'],
                $value['book_title'],
                $value['book_image'],
                $value['book_likes'],
                $value['book_stock']
            );
        }
        return $list;
    }
    public static function find($id)
    {
        $db = Connection::getConnection();
        $result = $db->query("SELECT * FROM publication p WHERE p.idpublication = $id");
        Connection::closeConnection();
        return $result->fetchObject();
    }
    /** 
     * * @param string $name nombre de la categoria
     * OK.
     */
    public static function insert($description, $fkidusers, $fkidbook)
    {
        $db = Connection::getConnection();
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO publication (description,date_publication,fkidusers,fkidbook,state) VALUES ('$description','$date',$fkidusers,$fkidbook,'1')";
        $result = $db->query($sql);
    }
    /** 
     * * @param string $name nombre de la categoria
     * * @param integer $idcategory id de la categoria
     */
    public static function update($idpublication, $description)
    {
        $db = Connection::getConnection();
        $sql = "UPDATE publication SET description='$description' WHERE idpublication= " . $idpublication . ";";
        $result = $db->query($sql);
    }
    /**
     * * @param integer $idcategory id de la categoria
     */
    public static function delete($idpublication)
    {
        $db = Connection::getConnection();
        $result = $db->query("UPDATE publication SET state='0' WHERE idpublication=" . $idpublication . ";");
    }

    /**
     * Get the value of idpublication
     */
    public function getIdpublication()
    {
        return $this->idpublication;
    }

    /**
     * Set the value of idpublication
     *
     * @return  self
     */
    public function setIdpublication($idpublication)
    {
        $this->idpublication = $idpublication;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of date_publication
     */
    public function getDatePublication()
    {
        return $this->date_publication;
    }

    /**
     * Set the value of date_publication
     *
     * @return  self
     */
    public function setDatePublication($date_publication)
    {
        $this->date_publication = $date_publication;

        return $this;
    }

    /**
     * Get the value of fkidusers
     */
    public function getFkidusers()
    {
        return $this->fkidusers;
    }

    /**
     * Set the value of fkidusers
     *
     * @return  self
     */
    public function setFkidusers($fkidusers)
    {
        $this->fkidusers = $fkidusers;

        return $this;
    }

    /**
     * Get the value of fkidbook
     */
    public function getFkidbook()
    {
        return $this->fkidbook;
    }

    /**
     * Set the value of fkidbook
     *
     * @return  self
     */
    public function setFkidbook($fkidbook)
    {
        $this->fkidbook = $fkidbook;

        return $this;
    }

    /**
     * Get the value of state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of users_username
     */
    public function getUsersUsername()
    {
        return $this->users_username;
    }

    /**
     * Set the value of users_username
     *
     * @return  self
     */
    public function setUsersUsername($users_username)
    {
        $this->users_username = $users_username;

        return $this;
    }

    /**
     * Get the value of book_title
     */
    public function getBookTitle()
    {
        return $this->book_title;
    }

    /**
     * Set the value of book_title
     *
     * @return  self
     */
    public function setBookTitle($book_title)
    {
        $this->book_title = $book_title;

        return $this;
    }

    /**
     * Get the value of book_image
     */
    public function getBookImage()
    {
        return $this->book_image;
    }

    /**
     * Set the value of book_image
     *
     * @return  self
     */
    public function setBookImage($book_image)
    {
        $this->book_image = $book_image;

        return $this;
    }

    /**
     * Get the value of book_likes
     */
    public function getBookLikes()
    {
        return $this->book_likes;
    }

    /**
     * Set the value of book_likes
     *
     * @return  self
     */
    public function setBookLikes($book_likes)
    {
        $this->book_likes = $book_likes;

        return $this;
    }

    /**
     * Get the value of book_stock
     */
    public function getBookStock()
    {
        return $this->book_stock;
    }

    /**
     * Set the value of book_stock
     *
     * @return  self
     */
    public function setBookStock($book_stock)
    {
        $this->book_stock = $book_stock;

        return $this;
    }
}
