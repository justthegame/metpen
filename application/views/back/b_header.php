<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title;?></title> 
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap-glyphicons.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/backend.blue.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/select2.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/backend.main.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/icheck/flat/blue.css" type="text/css"/>
        
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
                <li class="btn" ><a title="" href="<?php echo site_url(); ?>/guidance/profile"><i class="glyphicon glyphicon-user"></i> <span class="text">Profile</span></a></li>
                <li class="btn"><a title="" href="<?php echo base_url(); ?>index.php/guidance/logout"><i class="glyphicon glyphicon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>

        <div id="sidebar">
            <ul>
                <li <?php if ($this->session->flashdata('home')) { echo "class='active'"; }?>><a href="<?php echo base_url(); ?>index.php/guidance/home"><i class="glyphicon glyphicon-home"></i> <span>Dasbor</span></a></li>
                
                <li class="submenu">
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Materi</span><span class="caret"></span></a>
                    <ul>
                        <?php  if ($this->session->userdata('role')==1||$this->session->userdata('role')==2): ?>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/materi/semua">Lihat Materi</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/materi/tambah">Tambah Materi</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/kelas/semua">Lihat Kelas</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/kelas/tambah">Tambah Kelas</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/pelajaran/semua">Lihat Pelajaran</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/pelajaran/tambah">Tambah Pelajaran</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/bab/semua">Lihat Bab</a></li>
                        <?php  if ($this->session->userdata('role')==1||$this->session->userdata('role')==2): ?>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/bab/tambah">Tambah Bab</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/subbab/semua">Lihat Subbab</a></li>
                        <?php  if ($this->session->userdata('role')==1||$this->session->userdata('role')==2): ?>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/subbab/tambah">Tambah Subbab</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/aksesmateri/semua">Lihat Akses Materi</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/aksesmateri/tambah">Tambah Akses Materi</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                
                <?php  if ($this->session->userdata('role')==1||$this->session->userdata('role')==2): ?>
                <li class="submenu" <?php if ($this->session->flashdata('paket')) { echo "class='active'"; }?>>
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Paket</span><span class="caret"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/paket/semua">Lihat Paket</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/paket/tambah">Tambah Paket</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php  if ($this->session->userdata('role')==1): ?>
                <li class="submenu" <?php if ($this->session->flashdata('pembimbing')) { echo "class='active'"; }?>>
                    <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Pembimbing</span><span class="caret"></span></a>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/pembimbing/semua">Lihat Pembimbing</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/guidance/pembimbing/tambah">Tambah Pembimbing</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php  if ($this->session->userdata('role')==1): ?>
                <li <?php if ($this->session->flashdata('transaksi')) { echo "class='active'"; }?>><a href="<?php echo base_url(); ?>index.php/guidance/transaksi"><i class="glyphicon glyphicon-tint"></i> <span>Transaksi</span></a></li>
                <?php endif; ?>
            </ul>

        </div>
            
