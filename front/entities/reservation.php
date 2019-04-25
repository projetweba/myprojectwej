<?PHP
class reservation {
	private $id_reserv;
	private $product_name;
	private $categorie_name;
	private $quantite;
	private $description;

	function __construct($id_reserv,$product_name,$categorie_name,$quantite,$description){
		$this->id_reserv=$id_reserv;
		$this->product_name=$product_name;
		$this->categorie_name=$categorie_name;
		$this->quantite=$quantite;
		$this->description=$description;
	}
	
	
	function getID(){
		return $this->id_reserv;
	}
	function getProductName(){
		return $this->product_name;
	}
	function getCategorieName(){
		return $this->categorie_name;
	}
	function getQuantite(){
		return $this->quantite;
	}
	function getDescription(){
		return $this->description;
	}
	
	/*function setID($id_reserv){
	    $this->id_reserv=$id_reserv;
	}*/
	function setProductName($product_name){
		$this->product_name=$product_name;
	}
	function setCategorieName($categorie_name){
		$this->categorie_name=$categorie_name;
	}
	function setQuantite($quantite){
		$this->quantite=$quantite;
	}
	function setDescription($description){
		$this->description=$description;
	}
	
}

?>