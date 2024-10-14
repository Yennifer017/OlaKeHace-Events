<?php class UserValitator{
    public function validatePublicator(Publicator $publicator){
        return !empty($publicator->getFirstname())
            && !empty($publicator->getLastname())
            && !empty($publicator->getUsername()) && 
                ( strlen($publicator->getUsername()) >= 8 ) && ( strlen($publicator->getUsername()) <= 16 )
            && !empty($publicator->getPassword()) && 
                ( strlen($publicator->getPassword()) >= 8 ) && ( strlen($publicator->getPassword()) <= 8 )
            && filter_var($publicator->getEmail(), FILTER_VALIDATE_EMAIL);
    }

    public function validateViewer(Viewer $viewer){
        return !empty($viewer->getFirstname())
            && !empty($viewer->getLastname())
            && !empty($viewer->getUsername()) && 
                ( strlen($viewer->getUsername()) >= 8 ) && ( strlen($viewer->getUsername()) <= 16 )
            && !empty($viewer->getPassword()) && 
                ( strlen($viewer->getPassword()) >= 8 ) && ( strlen($viewer->getPassword()) <= 16 )
            && !empty($viewer->getBirthday)
            && filter_var($viewer->getEmail(), FILTER_VALIDATE_EMAIL);
    }
}