<?php

class Comments
{
    // Comentarios
    private $idcomments, $comment, $fkidusers, $fkidpublication, $date_comment, $state;
    // Usuarios
    private $users_username;
    //Publication
    private $publication_description;
    public function __construct($idcomments, $comment, $fkidusers, $fkidpublication, $date_comment, $state, $users_username, $publication_description)
    {
        $this->idcomments = $idcomments;
        $this->comment = $comment;
        $this->fkidusers = $fkidusers;
        $this->fkidpublication = $fkidpublication;
        $this->date_comment = $date_comment;
        $this->state = $state;
        $this->users_username = $users_username;
        $this->publication_description = $publication_description;
    }
    public static function getComments($fkidpublication)
    {
        $list = [];
        $db = Connection::getConnection();
        $result = $db->query("SELECT c.idcomments, c.comment, c.fkidusers, c.fkidpublication,c.date_comment, c.state, u.user_name as users_username,p.description as publication_description
                              FROM comments c, publication p, users u 
                              WHERE c.fkidpublication = p.idpublication and c.fkidusers=u.idusers and  c.state = '1' and c.fkidpublication = $fkidpublication");
        Connection::closeConnection();
        foreach ($result->fetchAll() as $value) {
            $list[] = new Comments(
                $value['idcomments'],
                $value['comment'],
                $value['fkidusers'],
                $value['fkidpublication'],
                $value['date_comment'],
                $value['state'],
                $value['users_username'],
                $value['publication_description']
            );
        }
        return $list;
    }
    public static function insert($comment, $fkidusers, $fkidpublication)
    {
        $db = Connection::getConnection();
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO comments (comment,fkidusers,fkidpublication,date_comment,state) VALUES ('$comment',$fkidusers,$fkidpublication,'$date','1')";
        $result = $db->query($sql);
    }
    public static function update($idcomments, $comment)
    {
        $db = Connection::getConnection();
        $sql = "UPDATE comments SET comment='$comment' WHERE idcomments= " . $idcomments . ";";
        $result = $db->query($sql);
    }
    public static function delete($idcomments)
    {
        $comment = Comments::find($idcomments);
        $db = Connection::getConnection();
        $result = $db->query("UPDATE comments SET state='0' WHERE idcomments=" . $idcomments . ";");
        return $comment;
    }
    public static function find($id)
    {
        $db = Connection::getConnection();
        $result = $db->query("SELECT * FROM comments c WHERE c.idcomments = $id");
        Connection::closeConnection();
        return $result->fetchObject();;
    }

    /**
     * Get the value of comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

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
     * Get the value of fkidpublication
     */
    public function getFkidpublication()
    {
        return $this->fkidpublication;
    }

    /**
     * Set the value of fkidpublication
     *
     * @return  self
     */
    public function setFkidpublication($fkidpublication)
    {
        $this->fkidpublication = $fkidpublication;

        return $this;
    }

    /**
     * Get the value of date_comment
     */
    public function getDateComment()
    {
        return $this->date_comment;
    }

    /**
     * Set the value of date_comment
     *
     * @return  self
     */
    public function setDateComment($date_comment)
    {
        $this->date_comment = $date_comment;

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
     * Get the value of publication_description
     */
    public function getPublicationDescription()
    {
        return $this->publication_description;
    }

    /**
     * Set the value of publication_description
     *
     * @return  self
     */
    public function setPublicationDescription($publication_description)
    {
        $this->publication_description = $publication_description;

        return $this;
    }

    /**
     * Get the value of idcomments
     */
    public function getIdcomments()
    {
        return $this->idcomments;
    }

    /**
     * Set the value of idcomments
     *
     * @return  self
     */
    public function setIdcomments($idcomments)
    {
        $this->idcomments = $idcomments;

        return $this;
    }
}
