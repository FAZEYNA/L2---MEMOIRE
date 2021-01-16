<?php 
    include_once "header.php"; 
    require_once "models/domaine.php"; 
    $domaines = getDomaines();
?> 


<div class="container"> <!--Mon contenu-->
    <div class="row bg-dark text-white">
        <div class="col-md-4 col-sm-4 col-lg-4 mt-2">
            <p><img src="/COURS/PHP_L2/L2_memoire/public/images/recherche.jpg" alt="image de recherche" width="40%"></p>
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
    <div class="row">
        <div class="card col-md-12">
            <div class="card-header">
                <div class="row">
                    <span class="h2 text-primary">Nos Domaines</span>
                </div>
            </div>
            <div class="card-body">
                <?php foreach($domaines as $dom) {?>
                    <button class="btn btn-outline-info btn-lg shadow-none"><?= $dom['nomDomaine']?></button> <!--a remplir plus tard avec la bd -->
                <?php }?>
            </div>
        </div>
    </div>
</div>        

</body>
</html>