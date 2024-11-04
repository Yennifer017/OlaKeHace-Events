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
    
}