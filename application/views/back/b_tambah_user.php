            <div id="content">
            <div id="content-header">
                <h1>Tambah User</h1>
            </div>
            <div id="breadcrumb">
                <a href="<?php echo site_url(); ?>/admin" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="<?php echo site_url(); ?>/user/lihat" class="tip-bottom">User</a>
                <a href="#" class="current">Tambah User</a>
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
                                        <label class="control-label">Username:</label>
                                        <div class="controls">
                                            <input type="text" class="form-control input-small" placeholder="username" name="username" value="<?php if($temp) echo $temp['username']; ?>" required/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Password:</label>
                                        <div class="controls">
                                            <input type="password" class="form-control input-small" placeholder="password" name="password" value="<?php if($temp) echo $temp['password']; ?>" required/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Ulangi Password:</label>
                                        <div class="controls">
                                            <input type="password" class="form-control input-small" placeholder="ulangi pasword" name="ulangPassword" value="<?php if($temp) echo $temp['ulangPassword']; ?>" required/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
					<label class="control-label">ID Fakultas</label>
					<div class="controls">
                                            <select name="idFakultas" required>
                                            <?php
                                                if ($fakultas){
                                                    foreach($fakultas->result() as $row){
                                                        echo "<option value='".$row->id."'>".$row->nama."</option>";
                                                    }
                                                }
                                            ?>
                                            </select>
					</div>
                                    </div>
                                    
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Simpan" />
                                        <a class="btn btn-default" href="<?php echo site_url().'/user/lihat'; ?>">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>