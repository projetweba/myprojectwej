<?php
include "../core/employeC.php";
if(!empty($_GET['reference']))
{
    $id = checkInput($_GET['reference']);
}
			$db = config::getConnexion();

$statement = $db->prepare("SELECT * FROM produit WHERE reference= ?");
$statement->execute(array($id));
$item = $statement->fetch();

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$titre = $item['nom'];


?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- Mirrored from demo.devitems.com/marten-v1/shop-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Feb 2019 21:56:07 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Marten - Pet Food eCommerce Bootstrap4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        
        <!-- all css here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
<style>
.resize
 {
  display: block;
  max-width:250px;
  max-height:486px;
  width: auto;
  height: auto;
}	
 

<body>
	 <div class="shop-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-img">
       
                        <div class="product-details-content">
					 <ul class="slides">
							<?php echo' <img  src="data:image/jpeg;base64,'.base64_encode($item['image'] ).'" height="200" width="200" class="img-thumnail" />'?> 					 </ul>
							    </div>
                        </div>
                    </div>
				 
		<div class="col-lg-6 col-md-6">
				<h1><?php echo $item['nom'];?></h1>
				<div class="product-rating">
                                <i class="ti-star theme-color"></i>
                                <i class="ti-star theme-color"></i>
                                <i class="ti-star theme-color"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <span> ( 01 Customer Review )</span>
                            </div>
				
				<p class="availability">Categorie: <span class="color"><?php echo $item['categorie'];?></span></p>
			    <div   class="product-price">
			    	
				  <span class="amount item_price actual"><p class="availability">Prix :</p><?php echo number_format((float)$item['prix'], 3, '.', ''). ' DT';?></span>
				</div>
				<div class="sku">
                                
                            </div>
				<h2 class="quick">Description:</h2>
				<p class="quick_desc"> <?php echo $item['description'];?></p>
			    <div class="quality-wrapper mt-30 product-quantity">
                                <label>Qty:</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                </div>
                            </div>
                            <div class="product-list-action">
                                <div class="product-list-action-left">
                                    <a class="addtocart-btn" href="#" title="Add to cart">
                                        <i class="ion-bag"></i>
                                        Add to cart
                                    </a>
                                </div>
                                <div class="product-list-action-right">
                                    <a href="#" title="Wishlist">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="social-icon mt-30">
                                <ul>
                                    <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                                    <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                                    <li><a href="#"><i class="icon-social-skype"></i></a></li>
                                    <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
				  </div>
		          	
	    </div>
			    
			  
			</div>
		  <div class="sku">
                                
                            </div>
		</div>	
		</div>
		<div class="col-md-3 tabs">
	      <h3 class="m_1">Related Products</h3>
	      <?php 

	        $c = config::getConnexion();
			$prd_id=$_GET['reference'];
			$cate = $item['categorie'];
			$req = $c->query ("SELECT * FROM produit WHERE categorie = '$cate' AND reference != '$prd_id' LIMIT 3 ");
			while ($product = $req->fetch(PDO::FETCH_ASSOC)) : 
	      ?>
	    
	      	 <div class="element" id="columns" >
	      	 	<figure>
	      <?php echo  '<img  src="data:image/jpeg;base64,'.base64_encode($product['image'] ).'" height="50" width="100" class="img-thumnail" />';?> 
	     
	      		<h4><a href="single.php?reference=<?php echo $product['reference']."\""?>><?php echo$product['nom']; ?></a></h4>
	      		<p class="single_price"><?php echo $product['prix']." DT"; ?></p>
	      	
	        </li>
	        </figure>
	      </div>
	      
	      					<?php   endwhile; ?>

        </div>     <!-- close here -->
  
	</div>
   </div>
   </div>

   
<!-- FlexSlider -->

 <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/elevetezoom.js"></script>
        <script src="assets/js/ajax-mail.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
</body>
</html>		


