<?php
class User {
    public const PUBLICATOR_ROL = 'PUBLICATOR';
    public const VIEWER_ROL = 'VIEWER';
    public const ADMIN_ROL = 'ADMIN';


    protected $id;
    protected $username;
    protected $password;
    protected $rol;
    protected $firstname;
    protected $lastname;
    protected $email;

    public function __construct(
        $id = -1, 
        $username = '',
         $password = '', 
         $rol = '', 
         $firstname = '', 
         $lastname = '', 
         $email = ''
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->rol = $rol;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    //getters
    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail(){
        return $this->email;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setEmail($email){
        $this->email = $email;
    }
}
