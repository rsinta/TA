<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                            Tambah Data Bahan
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <?php echo form_open('bahan/post'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Nama Bahan</label>
                                    <input required  type="text" name="namabahan" class="form-control" placeholder="Nama Bahan">
                                </div>
                                <div class="form-group">
                                    <label>Harga Bahan</label>
                                    <input onkeypress='validate(event)' required  type="text" name="hargabahan" class="form-control" placeholder="Harga ">
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm" >Simpan</button> | 
                                <?php echo anchor('bahan','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->