<?php

class Report {
    private $id;
    private $id_publication;
    private $status;
    private $reason;
    private $details;

    public function __construct($id_publication = -1, $status = '', $reason = '', $details = '', $id = -1) {
        $this->id = $id;
        $this->id_publication = $id_publication;
        $this->status = $status;
        $this->reason = $reason;
        $this->details = $details;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdPublication() {
        return $this->id_publication;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getReason() {
        return $this->reason;
    }

    public function getDetails() {
        return $this->details;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdPublication($id_publication) {
        $this->id_publication = $id_publication;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setReason($reason) {
        $this->reason = $reason;
    }

    public function setDetails($details) {
        $this->details = $details;
    }
}
?>
