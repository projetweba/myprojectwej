<?PHP

include "../core/categorieC.php";

if (isset($_POST['referencee']) and isset($_POST['nomcat']) ){
$categorie1=new categorie($_POST['referencee'],$_POST['nomcat']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$categorie1C=new categorieC();
$categorie1C->ajoutercategorie($categorie1);
header('Location: alert2.php');

	
}else{
	echo "vérifier les champs";
}
//*/

?>