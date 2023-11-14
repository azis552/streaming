<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4>Data Film</h4>
                    <a type="button" class="btn btn-info" href="<?= base_url('admin/tambah_film') ?>">
                        Tambah Film
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th>Genre</th>
                                <th>Link</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x=1;
                                foreach($film as $i) :
                            ?>
                            <tr>
                                <td><?= $x ?></td>
                                <td><?= $i->judul ?></td>
                                <td>
                                    <img src="<?= base_url('') ?>assets/gambar_film/<?= $i->foto ?>" 
                                    alt="gambar film" width="60" height="60">
                                </td>
                                <td><?= $i->genre ?></td>
                                <td><?= $i->link ?></td>
                                <td><?= $i->level ?></td>
                                <td>
                                    <a href="<?= base_url() ?>admin/detail_film?id=<?= $i->id_film?>" class="btn btn-info">detail</a>
                                    <a href="<?= base_url() ?>admin/edit_film?id=<?= $i->id_film?>" class="btn btn-warning">edit</a>
                                    <a href="" class="btn btn-danger">hapus</a>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->