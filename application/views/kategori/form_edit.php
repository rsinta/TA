<div class="row">
                    <div class="col-md-12">
                        <h2 align="center" class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                            Edit Data Kategori
                        </h2>
                    </div>
                </div> 
<?php
echo form_open('kategori/edit');
?>
<input type="hidden" value="<?php echo $record['id_kategori']?>" name="id">
<table class="table table-bordered">
    <tr><td width="130">Nama Kategori</td>
        <td><div class="col-sm-4""><input required type="text" name="kategori" placeholder="kategori" class="form-control"
                   value="<?php echo $record['nama_kategori']?>"></div>
       </td></tr>
    <tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button> 
        <?php echo anchor('kategori','Kembali',array('class'=>'btn btn-primary btn-sm'))?></td></tr>
</table>
</form>