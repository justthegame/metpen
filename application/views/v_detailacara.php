			<header class="jumbotron">
				<h1>Jadwal MOB</h1>
				<p></p>
			</header>

			<div class="row col-md-12">
				<article class="col-md-9">
					<?php foreach($a->result() as $lain) { ?>
					<h3><?php echo $lain->namaAcara; ?></h3>
					<p>Jam Awal :<?php echo $lain->jamAwal; ?></p>
					<p>Jam Akhir :<?php echo $lain->jamAkhir; ?></p>
					<p>Tempat :<?php echo $lain->tempat; ?></p>
					<p>Penyelenggara :<?php echo $lain->namaFakultas; ?></p>
					<?php } ?>
				</article>
			</div>