<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Unicorn Admin</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-glyphicons.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/unicorn.login.css" />
    </head>
    <body>
        <div id="container">
            <div id="logo">
                <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" />
            </div>
            <?php if ($this->session->flashdata('warning'))
                        {  echo $this->session->flashdata('warning'); }?>
            <div id="loginbox">   
                
                <?php $attributes = array('id' => 'loginform'); 
                       echo form_open("/admin/login",$attributes); ?>
    				<p>Enter username and password to continue.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input class="form-control" type="text" name="username" placeholder="Username" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input class="form-control" type="password" name="password" placeholder="Password" />
                    </div>
                    <hr />
                    <div class="form-actions">
                        <div class="pull-right"><input name="submit" type="submit" class="btn btn-default" value="Login" /></div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>  
        <script src="<?php echo base_url(); ?>assets/js/unicorn.login.js"></script> 
    </body>
</html>
