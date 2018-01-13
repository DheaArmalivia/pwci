
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Penambahan Menu Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">



                            <form action="<?php echo base_url();?>index.php/admin/do_insert_menu_baru" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Menu</label>
                                    <input class="form-control" placeholder="Enter text" name="menu" id="menu"  autofocus="">
                                </div>

                                <label>Harga</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control" name="harga" id="harga" >
                                    <span class="input-group-addon">.00</span>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input class="form-control" placeholder="Enter text" name="keterangan" id="keterangan" >
                                </div>

                                <!-- <div class="form-group">
                                    <label>File input</label>
                                    <input type="file" name="foto" required>
                                </div> -->

                                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                <input type="reset" class="btn btn-default" value="Reset">
                            </form>

                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                       
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->