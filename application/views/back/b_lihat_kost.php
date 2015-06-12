            <div id="content">
            <div id="content-header">
                <h1>Lihat Kost</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Kost</a>
                <a href="#" class="current">Lihat Kost</a>
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
                                                    <th>Gambar</th>
                                                    <th>Alamat</th>
                                                    <th>Telepon</th>
                                                    <th>Harga</th>       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                        if ($kost){
                                                            foreach($kost->result() as $row){
                                                                echo " <tr><td><img src='".base_url()."foto/".$row->gambar."'></td>"
                                                                        . " <td>".$row->alamat."</td>"
                                                                        . " <td>".$row->telepon."</td>"
                                                                        . " <td>".$row->harga."</td>"
                                                                        . " <td><a class='btn btn-primary' href='".site_url()."/kost/hapus/".$row->id."'>Hapus</a></td></tr>";
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

      