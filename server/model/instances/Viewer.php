<?php

class Viewer extends User {

    private $birthday;

    public function __construct(
        $id, 
        $username, 
        $password, 
        $firstname, 
        $lastname,
        $email, 
        $birthday
    ) {
        parent::__construct($id, $username, $password, 
            User::VIEWER_ROL, $firstname, $lastname, $email);
        $this->birthday = $birthday;
    }

    // getters
    public function getBirthday() {
        return $this->birthday;
    }

    // setters
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

}
