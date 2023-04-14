<div class="container">

    <h2 class="titreH2"> <?php echo $mode ?> une nationalité </h2>

    <div class="formulaire"> 
            
            <form action="index.php?uc=nationalites&action=validForm" method="post">
                <div class="form-group">
                    <label for="libelle">Libellé</label>
                    <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="libelle" value="<?php if ($mode == 'Modifier' && isset($nationalite)) {
                        echo $nationalite->getLibelle();
                    } ?>">
            </div>
            
            <!-- CONTINENT -->
            <div class="form-group">
                <label for="continent">Continent</label>
                <select name="continent" class="form-control">
                    <?php foreach ($lesContinents as $continent) {
                        $selection = '';
                        if ($mode == 'Modifier' && isset($nationalite)) {
                            $selection = $continent->getNum() == $nationalite->getContinent()->getNum() ? 'selected' : '';
                        }
                        echo "<option value='" . $continent->getNum() . "'" . $selection . ">" . $continent->getLibelle() . "</option>";
                    } ?>
                </select>
            </div>
            
            <input type="hidden" id="num" name="num" value="<?php if ($mode == 'Modifier' && isset($nationalite)) {
                echo $nationalite->getNum();
            } ?>" >
            <div class="row">
                <div class="col"> 
                    <a href="index.php?uc=nationalites&action=list" class="btn nat">Revenir à la listes</a>
                    &nbsp;&nbsp;&nbsp;
                    <button type="submit"><?php echo $mode; ?></button>
                </div>
            </div>
        </form>
        
        
    </div>
</div>