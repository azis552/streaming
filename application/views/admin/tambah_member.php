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
                    <h4>Tambah Member</h4>
                    <a type="button" class="btn btn-warning" href="<?=base_url('admin/data_harga')?>">
                        Kembali
                    </a>
                </div>
                <form action="<?=base_url() ?>admin/simpan_member"  method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <label for="">Level Member</label>
                    <select name="level" id="" class="form-control">
                            <option value="Bronze">Bronze</option>
                            <option value="Iron">Iron</option>
                            <option value="Silver">Silver</option>
                            <option value="Gold">Gold</option>
                            <option value="Platinum">Platinum</option>
                        </select>
                        <label for="">Masa Member</label>
                        <select name="keterangan" id="" class="form-control">
                            <option value="1 Minggu">1 Minggu</option>
                            <option value="1 Bulan">1 Bulan</option>
                            <option value="3 Bulan">3 Bulan</option>
                            <option value="6 Bulan">6 Bulan</option>
                            <option value="1 Tahun">1 Tahun</option>
                        </select>
                        <label for="">Harga</label>
                        <select name="harga" id="" class="form-control" >
                        <option value="10000">10,000</option>
                        <option value="25000">25,000</option>
                        <option value="50000">50,000</option>
                        <option value="75000">75,000</option>
                        <option value="100000">100,000</option>
                        <option value="150000">150,000</option>
                        <option value="200000">200,000</option>
                        <option value="250000">250,000</option>
                        <option value="300000">300,000</option>
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