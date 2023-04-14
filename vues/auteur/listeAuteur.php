<div class="container">

    <!-- Titre + btn ajout nationalité -->
    <div class="row">
        <div class="col-9">

            <h2>Listes des Auteurs</h2>
            
        </div>
        <div class="col-3">

            <a href="index.php?uc=auteurs&action=add" class="btn btn-sucess">

                <img src="image/plus.png"> Créer un Auteur
                
            </a>

        </div>
    </div>


    <br>

    <!-- FORMULAIRE -->

    <form id="formRecherche" action="index.php?uc=auteurs&action=list" method="post">

        <div class="formNat">
            <div class="row">
                    <!-- Champs Saisir libelle -->
                    <div class="col">
                        
                        <input type="text" class="form-control"  id="nom" onInput="document.getElementById('formRecherche').submit()" placeholder="Saisir le nom" name="nom"  value= "<?php echo $nom; ?>">
                        
                    </div>
                    <div class="col">
                        
                        <input type="text" class="form-control"  id="libelle" onInput="document.getElementById('formRecherche').submit()" placeholder="Saisir le prenom" name="prenom"  value= "<?php echo $prenom; ?>">
                        
                    </div>

                    <!-- Listes déroulantes des Continents -->
                    <div class="col">  
                    <select name="nationalite" class="form-control" onChange="document.getElementById('formRecherche').submit()">
                        <?php      
                            
                            echo "<option value='Tous'> Toutes les nationalites </option>";
                            foreach($lesNationalites as $nationalite){
                                
                                $selection = $nationalite->getNum() == intval($nationaliteSel) ? 'selected' : '';
                                echo "<option value='" . $nationalite->getNum() . "' ". $selection." >". $nationalite->getLibelle() ."</option>";
                                    
                            }
                        ?>  
                    </select>

                </div>

      

                <!-- BUTTON RECHERCHER-->
                <div class="col">
                    
                    <button type="submit" class="btn btn-success">Rechercher</button>
                    
                </div>
            </div>
        </div>    
    </form>
        
    <!-- AFFICHAGE  -->
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <td class="col-md-2"><strong>Numéro</strong></td>
                <td class="col-md-4"><strong>Nom</strong></td>
                <td class="col-md-3"><strong>Prenom</strong></td>
                <td class="col-md-3"><strong>Nationalites</strong></td>
                <td class="col-md-2"><strong>Actions</strong></td>
            </tr>
        </thead>
            

    <?php

        // Affichage des Nationalités

        foreach($lesAuteurs as $auteur){
            
            echo "<tr>";
            echo "<td>$auteur->numero</td>";
            echo "<td>$auteur->nom</td>";
            echo "<td>$auteur->prenom</td>";
            echo "<td>$auteur->libNationalite</td>";
            echo"
                <td>

                    <a href='index.php?uc=auteurs&action=update&num=".$auteur->numero."'>
                        <img src='image/modifier.png'>
                    </a>
                    
                    <a href='#modalSupression' data-toggle='modal' data-message='Voulez-vous vraiment supprimer cette auteur ?'  data-suppression='index.php?uc=auteurs&action=delete&num=".$auteur->numero."' >
                    <img src='image/supprimer.png'>
                    </a>
                
                </td>
                </tr>
                
            ";          
                
        }
        
    ?>
</div>
