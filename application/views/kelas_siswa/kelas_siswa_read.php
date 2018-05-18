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
        <h2 style="margin-top:0px">Kelas_siswa Read</h2>
        <table class="table">
	    <tr><td>Kd Siswa</td><td><?php echo $kd_siswa; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kelas_siswa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>