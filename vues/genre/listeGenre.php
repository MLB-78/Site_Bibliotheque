<div class="container">
  
  <h3>Liste des Genres</h3>
  
  <br>
  
  <a href="index.php?uc=genres&action=add" class='btn btn-sucess'> <img src="image/plus.png" width="25" > Créer un genre</a>
  

<br><br>

<div class="container">

    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <td class="col-md-2"><strong>Numéro</strong></td>
                <td class="col-md-6"><strong>Libellé</strong></td>
                <td class="col-md-2"><strong>Actions</strong></td>
            </tr>
        </thead>

    <?php


    // Afficher la requête nationalite

    foreach($lesGenres as $genre){

    echo "<tr>";
    echo "<td>" . $genre->getNum() ." </td>";
    echo "<td>" . $genre->getLibelle() ."</td>";
    echo"
    
    <td>
        <a href='index.php?uc=genres&action=update&num=" . $genre->getNum() ."'>

         <img src='image/modifier.png'>

        </a>

        &nbsp;
        
        <a href='#modalSupression' data-toggle='modal' data-message='Voulez-vous vraiment supprimer ce genre ?'  data-suppression='index.php?uc=genres&action=delete&num=" . $genre->getNum() ." ' id='btnSuppr'>

		    <img src='image/supprimer.png'>

	    </a>

         
        </td>
        </tr>
        
        ";

    }

    ?>

    </table>

</div>
