<?php

class Viewer extends User {

    private $birthday;
    private $typePublic;

    public function __construct($birthday, $typePublic) {
        $this->birthday = $birthday;
        $this->typePublic = $typePublic;
    }

    // getters
    public function getBirthday() {
        return $this->birthday;
    }

    public function getTypePublic() {
        return $this->typePublic;
    }

    // setters
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function setTypePublic($typePublic) {
        $this->typePublic = $typePublic;
    }
}
