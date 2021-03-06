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
        <h2 style="margin-top:0px">Siswa List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('siswa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('siswa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('siswa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nm Siswa</th>
		<th>Nis</th>
		<th>Kelamin</th>
		<th>Agama</th>
		<th>Tempat Lahir</th>
		<th>Email</th>
		<th>Alamat</th>
		<th>No Telepon</th>
		<th>Password</th>
		<th>Action</th>
            </tr><?php
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $siswa->nm_siswa ?></td>
			<td><?php echo $siswa->nis ?></td>
			<td><?php echo $siswa->kelamin ?></td>
			<td><?php echo $siswa->agama ?></td>
			<td><?php echo $siswa->tempat_lahir ?></td>
			<td><?php echo $siswa->email ?></td>
			<td><?php echo $siswa->alamat ?></td>
			<td><?php echo $siswa->no_telepon ?></td>
			<td><?php echo $siswa->password ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('siswa/read/'.$siswa->kd_siswa),'Read'); 
				echo ' | '; 
				echo anchor(site_url('siswa/update/'.$siswa->kd_siswa),'Update'); 
				echo ' | '; 
				echo anchor(site_url('siswa/delete/'.$siswa->kd_siswa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>