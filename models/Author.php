<?php

class Author
{
    /* $name, $nacionality, $date_birth, $state; */
    private $idauthor, $name, $nacionality, $date_birth, $state;

    public function __construct($idauthor, $name, $nacionality, $date_birth, $state)
    {
        $this->idauthor = $idauthor;
        $this->name = $name;
        $this->nacionality = $nacionality;
        $this->date_birth = $date_birth;
        $this->state = $state;
    }
    /**
     * Get the value of idauthor
     */
    public function getIdauthor()
    {
        return $this->idauthor;
    }

    /**
     * Set the value of idauthor
     *
     * @return  self
     */
    public function setIdauthor($idauthor)
    {
        $this->idauthor = $idauthor;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of nacionality
     */
    public function getNacionality()
    {
        return $this->nacionality;
    }

    /**
     * Set the value of nacionality
     *
     * @return  self
     */
    public function setNacionality($nacionality)
    {
        $this->nacionality = $nacionality;

        return $this;
    }

    /**
     * Get the value of date_birth
     */
    public function getDateBirth()
    {
        return $this->date_birth;
    }

    /**
     * Set the value of date_birth
     *
     * @return  self
     */
    public function setDateBirth($date_birth)
    {
        $this->date_birth = $date_birth;

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
    // Implementamos el constructor
    public static function all()
    {
        $list = [];
        $db = Connection::getConnection();
        $result = $db->query("SELECT * FROM author a WHERE a.state = '1'");
        Connection::closeConnection();
        foreach ($result->fetchAll() as $value) {
            $list[] = new Author($value['idauthor'], $value['name'], $value['nacionality'], $value['date_birth'], $value['state']);
        }
        return $list;
    }
    public static function find($id)
    {
        $db = Connection::getConnection();
        $result = $db->query("SELECT * FROM author a WHERE a.idauthor = $id");
        Connection::closeConnection();
        return $result->fetchObject();
    }
    /** 
     * * @param string $name nombre de la categoria
     * OK.
     */
    public static function insert($name, $nacionality, $date_birth)
    {
        $db = Connection::getConnection();
        $sql = "INSERT INTO author (name,nacionality,date_birth,state) VALUES ('$name','$nacionality','$date_birth','1')";

        $result = $db->query($sql);
    }
    /** 
     * * @param string $name nombre de la categoria
     * * @param integer $idcategory id de la categoria
     */
    public static function update($idauthor, $name, $nacionality, $date_birth)
    {
        $db = Connection::getConnection();
        $sql = "UPDATE author SET name='$name',nacionality='$nacionality',date_birth='$date_birth' WHERE idauthor= " . $idauthor . ";";
        $result = $db->query($sql);
    }
    /**
     * * @param integer $idcategory id de la categoria
     */
    public static function delete($idauthor)
    {
        $db = Connection::getConnection();
        $result = $db->query("UPDATE author SET state='0' WHERE idauthor=" . $idauthor . ";");
    }
}
