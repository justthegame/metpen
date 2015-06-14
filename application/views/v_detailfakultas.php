			<header class="jumbotron">
				<h1><?php echo $fakultas->result()[0]->nama; ?></h1>
				<p></p>
			</header>

			<div class="row col-md-12">
				<article class="col-md-9">
					<h3><?php echo $fakultas->result()[0]->nama; ?></h3>
					<p><?php echo $fakultas->result()[0]->deskripsi;; ?></p>
				</article>
				<aside class="well col-md-3">
					<h4>Fakultas Lainnya</h4>
					<ul class="nav nav-pills nav-stacked">
						<?php foreach($a->result() as $lain) { ?>
						<li>
							<a href="<?php echo base_url(); ?>index.php
								/fakultasx/bacafakultas/<?php echo $lain->id; ?>">
								<?php echo $lain->nama; ?>	

							</a>
						</li>
						<?php } ?>
					</ul>
				</aside>
			</div>