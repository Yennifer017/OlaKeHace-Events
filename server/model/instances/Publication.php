<?php

class Publication {
    private $id;
    private $region;
    private $place;
    private $date;
    private $hour;
    private $cupo;
    private $typePublic;
    private $details;
    private $url;
    private $name;
    private bool $approved;
    private bool $banned;  
    private ?Category $category;

    // Constructor
    public function __construct(
        $id = -1,
        $region = '',
        $place = '',
        $date = '',
        $hour = '',
        $cupo = -1,
        $typePublic = '',
        $details = '',
        $url = '',
        $name = '',
        Category $category = null,
        $approved = false,
        $banned = false
    ) {
        $this->id = $id;
        $this->region = $region;
        $this->place = $place;
        $this->date = $date;
        $this->hour = $hour;
        $this->cupo = $cupo;
        $this->typePublic = $typePublic;
        $this->details = $details;
        $this->url = $url;
        $this->name = $name;
        $this->category = $category;
        $this->approved = $approved;
        $this->banned = $banned;
    }

    // setter
    public function getId() {
        return $this->id;
    }

    public function getRegion() {
        return $this->region;
    }

    public function getPlace() {
        return $this->place;
    }

    public function getDate() {
        return $this->date;
    }

    public function getHour() {
        return $this->hour;
    }

    public function getCupo() {
        return $this->cupo;
    }

    public function getTypePublic() {
        return $this->typePublic;
    }

    public function getDetails() {
        return $this->details;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getName() {
        return $this->name;
    }

    public function getCategory(){
        return $this->category;
    }

    public function isApproved() {
        return $this->approved;
    }

    public function isBanned() {
        return $this->banned;
    }

    // setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setRegion($region) {
        $this->region = $region;
    }

    public function setPlace($place) {
        $this->place = $place;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setHour($hour) {
        $this->hour = $hour;
    }

    public function setCupo($cupo) {
        $this->cupo = $cupo;
    }

    public function setTypePublic($typePublic) {
        $this->typePublic = $typePublic;
    }

    public function setDetails($details) {
        $this->details = $details;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    public function setApproved($approved) {
        $this->approved = $approved;
    }

    public function setBanned($banned) {
        $this->banned = $banned;
    }
}