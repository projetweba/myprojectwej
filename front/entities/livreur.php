<?PHP
class Livreur {
	private $id_liv;
	private $adresse_liv;
	private $mail_liv;
	private $tel_liv;
	function __construct($id_liv,$adresse_liv,$tel_liv,$mail_liv){
		$this->id_liv=$id_liv;
		$this->adresse_liv=$adresse_liv;
		$this->mail_liv=$mail_liv;
		$this->tel_liv=$tel_liv;
	}
	
	
	function getNom(){
		return $this->id_liv;
	}
	function getAdresse(){
		return $this->adresse_liv;
	}
	function getNum(){
		return $this->tel_liv;
	}
	function getMail(){
		return $this->mail_liv;
	}
	

	function setNom($id_liv){
		$this->id_liv=$id_liv;
	}
	function setAdresse($adresse_liv){
		$this->adresse_liv;
	}
	function setNum($tel_liv){
		$this->tel_liv=$tel_liv;
	}
	function setMail($mail_liv){
		$this->mail_liv=$mail_liv;
	}	
}

?>