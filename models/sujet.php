<?php
    require_once 'datasource.php';

    function insertSujet($libelle, $problematique, $description, $idDomaine)
    {
        global $ds; // acces a la variable ds definie dans datasource.php
       $requete = "INSERT INTO sujet(libelleSujet, description, problematique, idDomaineF) VALUES ('$libelle', '$description', '$problematique', $idDomaine)";
       return $ds->exec($requete); //1  good
    }





?>
