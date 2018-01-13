<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu Makanan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php
                                if(!empty($notif)){
                                    echo '<div class="alert alert-danger">'.$notif.'</div>';
                                }
                            ?>

            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url();?>index.php/admin/tambah_menu_bulanan" class="btn btn-success"><i class="fa fa-plus fa-fw"></i>Tambah Menu Bulanan</a>
                    
                    <a href="<?php echo base_url();?>index.php/admin/histori_menu" class="btn btn-success"><i class="fa fa-plus fa-fw"></i>Histori Menu Bulanan</a>
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Menu</th>
                                <th>Menu</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>

                            <?php $no = 1;
                                foreach ($menu as $data) {
                                    echo '
                                        <tr>
                                            <td>'.$no.'</td>
                                            <td>'.$data->id_menu.'</td>
                                            <td>'.$data->menu.'</td>
                                            <td>'.$data->harga.'</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-search"></i> Lihat </a>
                                                <a href="#" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus </a>
                                            </td>
                                        </tr>
                                    ';
                                    $no++;
                                }
                            ?>

                        </thead>
                        <tbody>
                        


                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->