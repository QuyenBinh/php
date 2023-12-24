<?php

class Users
{
    private $name;
    private $email;
    private $id;

    function __construct($id, $name, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

}

?>