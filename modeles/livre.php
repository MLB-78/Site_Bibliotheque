<?php 

class Livre{
   
    private $num;
    private $numAuteur;
    private $libelle;
    
    private $titre;
    private $prix;
    private $annee;
    private $editeur;
    private $langue;
    private $isbn;
    private $genre;

    // GS de num
    public function getNum()
    {
        return $this->num;
    }

    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }


    
    //   gs num auteur
    public function numAuteur(): int
    {
        return $this->numAuteur;
    }

    public function getAuteur() :Auteur
    {
        return Auteur::findById($this->numAuteur);
    }


    public function setAuteur(Auteur $continent) :self
    {
        $this->numAuteur = $continent->getNum();

        return $this;
    }
    
    // GS LIBELLE
    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }






    /**
     * Retourne les nationalités
     * @return Livre[] 
     * 
     */


    public static function findAll(?string $titre ="",?string $auteur ="Tous", ?string $genre="Tous" ) : array
    {
        
        $texteReq = "select l.num as numero, l.isbn as 'isbn' ,l.titre as 'titre', l.prix as 'prix', l.editeur as 'editeur', l.annee as 'annee', l.langue as 'langue', a.nom as 'nomA', a.prenom as 'prenomA', g.libelle as 'genre' from livre l, auteur a, genre g where l.numAuteur=a.num and l.numGenre = g.num";

        
        if($titre != ""){
            $texteReq .= " and l.titre like '%" . $titre . "%'";
        }

        if($genre != "Tous"){ 
            $texteReq .= " and g.num =" . $genre;

        }
        if($auteur != "Tous"){ 
            $texteReq .= " and a.num =" .$auteur;

        }

        $req = MonPdo::getInstance()->prepare($texteReq);
        $req -> setFetchMode(PDO::FETCH_OBJ);
        $req -> execute();
        $lesResultats = $req -> fetchAll();
        return $lesResultats;

    }


    /**
     * Trouve un Nationalité par son num
     * 
     * @param integer $id
     * @return Livre objet Livre trouvé
     * 
     */

        public static function findById(int $id) : Livre
        {

        $req = MonPdo::getInstance()->prepare("select * from livre where num = :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Livre');
        $req->bindParam(':id', $id);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat;
        
        }
        
    /**
     * Undocumented function
     *AJouter
        * @param Livre $livre continent à ajouter
        * @return integer resultat (1 si l'opération à réussi);
        * 
        */

        public static function add(Livre $livre): int {

        $req = MonPdo::getInstance()->prepare("Insert into livre (nom,prenom,numAuteur) values(:nom, :prenom, :numAuteur)");
        $nom = $livre->getNom();
        $prenom = $livre->getPrenom();
        $numCont = $livre->numAuteur();
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':numAuteur', $numCont);
        $nb = $req->execute();
        return $nb;
    }

        /**
     * Undocumented function
     *Modifier
        * @param Livre $Livre continent à modifier
        * @return integer resultat (1 si l'opération à réussi, 0 sinon);
        * 
        */

        public static function update(Livre $livre) :int  
        {
            $req = MonPdo::getInstance()->prepare("update livre set nom = :nom, prenom = :prenom, numAuteur=:numCont where num = :id");

            $id = $livre->getNum();
            $nom = $livre->getNom();
            $prenom = $livre->getPrenom();
            $numCont = $livre->numAuteur();

            $req->bindParam(':id', $id);
            $req->bindParam(':nom', $nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':numCont', $numCont);
            $nb = $req->execute();
            return $nb;
        }

        /**
     * Undocumented function
     * Suppprimer
     * @param Livre $livre
     * @return integer resultat 
     * 
     */
    

    public static function delete(Livre $livre) :int
    {

        $req = MonPdo::getInstance()-> prepare("delete from livre where num = :id");
        $num = $livre->getNum();
        $req -> bindParam(':id',$num);
        $nb=$req -> execute();
        return $nb;

    }







    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     */
    public function setTitre($titre): self
    {
        $this->titre = $titre;

        return $this;
    }



    /**
     * Get the value of numAuteur
     */
    public function getNumAuteur()
    {
        return $this->numAuteur;
    }

    /**
     * Set the value of numAuteur
     */
    public function setNumAuteur($numAuteur): self
    {
        $this->numAuteur = $numAuteur;

        return $this;
    }





    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     */
    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of annee
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     */
    public function setAnnee($annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get the value of editeur
     */
    public function getEditeur()
    {
        return $this->editeur;
    }

    /**
     * Set the value of editeur
     */
    public function setEditeur($editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * Get the value of langue
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set the value of langue
     */
    public function setLangue($langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get the value of isbn
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set the value of isbn
     */
    public function setIsbn($isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }


}

