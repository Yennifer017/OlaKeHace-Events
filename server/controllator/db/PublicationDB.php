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

    public function getPendingAprovedPublicactions($conn){
        $publications = [];
        $sql = "SELECT * FROM publication WHERE publication.aprobed = false";
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
        } 
        return $publications;
    }

    public function getOnePublication($id, $conn){
        $id = (int) $id;
        $sql = 'SELECT * FROM publication WHERE id = :id_publication;';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_publication', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Publication(
            $result['id'], $result['region'], $result['place'], 
            $result['date'], $result['hour'], $result['cupo'], 
            $result['type_public'], $result['details'], $result['url'], 
            $result['name']
        );
    }

    public function aprovePublication($id, $conn){
        $id = (int) $id;
        $sql = 'UPDATE publication SET aprobed = TRUE WHERE id = :id_publication';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_publication', $id, PDO::PARAM_INT);
        if ( !($stmt->execute()) ) {
            throw new NoUpdateEx();
        }
    }

    public function addPublication(Publication $publication, $conn, $idPublicator){
        $sql = "INSERT INTO publication(
                region,
                place,
                id_publicator,
                date,
                hour,
                cupo, 
                type_public,
                details,
                url,
                name
            ) VALUES (
                :region,
                :place,
                :id_publicator,
                :date_init,
                :hour_init,
                :cupo,
                :type_public,
                :details, 
                :link,
                :name_publication
            );";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':region', $publication->getRegion());
        $stmt->bindValue(':place', $publication->getPlace());
        $stmt->bindValue(':id_publicator', $idPublicator);
        $stmt->bindValue(':date_init', $publication->getDate());
        $stmt->bindValue(':hour_init', $publication->getHour());
        $stmt->bindValue(':cupo', $publication->getCupo());
        $stmt->bindValue(':type_public', $publication->getTypePublic());
        $stmt->bindValue(':details', $publication->getDetails());
        $stmt->bindValue(':link', $publication->getUrl());
        $stmt->bindValue(':name_publication', $publication->getName());
        if ($stmt->execute()) {
            //muy bien
        } else {
            throw new InvalidDataEx("Datos inválidos");
        }
    }

}
