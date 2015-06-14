			<header class="jumbotron">
				<h1>Post</h1>
				<p></p>
			</header>
 <div class="row">
    <?php
      $category = array("abstract", "animals", 
                        "business", "cats",
                        "city", "food", "nightlife"
                        ,"fashion", "people",
                        "nature", "sports",
                        "technics", "transport");
    ?>
    <?php foreach ($kost->result() as $pro) { 
       $catImg = rand(0, 12);
      ?>
    <div class="col-sm-6 col-md-8">
      <div class="thumbnail" style="height:530px; width:100%;">
        <img src="http://lorempixel.com/300/300/<?php echo $category[$catImg]; ?>" alt="...">
        <div class="caption">
          <h3><?php echo $pro->alamat; ?></h3>
          <p>
          	Rp.
          <?php echo $pro->harga; ?></p>
          <h4> <?php echo $pro->telepon; ?></h4>
        </div>
      </div>
    </div>
    <?php } ?>
    
  </div>
			<div class="row text-center">
    <nav><?php echo $paging; ?></nav>
  </div>
  <div style="height:400px;" ></div>