<?php
class Encryptator {
    public function encrypt(User $user) {
        $finalPassword = substr($user->getUsername(), 0, 1) 
            . $user->getPassword() 
            . substr($user->getUsername(), -1);
        $hashedPassword = sha1($finalPassword);

        return $hashedPassword;
    }
}