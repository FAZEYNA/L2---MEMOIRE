<?php
    //Les Paramétres de connexion
    define('SERVEUR', 'localhost');
    define('DB_NAME', 'l2_memoires');
    define('USER', 'root');
    define('PASSWORD', '');

    //Définir le Domain Server Name
    $dsn = 'mysql:host='.SERVEUR.';dbname='.DB_NAME.';charset=utf8';
    //Option de POO pour la gestion des erreurs
    $tabOptions = array( 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION /**/
    ); 

    //Création d'instance POO
    try
    {
        $ds = new PDO($dsn,USER,PASSWORD, $tabOptions);
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }

?>