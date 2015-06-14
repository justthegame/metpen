			<header class="jumbotron">
				<h1>Post</h1>
				<p></p>
			</header>

			<div class="row col-md-12">
				<article class="col-md-9">
					<h3>Newest Post</h3>
					<?php foreach($a->result() as $lain) { ?>
					<h4><a href="<?php echo base_url(); ?>index.php
								/fakultasx/bacafakultas/<?php echo $lain->id; ?>">
								<?php echo $lain->judul; ?></a>	</h4>
								<?php echo $lain->isi; ?> <BR>	
								Posted by <?php echo $lain->namaFakultas; ?>	
							
						<?php } ?>
				</article>
			</div>
			<div class="row text-center">
    <nav><?php echo $paging; ?></nav>
  </div>
  <div style="height:400px;" ></div>