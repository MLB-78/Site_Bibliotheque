<?php

if(!empty($_SESSION['message'])){

    $mesMessages=$_SESSION['message'];
    foreach($mesMessages as $key=>$message){
  
      echo '
        <div class="alert alert-' .$key. ' alert-dismissible fade show" role="alert">
  
          ' .$message . '
  
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
           </button>
  
      </div>';
    }
    $_SESSION['message']=[];
  }
  

?>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="modalSupression" tabindex="-1" role="dialog" aria-labelledby="modalSuppressionLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalSuppressionLabel">Confirmation de suppression</h5>

				</div>
				<div class="modal-body">
					Voulez-vous vraiment supprimer cette élément ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
					<a id="btn" href="#" class="btn btn-danger">Supprimer</a>
				</div>
			</div>
		</div>
	</div>

