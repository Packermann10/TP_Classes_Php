
<?php

//classe Client
class Client{


	//Données Membres
	private $_IdClient;
	private $_Nom;
	private $_Prenom;
	private $_Adresse;
	private $_Cp;
	private $_Ville;
	private $_Pays;

	
	private $_collectFacture=array();
	

	//Fcts Membres
	public function hydrate(array $donnees)
	{
		if (isset($donnees['IdClient'])){
			$this->setIdClient($donnees['IdClient']);
		}
		if (isset($donnees['Nom'])){
			$this->setNom($donnees['Nom']);
		}
		if (isset($donnees['Prenom'])){
			$this->setPrenom($donnees['Prenom']);
		}
		if (isset($donnees['Adresse'])){
			$this->setAdresse($donnees['Adresse']);
		}
		if (isset($donnees['Cp'])){
			$this->setCp($donnees['Cp']);
		}
		if (isset($donnees['Ville'])){
			$this->setVille($donnees['Ville']);
		}
		if (isset($donnees['Pays'])){
			$this->setPays($donnees['Pays']);
		}
		
	}
	
	public function __construct($mId,$mNom,$mPrenom,$mAdr,$mCp,$mVille,$mPays){

		//echo "Contructeur <br/>";
		$this->_IdClient=$mId;
		$this->_Nom=$mNom;
		$this->_Prenom=$mPrenom;
		$this->_Adresse=$mAdr;
		$this->_Cp=$mCp;
		$this->_Ville=$mVille;
		$this->_Pays=$mPays;
		

	
	}

	public function __destruct(){

		

	}



	//Mutateurs

	public function getId(){


		return $this->_IdClient;
	}

	public function getNom(){


		return $this->_Nom;
	}

	public function getPrenom(){


		return $this->_Prenom;
	}

	public function getAdresse(){


		return $this->_Adresse;
	}

	public function getCp(){

		return $this->_Cp;
	}


	public function getVille(){

		return $this->_Ville;

	}

	public function getPays(){

		return $this->_Pays;

	}

	public function setIdClient($mId){

		$this->_IdClient=$mId;

	}

	public function setNom($mNom){

		$this->_Nom=$mNom;

	}

	public function setPrenom($mPrenom){

		$this->_Prenom=$mPrenom;

	}

	public function setAdresse($mAdresse){

		$this->_Adresse=$mAdresse;

	}

	public function setCp($mCp){

		$this->_Cp=$mCp;

	}

	public function setVille($mVille){

		$this->_Ville=$mVille;

	}

	public function setPays($mPays){

		$this->_Pays=$mPays;

	}

	public function affiche(){

		echo $this->_IdClient."<br/>";
		echo $this->_Nom."<br/>";
		echo $this->_Prenom."<br/>";
		echo $this->_Adresse."<br/>";
		echo $this->_Cp."<br/>";
		echo $this->_Ville."<br/>";
		echo $this->_Pays."<br/>";
		//echo $this->_collectFacture[$i]->affiche();"<br/>";

		// Affichage des produits dans la facture
  		foreach(self::getFactClient() as $valeur) {
 
    		echo $valeur->affiche().'<br/>';
    			
  		}

	}



	public function getFactClient(){

		return $this->_collectFacture;

	}

	public function addFature(Facture $mCollection){

		if (!in_array($mCollection,$this->_collectFacture)){
			$mCollection->setClient($this);
			$this->_collectFacture[]=$mCollection;
		}
		
			

	}


	
}


?>