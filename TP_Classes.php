<?php

	class Client{

		private $_id;
		private $_nom;
		private $_prenom;
		private $_adresse;
		private $_cp;
		private $_ville;
		private $_pays;
		private $_facture;



	public function __construct($mId, $mNom, $mPrenom, $mAdresse, $mCp, $mVille, $mPays){
	
		echo("Constructeur </br>");
		$this->_id=$mId;
		$this->_nom=$mNom;
		$this->_prenom=$mPrenom;
		$this->_adresse=$mAdresse;
		$this->_cp=$mCp;
		$this->_ville=$mVille;
		$this->_pays=$mPays;
	}
	
	//mutateurs get
	public function getclientid(){
		
		return $this->_id;
	}
	
	public function getclientnom(){
		
		return $this->_nom;
	}
	
	public function getclientprenom(){
		
		return $this->_prenom;
	}
	
	public function getclientadresse(){
		
		return $this->_adresse;
	}
	
	public function getclientcp(){
		
		return $this->_cp;
	}
	
	public function getclientville(){
		
		return $this->_ville;
	}
	
	public function getclientpays(){
		
		return $this->_pays;
	}
	
	public function getClientFacture($FacID){
			
			return $this->_fac[$FacID];

		}
	
	//mutateurs set
	
	public function setclientid($mId){
		
		return $this->_id = $mId;
	}
	
	public function setclientnom($mNom){
		
		return $this->_nom = $mNom;
	}
	
	public function setclientprenom($mPrenom){
		
		return $this->_prenom = $mPrenom;
	}
	
	public function setclientadresse($mAdresse){
		
		return $this->_adresse = $mAdresse;
	}
	
	public function setclientcp($mCp){
		
		return $this->_cp = $mCp;
	}
	
	public function setclientville($mVille){
		
		return $this->_ville = $mVille;
	}
	
	public function setclientpays($mPays){
		
		return $this->_pays = $mPays;
	}
	
	public function setclientfacture($FacID,$FacDate,$Qte,$TVA,$Prod){
			
			$this->_fac[$NumFac] = new facture($FacID,$FacDate,$Qte,$TVA,$Prod);
 
		}
	
	//afficher les données du client
	public function afficheClient(){
			
			echo "N° Client : ".$this->_id;
			echo "<br/>".$this->_nom;
			echo " ".$this->_prenom;
			echo "<br/>".$this->_adresse;
			echo "<br/>".$this->_cp;
			echo " ".$this->_ville;
			echo "<br/>";
			}
}//Fin de la classe client

	class Produit{
		
		public $_ProdID;
		public $_Lib;
		public $_PUHT;
		private $_Qte;

		public function __construct($ProdID, $Lib, $PUHT, $Qte){
			
			$this->_prodid 	= $ProdID;
			$this->_lib = $Lib;
			$this->_puht = $PUHT;
			$this->_qte	= $Qte;
			
		}
		
		public function __destruct(){}
		
		//GET
		public function getprodID(){
			
			return $this->_id;
		
		}
		
		public function getprodlib(){
			
			return $this->_lib;
		
		}
		
		public function getprodpuht(){
			
			return $this->_puht;
		
		}
		
		public function getprodqte(){
			
			return $this->_qte;
		
		}
		
		//SET
		public function setprodID($mProdID){
			
			$this->_prodid = $mProdID;
		 
		}
		
		public function setprodlib($mLib){
			
			$this->_lib = $mLib;
		
		}
		
		public function setprodPUHT($mPUHT){
			
			$this->_puht = $mPUHT;
		 
		}
		
		public function setprodqte($mQte){
			
			$this->_qte = $mQte;
		 
		}
		
		public function afficheProduit(){
		

					echo "N° produit : ".$this->_prodid;;
					echo "Libelle : ".$this->_lib;
					echo "PUHT :".$this->_puht;
					echo "Quantité : ".$this->_qte;
		}
		
} // Fin classe produit

	class Facture{
		
			private $_FacID;
			private $_FacDate;
			private $_MontantFinal;
			private $_DetailFac;
			private $_Incr;

		public function __construct($FacID, $Facdate, $Qte, $TVA, $Prod){
			
			$this->_id = $FacID;
			$this->_date = $FacDate;
			$this->_montantfin = $Qte*(($Prod->_puht)*(1+$TVA/100));
			$this->_incr= 0;
			$this->_detailfac[$this->_incr] = new Det_fac($Qte, $TVA, $Prod);
			
		}
		
		//GET
		public function getid(){
			
			return $this->_facid;
		
		}
		
		public function getfdate(){
			
			return $this->_facdate;
		
		}
		
		public function getmontant(){
			
			return $this->_montantfin;
		
		}
		
		public function getdetail(){
			
			return $this->_detailfac;
		
		}
		
		//SET
		public function setID($mFacID){
			
			$this->_facid = $mFacID;
		 
		}
		
		public function setdate($mFacDate){
			
			$this->_facdate = $mFacDate;
		
		}
		
		public function setmontant($mMontantFinal){
			
			$this->_montantfin = $mMontantFinal;
		 
		}
		
		public function setdetail($numFac,$Qte,$TVA,$Prod){
			
			//incrément de la ligne
			$this->_incremDetail++;
			
			//on insère les nouveaus produits commandés
			$this->_detailfac[$this->_incr] = new Det_fac($Qte,$TVA,$Prod);
			
			//maj du montant final
			$this->_montantfin = ($this->_montantfin) + $Qte*(($Prod->_puht)*(1+$TVA/100));
		 
		}
		
		public function affichefac($numFac){
			
			//On affiche les informations de la facture
			echo "<br/>Facture n° : </br>".$this->_id;
			echo "Date : ".$this->_date;
			echo "Produit";
			echo "Quantité commandée";
			echo "Prix HT";
			echo "TVA";
			
			echo "<h2>Total : ".$this->_montantTTC."<h2>€</h2>";
		
		}
	}
	
	class Det_fac{
		
		private $_Qte;
		private $_TVA;
		private $_Prod;

		public function __construct($QTE,$TVA,$Prod){
			
			$this->_qte= $Qte;
			$this->_TVA	= $TVA;
			$this->_pprod = $Prod;
		}
		
		//GET
		public function getdetail(){
			
			return $this->_qte;
		
		}
		
		public function gettva(){
			
			return $this->_TVA;
		
		}
		
		//SET
		public function setdetail($mQte){
			
			$this->_quantite = $mQte;
		 
		}
		
		public function settva($mTVA){
			
			$this->_TVA = $mTVA;
		
		}
		
		public function afficheDetails(){
			
				echo "produit : ".$this->_prod->_lib;
				echo "qté commandée : ".$this->_qte;
				echo "PUHT : ".$this->_prod->_puht;
				echo "TVA : ".$this->_TVA;
			
		}
	
	} //fin classe détail facture

?>

<?php

	//Nouveau CLient
	$mClient = new Client(1, " Ackermann ", " Pierre ", " 26 rue des prés ", 67000, " Strasbourg ", "France");
	$mClient->AfficheClient();
	
	//nouveaux produits
	$items[0] = new Produit(1,"ballon",15,30);
	$items[1] = new Produit(2,"tournevis",9,65);
	$items[2] = new Produit(3,"Bateau",599,20);
	/*afficher produit
	$mProd->afficheProduit(0);
	$mProd->afficheProduit(1);
	$mProd->afficheProduit(2);
	*/
	
	//nouvelle facture
	$mClient->setClientFacture(0,"12-07-2009",3,19.6,$items[0]);
	
	/*afficher la facture
	$mClient->affichefac(0);
	*/
	
?>


