<?php 
    include_once "header.php"; 
    require_once "models/domaine.php"; 
    require_once "models/sujet.php"; 
    $domaines = getDomaines();
?> 


<div class="container"> <!--Mon contenu-->
    <div class="row bg-dark text-white">
        <div class="col-md-4 col-sm-4 col-lg-4 mt-2">
            <a href="/COURS/PHP_L2/L2_memoire"><img src="/COURS/PHP_L2/L2_memoire/public/images/recherche.jpg" alt="image de recherche" width="40%"></a>
            <a href="" class="btn btn-outline-primary btn-lg rounded-circle shadow-none">Espace superviseur</a>
        </div>
        <div class="col-md-8 col-sm-8 col-lg-8">
            <div class="row mt-2">
                <div class="col md-6 text-center">
                    <p>FAMA ZEYNA, superviseur</p>
                </div>
                <div class="col md-6">
                    <button class="btn btn-primary btn-lg float-right">Se connecter</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Pour nous contacter : <h6>00 221 78 014 37 10</h6>
                </div>
                <div class="col-md-3 offset-3">
                    Pour nous contacter : <h6><a href="">contact@l2isi.com</a></h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md text-center">
                    <h4 class="alert alert-primary">Bienvenue ! Nous vous facilitions la recherche de votre sujet de mémoire</h4>
                </div>
            </div>
        </div>
    </div>
    <?php 
        if(isset($_GET['page']))
        {
            $p = $_GET['page'];
            if($p == "nouveauSujet")
            {
                include_once "pages/ajoutSujet.php";
            }
        }
        else
        { ?>
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-header">
                        <div class="row">
                            <span class="h2 text-primary">Nos Domaines</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php foreach($domaines as $dom) {?>
                            <button value="<?= $dom['idDomaine']?>" onclick="chargerSujet(this)" class="btn btn-outline-info btn-lg shadow-none"><?= $dom['nomDomaine']?></button> <!--à remplir plus tard avec la bd -->
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-header">
                        <div class="row">
                            <span class="h2 text-primary">
                                Sujets du domaine 
                                <span id="nomDomaine" class="text-uppercase h2"></span>
                            </span>
                            <a href="?page=nouveauSujet" class="btn btn-primary offset-7">Nouveau Sujet</a>
                        </div>
                    </div>
                    <div class="card-body" id="infoSujets">
                        
                    </div>
                </div>
            </div>
        <?php   
    }?>

</div>        
        <script>
            function chargerSujet(element)
            {
                // alert(element.value);
                $.ajax({
                    type: "get", 
                    url: "http://localhost/COURS/PHP_L2/L2_memoire/public/ajax/getSujetByDomaine.php",
                    data: {idDomaine:element.value},
                    dataType: "JSON",
                    success: function(resultat){
                        // console.log(resultat);
                        $("#infoSujets").empty();
                        if(resultat == "0")
                        {
                            // alert("Ce domaine n'a pas de sujets.");
                            $("#infoSujets").append(`<h3>Aucun sujet pour ce domaine.</h3>`);
                            $("#nomDomaine").html("");
                        }
                        else
                        {
                            // alert("OK");
                            $("#nomDomaine").html(resultat[0].nomDomaine);
                            let contenu = `
                            <table class="table table-bordered">
                                <tr>
                                    <th>Libellé</th>
                                    <th>Description</th>
                                    <th>Problématique</th>
                                </tr>`;
                            resultat.forEach(elt => 
                                {
                                    contenu += `
                                        <tr>
                                            <td>${elt.libelleSujet}</td>
                                            <td>${elt.description}</td>
                                            <td>${elt.problematique}</td>
                                        </tr>`;
                                }
                            );
                            contenu += `</table>`;
                            $("#infoSujets").append(contenu);
                        }
                    },
                    error: function(){
                        alert("erreur");
                    }
                });
            }
        </script>
        <script src="/COURS/PHP_L2/L2_memoire/public/js/jquery-3.3.1.js"></script><!--normalerweise ganz oben-->

</body>
</html>