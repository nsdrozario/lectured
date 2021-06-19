<?php

class User {
    private $username;
    private $usertype;
    public $id;
    public function __construct($usr, $type, $id) {
        $username = $usr;
        $password = $pass;
        $usertype = $type;
        $this->$id  = $id;
    }
    
    public function identifier() {
        return "[$id]:$username";
    }
}

function login(&$user, $password) {
    /* return true if able to login, modifying the user object as necessary*/
}

?>