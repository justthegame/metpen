            <div id="content">
            <div id="content-header">
                <h1>Tambah Fakultas</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/admin" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="<?php echo site_url(); ?>/fakultas/lihat" class="tip-bottom">Fakultas</a>
                <a href="#" class="current">Tambah Fakultas</a>
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
                                        <label class="control-label">Nama Fakultas:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="Nama" name="nama" value="<?php if($temp) echo $temp['nama']; ?>" required/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Deskripsi</label>
                                        <div class="controls">
                                            <textarea class="form-control" name="deskripsi"><?php if($temp) echo $temp['deskripsi']; ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Simpan" />
                                        <a class="btn btn-default" href="<?php echo site_url().'/fakultas/lihat'; ?>">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>