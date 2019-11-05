<div class="row">
                    <div class="col-md-12">
                        <h2 align="center" class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                            Edit Data Bahan
                        </h2>
                    </div>
                </div> 
                <?php
                echo form_open('bahan/edit');
                ?>
                <input type="hidden" value="<?php echo $record['id_bahan']?>" name="id">
                <table class="table table-bordered">
                    <tr><td width="130">Nama Bahan</td>
                        <td><div class="col-sm-4""><input required type="text" name="namabahan" placeholder="Nama Bahan" class="form-control"
                                value="<?php echo $record['nama_bahan']?>"></div>
                    </td></tr>
                    <tr><td width="130">Harga Bahan</td>
                        <td><div class="col-sm-4""><input required type="text" name="hargabahan" placeholder="Harga Bahan" class="form-control"
                                value="<?php echo $record['harga_bahan']?>"></div>
                    </td></tr>
                    <tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button> 
                        <?php echo anchor('bahan','Kembali',array('class'=>'btn btn-primary btn-sm'))?></td></tr>
                </table>
                </form>