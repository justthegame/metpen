            <div id="content">
            <div id="content-header">
                <h1>Lihat Fakultas</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Fakultas</a>
                <a href="#" class="current">Lihat Fakultas</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-box">
<!--                                <div class="widget-title">
                                        <span class="icon">
                                                <i class="glyphicon glyphicon-th"></i>
                                        </span>
                                        <h5>Dynamic table</h5>
                                </div>-->
                                <div class="widget-content nopadding">
                                        <table class="table table-bordered table-striped table-hover data-table">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Deskripsi</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                        if ($fakultas){
                                                            foreach($fakultas->result() as $row){
                                                                echo " <tr><td>".$row->nama."</td>"
                                                                        . " <td>".$row->deskripsi."</td>"
                                                                        . " <td><a class='btn btn-primary' href='".site_url()."/fakultas/hapus/".$row->id."'>Hapus</a></td></tr>";
                                                            }
                                                        }
                                                    ?>

                                            </tbody>
                                        </table>  
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

      