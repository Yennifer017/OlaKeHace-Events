<?php
class EventDB{
    public function getAssistents($idEvent, $conn){
        $users = [];
        $sql = 'SELECT user.username, user.email, user.firstname, user.lastname 
            FROM assistence 
            JOIN user ON user.id = assistence.id_user 
            WHERE assistence.id_event = :id_event;';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_event', $idEvent);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Recuperar todas las filas

        if ($results) {
            foreach ($results as $result) {
                $user = new User();
                $user->setUsername($result['username']);
                $user->setEmail($result['email']);
                $user->setFirstname($result['firstname']);
                $user->setLastname($result['lastname']);
                $users[] = $user;
            }
            return $users;
        } 
        return $users;
    }
}