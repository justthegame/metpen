            <div id="content">
            <div id="content-header">
                <h1>Tambah Kost</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/admin" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="<?php echo site_url(); ?>/fakultas/lihat" class="tip-bottom">Kost</a>
                <a href="#" class="current">Tambah Kost</a>
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
                                <?php $attributes = array('class' => 'form-horizontal'); 
                                    echo form_open_multipart(current_url(),$attributes); ?>
          
                                    <div class="form-group">
                                        <label class="control-label">Alamat:</label>
                                        <div class="controls">
                                            <textarea class="form-control" name="alamat"><?php if($temp) echo $temp['alamat']; ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Harga:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="harga" name="harga" value="<?php if($temp) echo $temp['judul']; ?>" required/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Telepon:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="telepon" name="telepon" value="<?php if($temp) echo $temp['judul']; ?>" required/>
                                        </div>
                                    </div>
                                    
                                   <div class="form-group">
					<label class="control-label">Gambar Kamar:</label>
					<div class="controls">
                                            <input type="file" class="form-control input-small" name="link" required/>
					</div>
                                    </div>

                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Simpan" />
                                        <a class="btn btn-default" href="<?php echo site_url().'/kost/lihat'; ?>">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>