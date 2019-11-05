<div class="row">
                    <div class="col-md-12">
                        <h2 align="center" class="page-header">
                            Edit Data Jasa Kirim
                        </h2>
                    </div>
                </div> 
<?php
echo form_open('jasakirim/edit');
?>
<input type="hidden" value="<?php echo $record['id_jasa_layanan_kirim']?>" name="id">
<table class="table table-bordered">
    <tr><td width="130">Nama Jasa Kirim</td>
        <td><div class="col-sm-4""><input required type="text" name="jasakirim" placeholder="Jasa Kirim" class="form-control"
                   value="<?php echo $record['nama_jasa_layanan_kirim']?>"></div>
       </td></tr>
    <tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button> 
        <?php echo anchor('jasakirim ','Kembali',array('class'=>'btn btn-primary btn-sm'))?></td></tr>
</table>
</form>