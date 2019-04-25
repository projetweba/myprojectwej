<?PHP
include "../config.php";
class LivreurC {
function afficherLivreur ($livreur){

		echo "ID: ".$livreur->getNom()."<br>";
		echo "Adresse: ".$livreur->getAdresse()."<br>";
		echo "Adresse mail: ".$livreur->getMail()."<br>";
		echo "Numero de telephone: ".$livreur->getNum()."<br>";
	}
	
	function ajouterLivreur($livreur){
		$sql="insert into livreur (id_liv,adresse_liv,tel_liv,mail_liv) values (:id_liv,:adresse_liv,:tel_liv,:mail_liv)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id_liv=$livreur->getNom();
        $adresse_liv=$livreur->getAdresse();
        $tel_liv=$livreur->getNum();
        $mail_liv=$livreur->getMail();
		$req->bindValue(':id_liv',$id_liv);
		$req->bindValue(':adresse_liv',$adresse_liv);
		$req->bindValue(':tel_liv',$tel_liv);
		$req->bindValue(':mail_liv',$mail_liv);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherLivreurs(){
		//$sql="SElECT * From livreur e inner join formationphp.livreur a on e.ID= a.ID";
		$sql="SElECT * From livreur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function supprimerLivreur($id_liv){
		$sql="DELETE FROM livreur where id_liv= :id_liv";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_liv',$id_liv);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierLivreur($livreur,$id_liv){
		$sql="UPDATE livreur SET id_liv=:id_liv_ini ,adresse_liv=:adresse_liv,tel_liv=:tel_liv,mail_liv=:mail_liv WHERE id_liv=:id_liv";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id_liv_ini=$livreur->getNom();
        $adresse_liv=$livreur->getAdresse();
        $tel_liv=$livreur->getNum();
        $mail_liv=$livreur->getMail();
		$datas = array(':id_liv_ini'=>$id_liv_ini, ':id_liv'=>$id_liv,':adresse_liv'=>$adresse_liv,':tel_liv'=>$tel_liv,':mail_liv'=>$mail_liv);
		$req->bindValue(':id_liv_ini',$id_liv_ini);
		$req->bindValue(':id_liv',$id_liv);
		$req->bindValue(':adresse_liv',$adresse_liv);
		$req->bindValue(':tel_liv',$tel_liv);
		$req->bindValue(':mail_liv',$mail_liv);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	
	function recupererLivreur($id_liv){
		$sql="SELECT * from livreur where id_liv=$id_liv";
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