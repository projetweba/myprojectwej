<?PHP
class Employe{
	private $reference;
	private $nom;
	private $categorie;
	private $prix;
	private $description;
	private $image;

	function __construct($reference,$nom,$categorie,$prix,$description,$image){
		$this->reference=$reference;
		$this->nom=$nom;
		$this->categorie=$categorie;
		$this->prix=$prix;
		$this->description=$description;
		$this->image=$image;


		
	}
	
	function getreference(){
		return $this->reference;
	}
	function getNom(){
		return $this->nom;
	}
	
	function getcategorie(){
		return $this->categorie;
	}
	function getprix(){
		return $this->prix;
	}
	function getdesc(){
		return $this->description;
	}

	function getimage(){
		return $this->image;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setdesc($description){
		$this->description;
	}
	function setprix($prix){
		$this->prix=$prix;
	}
	function setcategorie($categorie){
		$this->categorie=$categorie;
	}
		
	
}

?>