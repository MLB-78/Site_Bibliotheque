<?php 

class Nationalite{
   
    private $num;
    private $libelle;
    private $numContinent;

    // Getter de num
    public function getNum()
    {
        return $this->num;
    }

    // Setter de num
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    // Getter de libelle
    public function getLibelle() : string
    {
        return $this->libelle;
    }

    // Setter de libelle
    public function setLibelle(string $libelle) : self
    {
        $this->libelle = $libelle;

        return $this;
    }

    
    public function numContinent(): int
    {
        return $this->numContinent;
    }

  
    public function getContinent() :Continent
    {
        return Continent::findById($this->numContinent);
    }


    public function setContinent(Continent $continent) :self
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }
    
    

    /**
     * Retourne les nationalités
     * @return Nationalite[] 
     * 
     */


    public static function findAll(?string $libelle="", ?string $continent="Tous") : array
    {
        
        $texteReq = "select n.num as numero, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num";
        if($libelle != ""){
            $texteReq .= " and n.libelle like '%" . $libelle . "%'";
        }
        
        if($continent != "Tous"){ 
            $texteReq .= " and c.num =" .$continent;
        }
        $texteReq.= " order by n.num";
        $req = MonPdo::getInstance()->prepare($texteReq);
        $req -> setFetchMode(PDO::FETCH_OBJ);
        $req -> execute();
        $lesResultats = $req -> fetchAll();
        return $lesResultats;

    }

    public static function findAllNat() :array
    {

        $req = MonPdo::getInstance() -> prepare("Select * from nationalite");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;

    }


    /**
     * Trouve un Nationalité par son num
     * 
     * @param integer $id
     * @return Nationalite objet Nationalite trouvé
     * 
     */

        public static function findById(int $id) : Nationalite
        {

        $req = MonPdo::getInstance()->prepare("select * from nationalite where num = :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Nationalite');
        $req->bindParam(':id', $id);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat;
        
        }
        
    /**
     * Undocumented function
     *AJouter
        * @param Nationalite $nationalite continent à ajouter
        * @return integer resultat (1 si l'opération à réussi);
        * 
        */

        public static function add(Nationalite $nationalite): int {

        $req = MonPdo::getInstance()->prepare("Insert into nationalite (libelle,numContinent) values(:libelle, :numContinent)");
        $lib = $nationalite->getLibelle();
        $numCont = $nationalite->numContinent();
        $req->bindParam(':libelle', $lib);
        $req->bindParam(':numContinent', $numCont);
        $nb = $req->execute();
        return $nb;
    }

        /**
     * Undocumented function
     *Modifier
        * @param Nationalite $Nationalite continent à modifier
        * @return integer resultat (1 si l'opération à réussi, 0 sinon);
        * 
        */

        public static function update(Nationalite $nationalite) :int  
        {
            $req = MonPdo::getInstance()->prepare("update nationalite set libelle = :libelle, numContinent=:numCont where num = :id");
            $id = $nationalite->getNum();
            $lib = $nationalite->getLibelle();
            $numCont = $nationalite->numContinent();
            $req->bindParam(':id', $id);
            $req->bindParam(':libelle', $lib);
            $req->bindParam(':numCont', $numCont);
            $nb = $req->execute();
            return $nb;
        }

        /**
     * Undocumented function
     * Suppprimer
     * @param Nationalite $nationalite
     * @return integer resultat 
     * 
     */
    

    public static function delete(Nationalite $nationalite) :int
    {

        $req = MonPdo::getInstance()-> prepare("delete from nationalite where num = :id");
        $num = $nationalite->getNum();
        $req -> bindParam(':id',$num);
        $nb=$req -> execute();
        return $nb;

    }


}

