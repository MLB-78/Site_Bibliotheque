<div class="titreH2"> <h2> <?php echo $mode ?> un genre </h2> </div>

<br>

<!-- Formulaire genre -->

<div class="formulaire">

    <form action="index.php?uc=genres&action=valideForm" method="post" >

        <div class="form-group">
            
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="libelle"  value="<?php if($mode == "Modifier") { echo $genre->getLibelle(); } ?>">
            
        </div>
        
        <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") { echo $genre->getNum(); } ?>" >
        <div class="row">
            
            <div class="col"> 
                <a href="index.php?uc=genres&action=list" class="btn nat">Revenir à la listes</a>
                &nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-sucess btn-block"> <?php echo $mode; ?>  </button>
            </div>
            
        </div>

    </form>

</div>

