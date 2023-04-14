<div class="container">

    <h2 class="titreH2"> <?php echo $mode ?> un livre </h2>

    <div class="formulaire"> 
            <form action="index.php?uc=livres&action=validForm" method="post">
            <!-- Titre -->
            <div class="form-group">
                <label for="nom">Titre</label>
                <input type="text" class="form-control" id="titre" placeholder="Saisir le titre" name="titre" value="<?php if ($mode == 'Modifier' && isset($livre)) {
                    echo $livre->getTitre();
                } ?>">
            </div>
            <!-- Prix -->
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="text" class="form-control"  placeholder="Saisir le prix" name="prix" value="<?php if ($mode == 'Modifier' && isset($livre)) {
                    echo $livre->getPrix();
                } ?>">
            </div>
            <!-- Annee -->
            <div class="form-group">
                <label for="annee">Annee</label>
                <input type="text" class="form-control"  placeholder="Saisir l'année" name="annee" value="<?php if ($mode == 'Modifier' && isset($livre)) {
                    echo $livre->getAnnee();
                } ?>">
            </div>
            <!-- isbn -->
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control"  placeholder="Saisir l'isbn" name="isbn" value="<?php if ($mode == 'Modifier' && isset($livre)) {
                    echo $livre->getIsbn();
                } ?>">
            </div>
            <!-- langues -->
            <div class="form-group">
                <label for="langue">Langue</label>
                <input type="text" class="form-control"  placeholder="Saisir la langue" name="langue" value="<?php if ($mode == 'Modifier' && isset($livre)) {
                    echo $livre->getLangue();
                } ?>">
            </div>
            <!-- editeur -->
            <div class="form-group">
                <label for="edit">Editeur</label>
                <input type="text" class="form-control"  placeholder="Saisir l'édition'" name="edition" value="<?php if ($mode == 'Modifier' && isset($livre)) {
                    echo $livre->getEdition();
                } ?>">
            </div>
            
                <!-- AUTEUR -->
            <div class="form-group">
                <label for="auteur">Auteur</label>
                <select name="auteur" class="form-control">
                    <?php foreach ($lesAuteurs as $auteur) {
                        $selection = '';
                        if ($mode == 'Modifier' && isset($livre)) {
                            $selection = $auteur->getNum() == $livre->getAuteur()->getNum() ? 'selected' : '';
                        }
                        echo "<option value='" . $auteur->getNum() . "'" . $selection . ">" . $auteur->getNom() . "</option>";
                    } 
                    
                    ?>
                </select>
            </div>
            <!-- Genres -->
            <div class="form-group">
                <label for="genre">Genre</label>
                <select name="genre" class="form-control">
                    <?php foreach ($lesGenres as $genre) {
                        $selection = '';
                        if ($mode == 'Modifier' && isset($livre)) {
                            $selection = $genre->getNum() == $livre->getGenre()->getNum() ? 'selected' : '';
                        }
                        echo "<option value='" . $genre->getNum() . "'" . $selection . ">" . $genre->getLibelle() . "</option>";
                    } 
                    
                    ?>
                </select>
            </div>
           
            
            <input type="hidden" id="num" name="num" value="<?php if ($mode == 'Modifier' && isset($livre)) {
                echo $livre->getNum();
            } ?>" >

            <br>

            <div class="row">
                <div class="col"> 
                    <a href="index.php?uc=livres&action=list" class="btn nat">Revenir à la listes</a>
                    &nbsp;&nbsp;&nbsp;
                    <button type="submit"><?php echo $mode; ?></button>
                </div>
            </div>
        </form>
        
        
    </div>
</div>