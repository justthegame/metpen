<?php $this->load->helper("url"); ?>
<html>
	<head>
	<title>Metpen UAS</title>
		<link rel="stylesheet" 
	  	href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet"
		href="<?php echo base_url(); ?>fontawesome/css/font-awesome.min.css">
		<script 
		src="<?php echo base_url(); ?>bootstrap/js/jquery.js"></script>
		<script 
		src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<div class="container">
			<nav class="navbar  navbar-default" role="navigation">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#"><i class="fa fa-home"></i></a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			      	<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Fakultas <span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			          	<?php foreach ($header->result() as $key)
			          			{ ?>
			          				<li><a href="<?php echo base_url(); ?>index.php
								/fakultasx/bacafakultas/<?php echo $key->id; ?>"><?php echo $key->nama; ?></a></li>
			          				<?php
			          			}
			          	?>
			          </ul>
			        </li>
			        <li class="active"><a href="#">Info MOB</a></li>
			        <li><a href="#">Info Tempat Kost</a></li>
			        <li><a href="#">Berita</a></li>
			      </ul>
			      
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			