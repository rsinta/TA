<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TOKO LINTANG<br>Edit Data Supliyer
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('supliyer/edit'); ?>
                                <input type="hidden" value="<?php echo $record['id_supliyer']?>" name="id">
                                <div class="form-group">
                                    <label>Nama Supliyer</label>
                                    <input type="text" class="form-control" name="nama" placeholder="nama lengkap"  value="<?php echo $record['nama']?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="alamat"  value="<?php echo $record['alamat']?>">
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input  onkeypress='validate(event)' type="text" class="form-control" name="notelp" placeholder="no telp"  value="<?php echo $record['kontak']?>">
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('operator','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
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