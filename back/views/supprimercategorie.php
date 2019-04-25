<?PHP
include "../core/categorieC.php";
$categorieC=new categorieC();
if (isset($_POST["referencee"])){
	$categorieC->supprimercategorie($_POST["referencee"]);
	header('Location: alert2.php');
}

?>