<?php 
$titre = 'Boutique';

include "../config2.php";
        $sql="SElECT * From categorie ";
        $db = config2::getConnexion();
    
        $cat=$db->query($sql);

?>
<style>
 .element {
width: 150px; 
height: 100px;
margin:0px;
position:relative;
display:inline-block;
vertical-align:top;    
}
div#columns figure {
	display: inline-block;
	background: #FEFEFE;
	border: 2px solid #FAFAFA;
	box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
	margin: 0 0px 15px;
	-webkit-column-break-inside: avoid;
	-moz-column-break-inside: avoid;
	column-break-inside: avoid;
	padding: 15px;
	padding-bottom: 5px;
	background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9);
	opacity: 1;
	-webkit-transition: all .3s ease;
	-moz-transition: all .3s ease;
	-o-transition: all .3s ease;
	transition: all .3s ease;
}

#columns figure:hover{
	-webkit-transform: scale(1.1);
	-moz-transform:scale(1.1);
	transform: scale(1.1);

}
#columns:hover figure:not(:hover) {
	opacity: 0.4;
}

</style>
<body>
   <div class="men">
    <div class="container">
    	<div class="col-md-4 sidebar_men">
    	  <h3>Categories</h3>
    	  <ul class="product-categories color">
    	  <li class="cat-item cat-item-63"><a href="shop.php">Tout</a> <span class="count"></span></li>
    	  	<?php
			foreach($cat as $row)
			{
		$cat_nom = $row['nomcat'];
		echo "<li class=\"cat-item cat-item-63\"><a href=\"shop.php?categorie=". $cat_nom ."\">". $cat_nom ."</a> <span class=\"count\"></span></li>";
			}

		?>
			
			

		 </ul>

		</div>
    

<?php



	
	include "../config.php";

	$c = config::getConnexion();

	if(isset($_GET['categorie']))
	{
	$nom=$_GET['categorie'];
	$req = $c->query ("SELECT * FROM produit WHERE categorie = '$nom' ");
	}
	else
	{
	$req = $c->query ("SELECT * FROM produit");
	}

					while ($product = $req->fetch(PDO::FETCH_ASSOC)) : 




?>


					  <div class="element" id="columns" >
							<a  href="single.php?reference=<?PHP echo $product['reference']; ?> "> 
						
					   		<figure>
								
								<div > <?php echo' <img  src="data:image/jpeg;base64,'.base64_encode($product['image'] ).'" height="500" width="500" class="img-thumnail" />'?> </div> 
									
			                       		<div class="product-action"><a href="single.php?reference=<?PHP echo $product['reference']; ?> ">Quick View</a></div>
					                
					             
									   <h4><?php echo $product['nom']; ?></h4>
									   <p><?php echo$product['categorie']; ?></p>
									   <div  ><?php echo $product['prix']; ?></div>
								</figure>	  
										
							</div>
						
			                    
		                     
		                      </a>
		                   
					


					<?php   endwhile; ?>
						
					
				
    	</div>
    </div>
   </div>
   </div>
</body>
</html>		


<?php 

?>