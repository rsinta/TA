<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Edit Data Pengrajin
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('pengrajin/edit'); ?>
                                <input type="hidden" value="<?php echo $record['id_pengrajin']?>" name="id">
                                <div class="form-group">
                                    <label>Nama Pengrajin</label>
                                    <input type="text" class="form-control" value="<?php echo $record['nama_pengrajin']?>" name="nama" placeholder="nama lengkap">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" value="<?php echo $record['alamat']?>" name="alamat" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <label>Nomer Telp</label>
                                    <input onkeypress='validate(event)' type="text" class="form-control" value="<?php echo $record['no_telp']?>" name="nomertelp">
                                </div>
                                <div class="form-group">
                                    <label>Harga Jasa</label>
                                    <input onkeypress='validate(event)' type="text" class="form-control" value="<?php echo $record['harga_jasa']?>" name="hargajasa">
                                </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm" style="margin-top:10px;" >Update</button>
                                <?php echo anchor('pengrajin','Kembali',array('class'=>'btn btn-danger btn-sm', 'style'=>'margin-top: 10px;'))?>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->

                <script type = "text/javascript">
                    var bagian = document.getElementById("bagian");
                    bagian.value = "<?php echo $record['bagian']?>";

                    var jekel = document.getElementById("Jekel");
                    jekel.value = "<?php echo $record['jenis_kelamin']?>";

                     var level = document.getElementById("level");
                     level.value = "<?php echo $record['level']?>";
                </script>