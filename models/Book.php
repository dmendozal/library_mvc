<?php

class Book
{
    /* $idbook, $title,$stock,$likes,$image,$year,$fkidcategory,$fkidauthor, $state; */

    private $idbook, $title, $stock, $likes, $image, $year, $fkidcategory, $fkidauthor, $state, $category_name, $author_name;

    public function __construct($idbook, $title, $stock, $likes, $image, $year, $fkidcategory, $fkidauthor, $state, $author_name, $category_name)
    {
        $this->idbook = $idbook;
        $this->title = $title;
        $this->stock = $stock;
        $this->likes = $likes;
        $this->image = $image;
        $this->year = $year;
        $this->fkidcategory = $fkidcategory;
        $this->fkidauthor = $fkidauthor;
        $this->state = $state;
        $this->author_name = $author_name;
        $this->category_name = $category_name;
    }

    /**
     * Get the value of idbook
     */
    public function getIdbook()
    {
        return $this->idbook;
    }

    /**
     * Set the value of idbook
     *
     * @return  self
     */
    public function setIdbook($idbook)
    {
        $this->idbook = $idbook;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of likes
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set the value of likes
     *
     * @return  self
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of fkidcategory
     */
    public function getFkidcategory()
    {
        return $this->fkidcategory;
    }

    /**
     * Set the value of fkidcategory
     *
     * @return  self
     */
    public function setFkidcategory($fkidcategory)
    {
        $this->fkidcategory = $fkidcategory;

        return $this;
    }

    /**
     * Get the value of fkidauthor
     */
    public function getFkidauthor()
    {
        return $this->fkidauthor;
    }

    /**
     * Set the value of fkidauthor
     *
     * @return  self
     */
    public function setFkidauthor($fkidauthor)
    {
        $this->fkidauthor = $fkidauthor;

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
    /* $idbook, $title, $description,$stock,$likes,$image,$year,$fkidcategory,$fkidauthor, $state; */

    public static function all()
    {
        $list = [];
        $db = Connection::getConnection();
        $result = $db->query("SELECT b.idbook,b.title,b.stock,b.likes,b.image,b.year,b.fkidcategory,b.fkidauthor,b.state,a.name as author_name,c.name as category_name
                                FROM book b, category c, author a 
                                WHERE b.fkidcategory = c.idcategory and b.fkidauthor=a.idauthor and  b.state = '1'");
        Connection::closeConnection();
        foreach ($result->fetchAll() as $value) {

            $list[] = new Book(
                $value['idbook'],
                $value['title'],
                $value['stock'],
                $value['likes'],
                $value['image'],
                $value['year'],
                $value['fkidcategory'],
                $value['fkidauthor'],
                $value['state'],
                $value['author_name'],
                $value['category_name']
            );
        }

        return $list;
    }
    public function toLikeOnBook($idbook)
    {
        $db = Connection::getConnection();
        $result = $db->query("SELECT likes
                              FROM book 
                              WHERE idbook = $idbook");
        $likes = $result->fetchObject()->likes;
        $likes++;
        $db->query("UPDATE book SET likes=$likes WHERE idbook=" . $idbook . ";");
    }
    public static function find($id)
    {
        $db = Connection::getConnection();
        $result = $db->query("SELECT b.idbook,b.title,b.stock,b.likes,b.image,b.year,b.fkidcategory,b.fkidauthor,b.state,a.name as author_name,c.name as category_name 
                              FROM book b,category c, author a 
                              WHERE b.fkidcategory = c.idcategory and b.fkidauthor=a.idauthor and b.idbook = $id");
        Connection::closeConnection();
        return $result->fetchObject();
    }
    /** 
     * * @param string $name nombre de la categoria
     * OK.
     */
    public static function insert($title, $stock, $image, $year, $fkidcategory, $fkidauthor)
    {
        $db = Connection::getConnection();
        $sql = "INSERT INTO book (title,stock,likes,image,year,fkidcategory,fkidauthor,state) VALUES ('$title',$stock,0,'$image',$year,$fkidcategory,$fkidauthor,'1')";
        $result = $db->query($sql);
    }
    /** 
     * * @param string $name nombre de la categoria
     * * @param integer $idcategory id de la categoria
     */
    public static function update($idbook, $title, $stock, $image, $year, $fkidcategory, $fkidauthor)
    {
        $db = Connection::getConnection();
        
        $sql = "UPDATE book SET title='$title',stock=$stock,image='$image',year=$year,fkidcategory=$fkidcategory,fkidauthor=$fkidauthor WHERE idbook= " . $idbook . ";";

        $result = $db->query($sql);
    }
    /**
     * * @param integer $idcategory id de la categoria
     */
    public static function delete($idbook)
    {
        $db = Connection::getConnection();
        $result = $db->query("UPDATE book SET state='0' WHERE idbook=" . $idbook . ";");
    }

    /**
     * Get the value of category_name
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * Set the value of category_name
     *
     * @return  self
     */
    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;

        return $this;
    }

    /**
     * Get the value of author_name
     */
    public function getAuthorName()
    {
        return $this->author_name;
    }

    /**
     * Set the value of author_name
     *
     * @return  self
     */
    public function setAuthorName($author_name)
    {
        $this->author_name = $author_name;

        return $this;
    }
}
