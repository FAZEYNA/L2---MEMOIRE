<?php
    require_once 'datasource.php';

    //RETOURNE TOUS LES NOMS DE DOMAINES DANS UN TABLEAU
    function getDomaines()
    {
        $requete = 'SELECT * FROM domaine ORDER BY nomDomaine';
        global $ds; // acces a la variable ds definie dans datasource.php
        //executer la requete
        $exec = $ds->query($requete);
        //recuperation de l'execution de la requete
        $tabDomaines = $exec->fetchAll();
        return $tabDomaines;
    }


?>