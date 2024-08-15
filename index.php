<?php
	include_once('header.php');
?>

  <!--====== ABOUT FIVE PART START ======-->

    <!-- Start header Area -->
  <section id="hero-area" style="margin-top:0px;    padding-top: 0px;    padding-bottom: 50px;" class="header-area header-eight">
    <div class="container mb-5">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-12 col-12  ">
          <div class="header-content mt-5 pt-5" >
            <h1 class="pt-5" style="margin-top:20px;">Impressive Gift Shop: <br>Where Every Gift Tells <br>Your Story</h1>
            <p style="font-size: 20px;color: black;opacity:1;font-weight: 500 !important;/* font-family: roboto; */">
              Crafting personalised wonders with care and creativity. <br>Thoughtful touches that turn moments into memories. Unique <br>gifts that truly matter.
            </p>
            <div class="button">
              <a href="product.php" ><img src="assets/images/ourproductbutton.png" width="204" height="50" alt="Our Products"></a>
          
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12">
          <div class="header-image" style="position: relative;">
            <img src="assets/images/header/hero-image.png" alt="#" width="636" height="641" style=""/>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End header Area -->
  <!-- ===== service-area start ===== -->
  <section id="services" class="services-area services-eight">
    <!--======  Start Section Title Five ======-->
	<div class="container pb-5">
	<h2 style="font-size: 40px !important;">Best gifts for your occasion</h2>
	<hr class="bbred">
	</div>
    
    <!--======  End Section Title Five ======-->
    <div class="container">
      <div class="row">
          <?php
           require_once 'db.php';
            $sql = "SELECT * FROM categories where status=1 ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-md-6 pb-5 ">
            		  <a href="product.php" ><img src="assets/images/'.$row['image'].'" width="392" height="361" alt="#" />
            		  <h2 class="categoryname">'.$row['name'].'</h2></a>
                    </div>';
                }
            }
            
            // Close the connection
            $conn->close();
            
            ?>
      </div>
    </div>
  </section>
  <!-- ===== service-area end ===== -->


  <!-- Start Brand Area -->
  <div id="clients" class="brand-area section">
    <!--======  Start Section Title Five ======-->
    <div class="section-title-five mb-0">
	<div class="row">
          <div class="col-12">
            <div class="content">
              <h2 style="margin-top: 40px;">Our Happy Clients <hr class="bbred mx-auto"></h2>
            </div>
          </div>
        </div>
	</div>
	<div class="container whitebg pt-5 pb-5">
	<div id="testimonialCarousel" class="carousel slide mx-auto" data-bs-ride="carousel">
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <div class="row">
				<div class="col-md-6 col-12 shadow testibox">
				  <div class="testimonial">
					<p class="testimonial-author">Jayakumar Prabakaran</p>
					<p class="text-center testi-msg pt-4">I received the order recently... the items was exactly as u shown me... great work... ur edit says that ur a pro edited... soon will give u next order...  thanks a lot...</p>
					<p class="testimonial-author text-center pt-5"><img src="assets/images/star.png" alt="#" width="226" height="28"/></p>
				  </div>
				</div>
				<div class="col-md-6 col-12  shadow testibox">
				   <div class="testimonial">
					<p class="testimonial-author">Vignesh Viki</p>
					<p class="text-center testi-msg pt-4">I recently ordered a gift for my sister birthday i had no idea wat to give as a present i just suggested impressive gift the gift should feel memorable and something precious ...they created a beautiful gift ...i recommended impressive gift to everyone and thankyou so much impressive gift.</p>
					<p class="testimonial-author text-center pt-5"><img src="assets/images/star.png" alt="#" width="226" height="28"/></p>
				  </div>
				</div>
			  </div>
			</div>
			<!-- Add more carousel-item as needed -->
			<div class="carousel-item ">
			  <div class="row">
				<div class="col-md-6 col-12  shadow testibox">
				    <div class="testimonial">
					<p class="testimonial-author">Vaishnavi Vaish</p>
					<p class="text-center testi-msg pt-4">Thank you so much for making the day memorable... Perfect finishing loved it.. Done perfectly within short time... Deliverd within time...</p>
					<p class="testimonial-author text-center pt-5"><img src="assets/images/star.png" alt="#" width="226" height="28"/></p>
				  </div>
				</div>
				<div class="col-md-6 col-12 shadow testibox">
				   <div class="testimonial">
					<p class="testimonial-author">Deepika Deepi</p>
					<p class="text-center testi-msg pt-4">Thank you for making special days into more special by your gifts .....Really felt happy by your impressive gifts....Doing great</p>
					<p class="testimonial-author text-center pt-5"><img src="assets/images/star.png" alt="#" width="226" height="28"/></p>
				  </div>
				</div>
			  </div>
			</div>
			
			<!-- Add more carousel-item as needed -->
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		  </button>
		</div>
     
        
        <!-- row -->
		
		
      </div>
	 
      <!-- container -->
    </div>
	 
    <!--======  End Section Title Five ======-->
    
  </div>
  <div class="container" style="
">
      <div class="row p-4 mt-4 mb-4 hpclients">
        <div class="col-lg-6 col-12 mx-auto">
          <div class="clients-logos d-flex ">
            <div class="single-image socialicon">
              <img src="assets/images/happy.png" height="187" width="191" alt="Brand Logo Images">
            </div>
			<div class="single-image socialicon">
              <img src="assets/images/delivery.png" height="187" width="191" alt="Brand Logo Images">
            </div>
            <div class="single-image socialicon">
              <img src="assets/images/gaurantee.png" height="187" width="191" alt="Brand Logo Images">
            </div>
            
          </div>
        </div>
      </div>
    </div>
  <!-- End Brand Area -->
<?php
	include_once('footer.php');
?>
 