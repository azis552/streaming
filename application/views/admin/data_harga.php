<?php 
    $message = $this->session->flashdata('message');
    if ($message == "berhasil update") {
    ?>
    <script type="text/javascript">
        Swal.fire(
        'Success',
        'Berhasil Update',
        'success'
        )
    </script>
    <?php } ?>
<?php
    if ($message == "gagal update") {
    ?>
    <script type="text/javascript">
        Swal.fire(
        'Error !',
        'Gagal Update',
        'error'
        )
        </script>
<?php } ?>
<?php 
    $message = $this->session->flashdata('message');
        if ($message == "berhasil delete") {
        ?>
        <script type="text/javascript">
            Swal.fire(
            'Success',
            'Berhasil Delete',
            'success'
            )
        </script>
<?php } ?>
<?php
if ($message == "gagal delete") {
    ?>
    <script type="text/javascript">
        Swal.fire(
        'Error !',
        'Gagal Delete',
        'error'
        )
    </script>
<?php } ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4>Data Harga</h4>
                    <a type="button" class="btn btn-info" href="<?=base_url('admin/tambah_member')?>">
                        Tambah Member
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-light">
                        <thead>
                            <th>NO</th>
                            <th>Level Member</th>
                            <th>Masa Member</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php $x=1; 
                            foreach($member as $m) :
                            ?>
                            <tr>
                                <td><?= $x ?></td>
                                <td><?= $m->level ?></td>
                                <td><?= $m->keterangan ?></td>
                                <td><?='Rp'.number_format($m->harga, 0, ".", ",");  ?></td>
                                <td>
                                <a href="<?= base_url()?>admin/update_member?id=<?= $m->id_harga?>" type="button" class="btn btn-warning"><i class="fas fa-pencil-alt">Edit</i></a>
                                <a href="<?= base_url()?>admin/delete_member?id=<?= $m->id_harga?>" type="button" class="btn btn-danger"><i class="fas fa-trash">Hapus</i></a>
                                </td>
                            </tr>
                            <?php 
                            $x++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->