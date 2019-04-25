<?PHP
include "../config.php";
class reservationC {
function afficherReservation ($reservation){
		
		echo "Reservation ID: ".$reservation->getID()."<br>";
		echo "Categorie name: ".$reservation->getCategorieName()."<br>";
		echo "Product name: ".$reservation->getProductName()."<br>";
		echo "quantite: ".$reservation->getQuantite()."<br>";
		echo "description".$reservation->getDescription()."<br>";

	}	
	function ajouterReservation($reservation){
		$sql="insert into reservation(id_reserv,quantite,product_name,categorie_name,description) values (:id_reserv,:quantite,:product_name,:categorie_name,:description)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);


		$id_reserv=$reservation->getID();
        $categorie_name=$reservation->getCategorieName();
        $quantite=$reservation->getQuantite();
        $product_name=$reservation->getProductName();
        $description=$reservation->getDescription();


        $req->bindValue(':id_reserv',$id_reserv);
		$req->bindValue(':product_name',$product_name);
		$req->bindValue(':categorie_name',$categorie_name);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':description',$description);
		
		        $req->execute();           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
      function afficherReservations(){
		$sql="SElECT * From reservation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}


	function supprimerReservation($id_reserv){
		$sql="DELETE FROM reservation where id_reserv= :id_reserv";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_reserv',$id_reserv);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierReservation($reservation,$id_reserv){
		$sql="UPDATE reservation SET id_reserv=:id_reserv_ini, product_name=:product_name,categorie_name=:categorie_name,quantite=:quantite,description=:description WHERE id_reserv=:id_reserv";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id_reserv_ini=$reservation->getID();
        $product_name=$reservation->getProductName();
        $categorie_name=$reservation->getCategorieName();
        $quantite=$reservation->getQuantite();
        $description=$reservation->getDescription();

$datas = array(':id_reserv_ini'=>$id_reserv_ini, ':id_reserv'=>$id_reserv, ':product_name'=>$product_name,':categorie_name'=>$categorie_name,':quantite'=>$quantite,'description'=>$description);
		$req->bindValue(':id_reserv_ini',$id_reserv_ini);
		$req->bindValue(':id_reserv',$id_reserv);
		$req->bindValue(':product_name',$product_name);
		$req->bindValue(':categorie_name',$categorie_name);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':description',$description);
		
            $s=$req->execute();
    }
        catch (Exception $e)
        {
            echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }	
	}
	
	function recupererReservation($id_reserv){
		$sql="SELECT * from reservation where id_reserv=$id_reserv";
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