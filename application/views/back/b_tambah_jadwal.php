            <div id="content">
            <div id="content-header">
                <h1>Tambah Jadwal</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/admin" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="<?php echo site_url(); ?>/fakultas/lihat" class="tip-bottom">Jadwal</a>
                <a href="#" class="current">Tambah Jadwal</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
                            <?php if ($this->session->flashdata('warning'))
                                {  echo $this->session->flashdata('warning'); }?>
                            <?php 
                                $temp=array();
                                if ($this->session->flashdata('isiform'))
                                {  
                                    $temp = $this->session->flashdata('isiform');
                                }
                            ?>
                            <div class="widget-content">
                                <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
                                    <div class="form-group">
                                        <label class="control-label">Nama Acara:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="nama acara" name="nama" value="<?php if($temp) echo $temp['nama']; ?>" required/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Tempat</label>
                                        <div class="controls">
                                            <textarea class="form-control" name="tempat"><?php if($temp) echo $temp['tempat']; ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">Tanggal Awal</label>
					<div class="controls">
                                            <input type="date" class="form-control input-small" placeholder="jam awal" name="jamAwal" value="<?php if($temp) echo $temp['jamAwal']; ?>" required/>
					</div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">Tanggal Akhir</label>
					<div class="controls">
                                            <input type="date" class="form-control input-small" placeholder="jam akhir" name="jamAkhir" value="<?php if($temp) echo $temp['jamAkhir']; ?>" required/>
					</div>
                                    </div>
                                    
                                    <input type="hidden" name="idFakultas" value="<?php echo $this->session->userdata('idFakultas') ?>">

                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Simpan" />
                                        <a class="btn btn-default" href="<?php echo site_url().'/jadwal/lihat'; ?>">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>