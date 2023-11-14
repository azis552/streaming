
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
                    <h4>Form Transaksi</h4>
                    <a type="button" class="btn btn-warning" href="<?=base_url('admin/data_transaksi')?>">
                        Kembali
                    </a>
                </div>
                <form action="<?=base_url()?>admin/simpan_transaksi"  method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <label for="">ID User</label>
                    <select name="id_user" id="" class="form-control">
                        <?php 
                            foreach($user as $i):
                        ?>
                            <option value="<?= $i->id_user ?>"><?= $i->username ?></option>
                        <?php
                            endforeach;
                        ?>
                        
                    </select>
                        <label for="">Pilihan Paket</label>
                        <select name="id_harga" id="" class="form-control">
                            <?php 
                                foreach($harga as $i):
                            ?>
                                <option value="<?= $i->id_harga ?>"><?= $i->level.' | '.$i->keterangan ?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->