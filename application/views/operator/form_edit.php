                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TOKO LINTANG<br>Edit Data Operator
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('operator/edit'); ?>
                                <input type="hidden" value="<?php echo $record['id_karyawan']?>" name="id">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?php echo $record['nama']?>" name="nama" placeholder="nama lengkap">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" value="<?php echo $record['alamat']?>" name="alamat" placeholder="username">
                                </div>
                                <div class="form-group">
                                <label>Bagian</label>
                                    <select id = "bagian" name="bagian" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="Superadmin">Superadmin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label>Jenis Kelamin</label>
                                    <select  name="jk" id="Jekel"  class="form-control">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nomer Telp</label>
                                    <input onkeypress='validate(event)' type="text" class="form-control" value="<?php echo $record['nomor_telp']?>" name="nomertelp">
                                </div>
                                <label>Level</label>
                                    <select name="level" id="level" class="form-control">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    </select>
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm" style="margin-top:10px;" >Update</button>
                                <?php echo anchor('operator','Kembali',array('class'=>'btn btn-danger btn-sm', 'style'=>'margin-top: 10px;'))?>
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