<?php

class Publicator extends User{
    private $statusAccount;
    private bool $automaticPubs;
    private $countAproved;

    // Constructor
    public function __construct(
        $id, 
        $username, 
        $password, 
        $firstname, 
        $lastname, 
        $email,
        $statusAccount = 'ACTIVE', 
        $automaticPubs = false, 
        $countAproved = 0
    ) {
        parent::__construct($id, $username, $password, 
            User::PUBLICATOR_ROL, $firstname, $lastname, $email);
        $this->statusAccount = $statusAccount;
        $this->automaticPubs = $automaticPubs;
        $this->countAproved = $countAproved;
    }

    // getters
    public function getStatusAccount() {
        return $this->statusAccount;
    }

    public function isAutomaticPubs() {
        return $this->automaticPubs;
    }

    public function getCountAproved() {
        return $this->countAproved;
    }

    // setters
    public function setStatusAccount($statusAccount) {
        $this->statusAccount = $statusAccount;
    }

    public function setAutomaticPubs($automaticPubs) {
        $this->automaticPubs = $automaticPubs;
    }

    public function setCountAproved($countAproved) {
        $this->countAproved = $countAproved;
    }
}