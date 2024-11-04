<?php
class ViewerDB{
    public function enrroll($idUser, $idPublication, $conn){
        $sql = 'INSERT INTO assistence(id_user, id_event) VALUES (:id_user, :id_event);';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_user', $idUser);
        $stmt->bindValue(':id_event', $idPublication);
        if ($stmt->execute()) {
            //muy bien
        } else {
            throw new InvalidDataEx("Datos inválidos");
        }
    }

    public function getEnrollEvents($idUser, $conn){
        $publications = [];
        $sql = 'SELECT publication.id, publication.name, publication.details 
            FROM assistence 
            JOIN publication ON assistence.id_event = publication.id 
            WHERE assistence.id_user = :id_user';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_user', $idUser);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Recuperar todas las filas

        if ($results) {
            foreach ($results as $result) {
                $event = new Publication();
                $event->setId($result['id']);
                $event->setName($result['name']);
                $event->setDetails($result['details']);
                $publications[] = $event;
            }
            return $publications;
        } 
        return $publications;
    }
    
}