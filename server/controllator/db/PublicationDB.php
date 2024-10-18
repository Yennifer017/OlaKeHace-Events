<?php class PublicationDB
{
    public function getGeneralPublications($conn){
        $publications = [];
        $sql = 'CALL get_general_events();';
        $stmt = $conn->prepare($sql);

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
        } else {
            throw new Exception("Error al recuperar los datos del publicador");
        }
    }

}
