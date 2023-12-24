<?php

class Users
{
    private $name;
    private $password;
    private $email;

    function __construct($name, $password, $email)
    {
        $this->$name = $name;
        $this->$password = $password;
        $this->$email = $email;
    }
}

?>