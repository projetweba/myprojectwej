<?PHP
include_once "../config.php";

class EmployeC {
function afficherEmploye ($employe){
		echo "reference: ".$employe->getreference()."<br>";
		echo "Nom: ".$employe->getNom()."<br>";
		echo "categorie: ".$employe->getcategorie()."<br>";
		echo "prix: ".$employe->getprix()."<br>";
		echo "description: ".$employe->getdesc()."<br>";
		echo "image: ".$employe->getimage()."<br>";
	
	}
	
	function ajouterEmploye($employe){
				
		$sql="insert into employe (reference,nom,categorie,prix,description) values (:reference, :nom,:cat,:prix,:desc)";
		 
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $ref=$employe->getreference();
        $nom=$employe->getNom();
        $categorie=$employe->getcategorie();
        $prix=$employe->getprix();
       
        $desc=$employe->getdesc();
		$req->bindValue(':reference',$ref);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':cat',$categorie);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':desc',$desc);

		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherEmployes(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerEmploye($reference){
		$sql="DELETE FROM produit where reference= :reference";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':reference',$reference);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierEmploye($employe,$reference){
		$sql="UPDATE produit SET reference=:reff, nom=:nom,categorie=:categorie,prix=:prix,description=:description WHERE reference=:reference";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$reff=$employe->getreference();
        $nom=$employe->getNom();
        $categorie=$employe->getcategorie();
        $prix=$employe->getprix();
        $description=$employe->getdesc();
		$datas = array(':reff'=>$reff, ':reference'=>$reference, ':nom'=>$nom,':categorie'=>$categorie,':prix'=>$prix,':description'=>$description);
		$req->bindValue(':reff',$reff);
		$req->bindValue(':reference',$reference);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':categorie',$categorie);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':description',$description);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererEmploye($reference){
		$sql="SELECT * from produit where reference=$reference";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
		

	
	function rechercherListeEmployes($nom){
		$sql="SELECT * from produit where nom=$nom";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>