<?php
class Session {
    private const PASS_PHRASE = '-----i-amnt-the-best------';
    public const SESSION_COOKIE_NAME = 'session';
    private const SEPARATOR = ',';
    public const USERNAME_COOKIE_NAME = "username";

    public function setSessionCookie(User $user){
        $random = rand(0, 10000);
        $cookie = $user->getId() . Session::SEPARATOR . $user->getRol() . Session::SEPARATOR . $random;
        $cookie = $this->makeup_data($cookie);
        $this->set_cookie(Session::SESSION_COOKIE_NAME, $cookie);
    }

    public function set_cookie($name, $value){
        $expiracion = time() + (86400 * 30);
        setcookie($name, $value, $expiracion, "/");
    }

    private function makeup_data($data) {
        $method = 'aes-256-cbc'; // Método de cifrado
        $key = hash('sha256', Session::PASS_PHRASE, true);
        $iv = openssl_random_pseudo_bytes(16); 
        $encrypted = openssl_encrypt($data, $method, $key, 0, $iv); 
        return base64_encode($iv . $encrypted);
    }

    public function get_session_data() {
        if (isset($_COOKIE['session'])) {
            $encryptedData = $_COOKIE['session'];
            $method = 'aes-256-cbc'; // Método de cifrado
            $key = hash('sha256', Session::PASS_PHRASE, true); // Derivar la misma clave de la frase de contraseña
            $data = base64_decode($encryptedData); // Decodificar desde base64
            $iv = substr($data, 0, 16); // Extraer el IV de los primeros 16 bytes
            $encrypted = substr($data, 16); // Extraer el texto cifrado
            $data = openssl_decrypt($encrypted, $method, $key, 0, $iv); // Descifrar los datos
            try {
                $array = explode(Session::SEPARATOR, $data);

                return new User($array[0], '', '', $array[1]);

            } catch (Exception $e) {
                return null;
            }
        } else {
            return null;
        }
    }
    
}