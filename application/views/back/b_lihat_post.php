            <div id="content">
            <div id="content-header">
                <h1>Lihat Post</h1>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
                <a href="#" class="tip-bottom">Post</a>
                <a href="#" class="current">Lihat Post</a>
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
                                                    <th>Judul</th>
                                                    <th>Isi</th>
                                                    <th>Nama Fakultas</th>
                                                    <th>Action</th>       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                        if ($post){
                                                            foreach($post->result() as $row){
                                                                echo " <tr><td>".$row->judul."</td>"
                                                                        . " <td>".$row->isi."</td>"
                                                                        . " <td>".$row->namaFakultas."</td>"
                                                                        . " <td><a class='btn btn-primary' href='".site_url()."/post/hapus/".$row->id."'>Hapus</a></td></tr>";
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

      