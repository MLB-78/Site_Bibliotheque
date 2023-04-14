<div class="container">
  
  <h3>Liste des Continents</h3>
  
  <br>
  
  <a href="index.php?uc=continents&action=add" class='btn btn-sucess'> <img src="image/plus.png" width="25" > Créer un continent</a>
  

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

    foreach($lesContinents as $continent){

    echo "<tr>";
    echo "<td>" . $continent->getNum() ." </td>";
    echo "<td>" . $continent->getLibelle() ."</td>";
    echo"
    
    <td>
        <a href='index.php?uc=continents&action=update&num=" . $continent->getNum() ."'>

         <img src='image/modifier.png'>

        </a>

        &nbsp;
        
        <a href='#modalSupression' data-toggle='modal' data-message='Voulez-vous vraiment supprimer ce continent ?'  data-suppression='index.php?uc=continents&action=delete&num=" . $continent->getNum() ." ' id='btnSuppr'>

		    <img src='image/supprimer.png'>

	    </a>

         
        </td>
        </tr>
        
        ";

    }

    ?>

    </table>

</div>
