<?PHP
class Livraison {
	private $id_livraison;
	private $id_livreur;
	private $id_commande;
	private $adresse;
	private $ville;
	private $code_postal;
	private $date_livraison;

	function __construct($id_livraison,$id_livreur,$adresse,$ville,$code_postal,$date_livraison)
	{
		$this->id_livraison=$id_livraison;
		$this->id_livreur=$id_livreur;
		//$this->id_commande=$id_commande;
		$this->ville=$ville;
		$this->adresse=$adresse;
		$this->code_postal=$code_postal;
		$this->date_livraison=$date_livraison;
	}
	
	function getID(){
		return $this->id_livraison;
	}
	function getLivreur(){
		return $this->id_livreur;
	}
	function getAdresse(){
		return $this->adresse;
	}/*
	function getCommande(){
		return $this->id_commande;
	}*/
	function getVille(){
		return $this->ville;
	}
	function getCode(){
		return $this->code_postal;
	}
	function getDate(){
		return $this->date_livraison;
	}

	function setLivreur($id_livreur){
		$this->id_livreur=$id_livreur;
	}
	function setAdresse($adresse){
		$this->adresse;
	}/*
	function setCommande($id_commande){
		$this->id_commande=$id_commande;
	}*/
	function setVille($ville){
		$this->ville=$ville;
	}
	function setCode($code_postal){
	    $this->code_postal=$code_postal;
	}
	function setDate($date_livraison){
	    $this->date_livraison=$date_livraison;
	}
	
}
?>