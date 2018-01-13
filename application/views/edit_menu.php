
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Edit Menu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">

                            <form action="<?php echo base_url(); ?>index.php/admin/do_edit_menu/<?php echo $edit_menu->id_menu;?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Menu</label>
                                    <input class="form-control" placeholder="Enter text" name="menu" value="<?php echo $edit_menu->menu; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Harga</label>
                                    <input class="form-control" placeholder="Enter text" name="harga" value="<?php echo $edit_menu->harga; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input class="form-control" placeholder="Enter text" name="keterangan" value="<?php echo $edit_menu->keterangan; ?>" required>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                <a href="<?php echo base_url();?>index.php/admin/data_menu" class="btn btn-primary">
                                Back
                                </a>
                            </form>

                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                       
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->