<?php

class Category
{
    private $idcategory, $name;
    // Implementamos el constructor
    public function __construct($idcategory, $name)
    {
        $this->idcategory = $idcategory;
        $this->name = $name;
    }

    public static function all()
    {
        $list = [];
        $db = Connection::getConnection();
        $result = $db->query("SELECT * FROM category c WHERE c.state = '1'");
        Connection::closeConnection();   
        foreach ($result->fetchAll() as $value) {
            $list[] = new Category($value['idcategory'], $value['name']);
        }
        
        return $list;
    }
    public static function find($id)
    {
        $db = Connection::getConnection();
        $result = $db->query("SELECT * FROM category c WHERE c.idcategory = $id");
        Connection::closeConnection();
        return $result->fetchObject();;
    }
    /** 
     * * @param string $name nombre de la categoria
     * OK.
     */
    public static function insert($name)
    {
        $db = Connection::getConnection();
        $sql = "INSERT INTO category (name, state) VALUES ('$name','1')";
        $result = $db->query($sql);
    }
    /** 
     * * @param string $name nombre de la categoria
     * * @param integer $idcategory id de la categoria
     */
    public static function update($idcategory, $name)
    {
        $db = Connection::getConnection();
        $sql = "UPDATE category SET name='$name' WHERE idcategory= " . $idcategory . ";";
        $result = $db->query($sql);
    }
    /**
     * * @param integer $idcategory id de la categoria
     */
    public static function delete($idcategory)
    {
        $db = Connection::getConnection();
        $result = $db->query("UPDATE category SET state='0' WHERE idcategory=" . $idcategory . ";");
    }

    /**
     * Get the value of idcategory
     */
    public function getIdcategory()
    {
        return $this->idcategory;
    }

    /**
     * Set the value of idcategory
     *
     * @return  self
     */
    public function setIdcategory($idcategory)
    {
        $this->idcategory = $idcategory;

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
}
