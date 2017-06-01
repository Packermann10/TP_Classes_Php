
<?php

class ClientManager{
	
	private $_db; //instance de PDO
	
	public function __construct($db){
		
		$this->setDb($db);
		
	}
	
	
	//requête pour ajouter un client
	
	public function add(Client $client){
		
		$q = $this->_db->prepare('INSERT INTO client(NumClient, NomClient, PrenomClient, AdresseClient, Cp, VilleClient, PaysClient)
			VALUES(:NumClient, :NomClient, :PrenomClient, :AdresseClient, :Cp, :VilleClient, :PaysClient)');
		
		$q->bindValue(':NumClient', $client->NumClient(), PDO::PARAM_INT);
		$q->bindValue(':NomClient', $client->NomClient());
		$q->bindValue(':PrenomClient', $client->PrenomClient());
		$q->bindValue(':AdresseClient', $client->AdresseClient(), PDO::PARAM_INT);
		$q->bindValue(':Cp', $client->Cp(), PDO::PARAM_INT);
		$q->bindValue(':VilleClient', $client->VilleClient(), PDO::PARAM_INT);
		$q->bindValue(':PaysClient', $client->PaysClient(), PDO::PARAM_INT);
		
		$q->execute();
	}
	
	//requête pour supprimer un client à partir de son ID
	public function delete(Client $client){
		
		$this->_db->exec('DELETE FROM client WHERE NumClient = '.$perso->NumClient());
	}
	
	//fonction qui appelle la requête pour séléctionner les informations d'un client à partir de son ID  
	public function get($NumClient){
		
		$NumClient = (int) $NumClient;
		
		$q = $this->_db->query('SELECT NumClient, NomClient, PrenomClient, AdresseClient, Cp, VilleClient, PaysClient FROM client WHERE NumClient = '.$Numclient);
		
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Client($donnees);
	}
	
	//fonction qui appelle un requête pour afficher la liste des clients dans la base
	public function getList()
	{
		$clients = [];
		
		$q = $this->_db->query('SELECT NumClient, NomClient, PrenomClient, AdresseClient, Cp, VilleClient, PaysClient FROM client ORDER BY NomClient');
		
		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)){
			
			$clients[] = new Client($donnees);
			
		}
		
		return $clients;
		
	}
	
	//function qui appelle la requête pour modifier les informations d'un client, ici l'adresse, le code postal, la ville et le pays, tjr à partir de l'ID
	
	public function update(Client $client){
		
		$q = $this->_db->query('UPDATE client SET  AdresseClient = :AdresseClient, Cp = :Cp, VilleClient = :VilleClient, PaysClient = :PaysClient 
		WHERE NumClient = :NumClient');
		
		$q->bindValue(':AdresseClient', $client->AdresseClient(), PDO::PARAM_INT);
		$q->bindValue(':Cp', $client->Cp(), PDO::PARAM_INT);
		$q->bindValue(':VilleClient', $client->VilleClient(), PDO::PARAM_INT);
		$q->bindValue(':PaysClient', $client->PaysClient(), PDO::PARAM_INT);
		
		$q->execute();
	}
		
	public function setDb(PDO $db){
	
		$this->_db = $db;
	
	}
  }
  
?>


<?php

	$client = new Client([
		'NumClient' => '666',
		'NomClient' => 'Lucifer',
		'PrenomClient' => 'Satan',
		'AdresseClient' => '666, rue de l enfer',
		'Cp' => '66666'
		'VilleClient' => 'Hell'
		'PaysClient' => 'Enfer'	
	]);
	
	$db = new PDO('mysql:host:localhost;dbname=facturef2b', 'root', 'ludus');
	$manager = new ClientsManager($db);
	
	$manager->add($client);

?>