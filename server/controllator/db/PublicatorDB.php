<?php 
class PublicatorDB{
    public function getAllPublications($idUser, $conn){
        $publications = [];
        $sql = 'SELECT * FROM publication WHERE id_publicator = :id_publicator;';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_publicator', $idUser);
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