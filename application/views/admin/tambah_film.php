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
                    <a type="button" class="btn btn-warning" href="<?= base_url('admin/data_film') ?>">
                        Kembali
                    </a>
                </div>
                <form action="<?= base_url() ?>admin/simpan_film" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" name="judul">
                        <label for="">Link</label>
                        <input type="text" class="form-control" name="link">
                        <label for="">Genre</label>
                        <input type="text" class="form-control" name="genre">
                        <label for="">Level</label>
                        <select name="level" id="" class="form-control">
                            <option value="all">Semua</option>
                            <option value="premium">Premium</option>
                        </select>
                        <label for="">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->