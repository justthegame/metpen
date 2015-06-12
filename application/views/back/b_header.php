<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title;?></title> 
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-glyphicons.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/unicorn.grey.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/unicorn.main.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icheck/flat/blue.css" type="text/css"/>
        
        <style>
            .modal-backdrop {
                z-index: 0;
            }
        </style>
        
    </head>
    <body>
        <div id="header">
            <h1><a href="#">Portal Informasi Maharu UBAYA</a></h1>    
            <a id="menu-trigger" href="#"><i class="glyphicon glyphicon-align-justify"></i></a> 
        </div>

        <div id="user-nav">
            <ul class="btn-group">
                <li class="btn"><a title="" href="<?php echo base_url(); ?>index.php/admin/logout"><i class="glyphicon glyphicon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>

        <div id="sidebar">
            <ul>
                <li <?php if ($this->session->flashdata('home')) { echo "class='active'"; }?>><a href="<?php echo base_url(); ?>index.php/admin/"><i class="glyphicon glyphicon-home"></i> <span>Dasbor</span></a></li>
                
                <?php  if ($this->session->userdata('role')): ?>
                <li class="submenu" <?php if ($this->session->flashdata('jadwal')) { echo "class='active'"; }?>>
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Jadwal MOB</span><span class="caret"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>index.php/jadwal/lihat">Lihat Jadwal</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/jadwal/tambah">Tambah Jadwal</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                
                <?php  if ($this->session->userdata('role')): ?>
                <li class="submenu" <?php if ($this->session->flashdata('kost')) { echo "class='active'"; }?>>
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Tempat Kost</span><span class="caret"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>index.php/kost/lihat">Lihat Kost</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/kost/tambah">Tambah Kost</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                
                <?php  if ($this->session->userdata('role')): ?>
                <li class="submenu" <?php if ($this->session->flashdata('post')) { echo "class='active'"; }?>>
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Post</span><span class="caret"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>index.php/post/lihat">Lihat Post</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/post/tambah">Tambah Post</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                
                <?php  if ($this->session->userdata('role') == "Administrator"): ?>
                <li class="submenu" <?php if ($this->session->flashdata('fakultas')) { echo "class='active'"; }?>>
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Fakultas</span><span class="caret"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>index.php/fakultas/lihat">Lihat Fakultas</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/fakultas/tambah">Tambah Fakultas</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                
                <?php  if ($this->session->userdata('role') == "Administrator"): ?>
                <li class="submenu" <?php if ($this->session->flashdata('user')) { echo "class='active'"; }?>>
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>User</span><span class="caret"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>index.php/user/lihat">Lihat User</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/user/tambah">Tambah User</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                
            </ul>

        </div>
            
