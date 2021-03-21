
<?php

class Users
{
    private $idusers, $code, $name, $last_name, $email, $user_name, $password, $user_type, $state, $active;

    /**
     * 
     */
    public function __construct($idusers, $code, $name, $last_name, $email, $user_name, $password, $user_type, $state, $active)
    {
        $this->idusers = $idusers;
        $this->code = $code;
        $this->name = $name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->user_type = $user_type;
        $this->state = $state;
        $this->active = $active;
    }

    public static function all()
    {
        $list = [];
        $db = Connection::getConnection();
        $result = $db->query("SELECT * FROM users u WHERE u.user_type = 'E' and u.state = '1'");
        foreach ($result->fetchAll() as $value) {
            $list[] = new Users($value['idusers'], $value['code'], $value['name'], $value['last_name'], $value['email'], $value['user_name'], $value['password'], $value['user_type'], $value['state'], $value['active']);
        }
        return $list;
    }
    public static function find($id)
    {
        $db = Connection::getConnection();
        $result = $db->query("SELECT * FROM users u WHERE u.idusers = $id");
        Connection::closeConnection();
        return $result->fetchObject();
    }
    public static function insert($code, $name, $last_name, $email, $user_name, $password)
    {
        $db = Connection::getConnection();
        $sql = "INSERT INTO users (code,name,last_name,email,user_name,password,user_type,state,active) VALUES ($code,'$name','$last_name','$email','$user_name','$password','E','1','0')";
        $result = $db->query($sql);
    }

    public static function update($idusers, $code, $name, $last_name, $user_name)
    {
        $db = Connection::getConnection();
        $sql = "UPDATE users SET code=$code,name='$name',last_name='$last_name',user_name='$user_name' WHERE idusers= " . $idusers . ";";
        $result = $db->query($sql);
    }

    public static function delete($idusers)
    {
        $db = Connection::getConnection();

        $result = $db->query("UPDATE users SET state='0' WHERE idusers=" . $idusers . ";");
    }

    public static function logIn($user_name, $password)
    {
        $db = Connection::getConnection();
        $sql = "SELECT * FROM users u WHERE u.user_name='{$user_name}' and u.password='{$password}'";
        $result = $db->query($sql);
        foreach ($result->fetchAll() as $dom) {
            $idusers = $dom['idusers'];
            $result = $db->query("UPDATE users SET active='1' WHERE idusers=" . $idusers . ";");
            return true;
        }
        return false;
    }

    public static function logOut()
    {
        $db = Connection::getConnection();
        $sql = "SELECT idusers FROM users WHERE active='1'";
        $result = $db->query($sql);
        foreach ($result->fetchAll() as $dom) {
            $idusers = $dom['idusers'];
            $result = $db->query("UPDATE users SET active='0' WHERE idusers=" . $idusers . ";");
            return true;
        }
        return false;
    }
    public static function getCurrentUser()
    {
        $db = Connection::getConnection();
        $result = $db->query("SELECT * FROM users u WHERE u.active = '1'");
        Connection::closeConnection();
        return $result->fetchObject();
    }

    /**
     * Get the value of idusers
     */
    public function getIdusers()
    {
        return $this->idusers;
    }

    /**
     * Set the value of idusers
     *
     * @return  self
     */
    public function setIdusers($idusers)
    {
        $this->idusers = $idusers;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

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
     * Get the value of last_name
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of user_name
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * Set the value of user_name
     *
     * @return  self
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of user_type
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * Set the value of user_type
     *
     * @return  self
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;

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
     * Get the value of active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }
}
