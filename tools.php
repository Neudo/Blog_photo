<?php

function dbConnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=photo_blog;charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    }
    catch (Exception $exception) 
    {
        die( 'Erreur : ' . $exception->getMessage() );
    }
    return $db;
}
function checkEmailFormat($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function dateConverter($dateString){
    return ucwords(strftime("%A %d %B %G", strtotime($dateString)));
}


?>