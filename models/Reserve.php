<?php

class Reserve
{
    //RESERVA
    private $idreserve, $date_reserve, $fkidbook, $fkidusers, $state_reserve, $state, $description;
    //USUARIO
    private $users_fullname;
    //LIBRO
    private $book_title;
    public function __construct($idreserve, $date_reserve, $fkidbook, $fkidusers, $state_reserve, $state, $description, $users_name, $users_lastname, $book_title)
    {
        $this->idreserve = $idreserve;
        $this->date_reserve = $date_reserve;
        $this->fkidbook = $fkidbook;
        $this->fkidusers = $fkidusers;
        $this->state_reserve = $state_reserve;
        $this->state = $state;
        $this->description = $description;
        $this->users_fullname = $users_name . ' ' . $users_lastname;
        $this->book_title = $book_title;
    }

    // Implementamos el constructor
    public static function all()
    {
        $list = [];
        $db = Connection::getConnection();
        $result = $db->query("SELECT r.idreserve,r.date_reserve,r.fkidbook,r.fkidusers,r.state_reserve,r.state,r.description,u.name as users_name,u.last_name as users_lastname,b.title as book_title
                                FROM reserve r, book b, users u 
                                WHERE r.fkidbook = b.idbook and r.fkidusers=u.idusers and r.state = '1'");
        Connection::closeConnection();
        foreach ($result->fetchAll() as $value) {
            $list[] = new Reserve(
                $value['idreserve'],
                $value['date_reserve'],
                $value['fkidbook'],
                $value['fkidusers'],
                $value['state_reserve'],
                $value['state'],
                $value['description'],
                $value['users_name'],
                $value['users_lastname'],
                $value['book_title']
            );
        }
        return $list;
    }
    public static function find($id)
    {
        $db = Connection::getConnection();
        $result = $db->query(
            "SELECT r.idreserve,r.date_reserve,r.fkidbook,r.fkidusers,r.state_reserve,r.state,r.description,u.name as users_name,u.last_name as users_lastname,b.title as book_title
            FROM reserve r, book b, users u 
            WHERE r.fkidbook = b.idbook and r.fkidusers=u.idusers and r.idreserve = $id"
        );
        Connection::closeConnection();
        return $result->fetchObject();;
    }
    /** 
     * * @param string $name nombre de la categoria
     * OK.
     */
    public static function insert($description, $fkidbook, $fkidusers)
    {
        $db = Connection::getConnection();
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO reserve (date_reserve,fkidbook,fkidusers,state_reserve,state,description) VALUES ('$date',$fkidbook,$fkidusers,'1','1','$description')";
        $result = $db->query($sql);
        Connection::closeConnection();
    }
    /** 
     * * @param string $name nombre de la categoria
     * * @param integer $idcategory id de la categoria
     */
    public static function update($idreserve, $state_reserve)
    {
        $db = Connection::getConnection();
        $sql = "UPDATE reserve SET state_reserve='$state_reserve' WHERE idreserve= " . $idreserve . ";";
        $result = $db->query($sql);
    }
    /**
     * * @param integer $idcategory id de la categoria
     */
    public static function delete($idreserve)
    {
        $db = Connection::getConnection();
        $result = $db->query("UPDATE reserve SET state='0' WHERE idreserve=" . $idreserve . ";");
    }





    /**
     * Get the value of idreserve
     */
    public function getIdreserve()
    {
        return $this->idreserve;
    }

    /**
     * Set the value of idreserve
     *
     * @return  self
     */
    public function setIdreserve($idreserve)
    {
        $this->idreserve = $idreserve;

        return $this;
    }

    /**
     * Get the value of date_reserve
     */
    public function getDateReserve()
    {
        return $this->date_reserve;
    }

    /**
     * Set the value of date_reserve
     *
     * @return  self
     */
    public function setDateReserve($date_reserve)
    {
        $this->date_reserve = $date_reserve;

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
     * Get the value of state_reserve
     */
    public function getStateReserve()
    {
        return $this->state_reserve;
    }

    /**
     * Set the value of state_reserve
     *
     * @return  self
     */
    public function setStateReserve($state_reserve)
    {
        $this->state_reserve = $state_reserve;

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
     * Get the value of users_fullname
     */
    public function getUsersFullname()
    {
        return $this->users_fullname;
    }

    /**
     * Set the value of users_fullname
     *
     * @return  self
     */
    public function setUsersFullname($users_fullname)
    {
        $this->users_fullname = $users_fullname;

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
}
