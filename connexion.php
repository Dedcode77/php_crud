<?php
        
        $servername = 'localhost';
        $database = 'crud_php';
        $username = 'root';
        $password = '';
        
        //On établit la connexion
        $conn = new mysqli( $database,$servername, $username, $password);
        
        //On vérifie la connexion
        if($conn->connect_error){
            die('Erreur : ' .$conn->connect_error);
        }
        echo 'Connexion réussie';
    
?>