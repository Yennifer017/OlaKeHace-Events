<?php class UserDB{

    private $valitator;

    public function __construct(){
        $this->valitator = new UserValitator();
    }

    public function recoveryCredentials(User $user, $conn){
        $sql = 'SELECT * FROM user WHERE username = :username AND password = :pass LIMIT 1;';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':pass', $user->getPassword());
        $stmt->execute();

        // Recupera los datos como un arreglo asociativo
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            if($result['active'] != 1 ){
                throw new InvalidCredentialsEx();
            }
            $user->setRol($result['rol']);
            $user->setId($result['id']);
            $user->setPassword('Nothing here');
            return $user;
        } else {
            throw new InvalidCredentialsEx();
        }
    }

    public function createPublicator(Publicator $publicator, $conn){
        if($this->valitator->validatePublicator($publicator)){
            $sql = 'CALL insert_publicator(:username, :password, :email, :firstname, :lastname);';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':username', $publicator->getUsername());
            $stmt->bindValue(':password', $publicator->getPassword());
            $stmt->bindValue(':email', $publicator->getEmail());
            $stmt->bindValue(':firstname', $publicator->getFirstname());
            $stmt->bindValue(':lastname', $publicator->getLastname());
            
            if ($stmt->execute()) {
                // Recuperar el valor devuelto
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $idRecovered = $result['id_user'];
                    $publicator->setId($idRecovered);
                    return $publicator;
                } else {
                    throw new Exception("Error al recuperar el ID del publicador");
                }
            } else {
                throw new InvalidDataEx("Datos inválidos");
            }
        } else {
            throw new InvalidDataFormatEx();
        }
    }

    public function createViewer(Viewer $viewer, $conn){
        if($this->valitator->validateViewer($viewer)){
            $sql = 'CALL insert_viewer(:username, :password, :email, :firstname, :lastname, :birthday);';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':username', $viewer->getUsername());
            $stmt->bindValue(':password', $viewer->getPassword());
            $stmt->bindValue(':email', $viewer->getEmail());
            $stmt->bindValue(':firstname', $viewer->getFirstname());
            $stmt->bindValue(':lastname', $viewer->getLastname());
            $stmt->bindValue(':birthday', $viewer->getBirthday());
            
            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $idRecovered = $result['id_user'];
                    $viewer->setId($idRecovered);
                    return $viewer;
                } else {
                    throw new Exception("Error al recuperar el ID del publicador");
                }
            } else {
                throw new InvalidDataEx("Datos inválidos");
            }
        } else {
            throw new InvalidDataFormatEx();
        }
    }

}
?>