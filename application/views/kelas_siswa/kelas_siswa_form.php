<!doctype html>
<html>
    <head>
        <title>Acces_1412520080</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Kelas_siswa <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">Kd Siswa <?php echo form_error('kd_siswa') ?></label>
            <input type="text" class="form-control" name="kd_siswa" id="kd_siswa" placeholder="Kd Siswa" value="<?php echo $kd_siswa; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kelas_siswa') ?>" class="btn btn-default">Batal</a>
	</form>
    </body>
</html>