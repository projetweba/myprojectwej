

<?php  
include "../entities/employe.php";
 $connect = mysqli_connect("localhost", "root", "", "zanimobd");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$reference= mysqli_real_escape_string($connect, $_POST['reference']);
		$nom = mysqli_real_escape_string($connect, $_POST['nom']);
			$categorie= mysqli_real_escape_string($connect, $_POST['categorie']);
				$prix = mysqli_real_escape_string($connect, $_POST['prix']);
				$description =mysqli_real_escape_string($connect, $_POST['description']);


 $query = "INSERT INTO produit(reference,nom,categorie,prix,description,image) values ('$reference','$nom','$categorie','$prix','$description','$file')";  

 header('Location: form-elements.php');
		
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 ?> 
