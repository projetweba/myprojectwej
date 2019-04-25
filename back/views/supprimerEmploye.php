<?PHP
include "../core/employeC.php";
$employeC=new EmployeC();
if (isset($_POST["reference"])){
	$employeC->supprimerEmploye($_POST["reference"]);
	header('Location: alert.php');
}

?>