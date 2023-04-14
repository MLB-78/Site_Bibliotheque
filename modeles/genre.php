<?php 

class Genre{
    
    private $num;
    private $libelle;
    private $genre;
    
    
    /** numéro genre
     * @var int
     */
    public function getNum(): int
    {
        return intval($this->num);
    }

    public function setNum($num): self
    {
        $this->num = $num;
        return $this;
    }
    
    
    /**
     * Lit le libelle
     * Get the value of libelle
     * * @var libelle
     */
    public function getLibelle() : string
    {
        return $this->libelle;
    }
    
    
    /**
     * Set the value of libelle
     *
     * @return  self
     */
    public function setLibelle(string $libelle) : self
    {
        $this->libelle = $libelle;
        
        return $this;
    }
    
    


    /**
     * 
     * @return Genre[] 
     * 
     */


    public static function findAll() :array
    {

        $req = MonPdo::getInstance() -> prepare("Select * from genre");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;

    }


    /**
     * Trouve un genre par son num
     * 
     * @param integer $id
     * @return Genre objet Genre trouvé
     * 
     */

    public static function findById(int $id) :Genre
    {

        $req = MonPdo::getInstance()-> prepare("Select * from genre where num = :id");
        $req -> setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
        $req -> bindParam(':id',$id);
        $req -> execute();
        $leResultats=$req->fetch();
        return $leResultats;

    }
    /**
     * Undocumented function
     *AJouter
        * @param Genre $Permet d'ajouter 
        * @return integer 
        * 
        */

    public static function add(Genre $genre) :int   
    {

        $req = MonPdo::getInstance()-> prepare("insert into genre(libelle) values(:libelle)");
        $libelle=$genre->getLibelle();
        $req->bindParam(':libelle',$libelle);
        $nb=$req->execute();
        return $nb;

    }

        /**
     * Undocumented function
     *Modifier
        * @param Genre $genre genre à modifier
        * @return integer resultat (1 si l'opération à réussi, 0 sinon);
        * 
        */

    public static function update(Genre $genre) :int  
    {

        $req = MonPdo::getInstance()->prepare("update genre set libelle= :libelle where num= :id");
        $num=$genre->getNum();
        $libelle=$genre->getLibelle();
        $req->bindParam(':id', $num);
        $req->bindParam(':libelle',$libelle);
        $nb=$req->execute();
        return $nb;


    }

        /**
     * Supprimer un genre
     * Suppprimer
     * @param Genre $genre 
     * @return integer resultat 
     * 
     */
    

    public static function delete(Genre $genre) :int
    {

        $req = MonPdo::getInstance()-> prepare("delete from genre where num= :id");
        $num = $genre->getNum();
        $req->bindParam(':id',$num);
        $nb=$req->execute();
        return $nb;



    }




    /**
     * Get the value of genre
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     */
    public function setGenre($genre): self
    {
        $this->genre = $genre;

        return $this;
    }
}



?>
