<form action="" method="POST">
    <div class="card">
        <div class="card-header bg-primary">
            <h2 class="text-white">Nouveau Sujet</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 offset-4 mb-2">
                    <select name="domaine" id="" class="form-control">
                        <option value="" selected disabled>---- Choisir un domaine ----</option>
                        <?php
                            foreach($domaines as $d) {  ?>
                                <option value="<?=$d["idDomaine"]?>"><?=$d["nomDomaine"]?></option>
                            <?php } ?>
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <span class="h4">Libelle</span>
                    <textarea class="form-control" name="libelle"></textarea>
                </div>
                <div class="col-4">
                    <span class="h4">Description</span>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="col-4">
                    <span class="h4">Problématique</span>
                    <textarea class="form-control" name="problematique"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-4 offset-5">
                <input type="submit" name="btn" value="Enregistrer" class="btn btn-primary">
            </div>
        </div>
    </div>    
</form>

<?php 
    if(isset($_POST['btn'])) 
    {
        extract($_POST);
        $resultat = insertSujet( $libelle, $description, $problematique, $domaine);
        if($resultat)
            echo "<h3 class='text-success'>Sujet ajouté avec succès !</h3>";
        else
            echo "<h3 class='text-danger'>Erreur d'ajout !</h3>";
    }
?>