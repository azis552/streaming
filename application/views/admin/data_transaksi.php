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
    <?php }?>
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
<?php }?>
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
<?php }?>
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
<?php }?>
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
                    <h4>Data Transaksi</h4>
                    <a type="button" class="btn btn-info" href="<?=base_url('admin/tambah_transaksi')?>">
                        Tambah Transaksi
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-light">
                        <thead>
                            <th>NO</th>
                            <th>User</th>
                            <th>Paket</th>
                            <th>Status Bayar</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php $x = 1;
foreach ($transaksi as $t):
?>
                            <tr>
                                <td><?=$x?></td>
                                <td><?=$t->username?></td>
                                <td><?=$t->harga . "|" . $t->level . "|" . $t->keterangan?></td>
                                <td><?=$t->status_bayar?></td>
                                <td><?=$t->tanggal_bayar?></td>
                                <td>
                                <button class="btn btn-success" id="pay-bayar"
												data-id = "<?=$t->id_user?>"
												data-nama = "<?=$t->username?>"
												data-kelas = "<?=$t->level?>"
												data-keterangan = "<?=$t->keterangan?>"
												data-nominal = "<?=$t->harga?>"
												>Bayar</button>

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
<script type="text/javascript">

  $('#pay-bayar').click(function (event) {
	event.preventDefault();
	$(this).attr("disabled", "disabled");
	var nisn = $(this).data('id');
	var nama = $(this).data('nama');
	var kelas = $(this).data('kelas');
	var keterangan = $(this).data('keterangan');
	var nominal = $(this).data('nominal');

  $.ajax({
	type :"POST",
	data :{
		nisn :nisn,
		nama :nama,
		kelas:kelas,
		keterangan:keterangan,
		nominal:nominal
	},
	url: '<?=base_url()?>snap/token',
	cache: false,

	success: function(data) {
	  //location = data;

	  console.log('token = '+data);

	  var resultType = document.getElementById('result-type');
	  var resultData = document.getElementById('result-data');

	  function changeResult(type,data){
		$("#result-type").val(type);
		$("#result-data").val(JSON.stringify(data));
		//resultType.innerHTML = type;
		//resultData.innerHTML = JSON.stringify(data);
	  }

	  snap.pay(data, {

		onSuccess: function(result){
		  changeResult('success', result);
		  console.log(result.status_message);
		  console.log(result);
          $.ajax({
                    type: "POST",
                    data :{
                            nisn :nisn,
                        },
                    url: '<?=base_url()?>admin/update_bayar', // Replace with your outer AJAX endpoint
                    success: function (response) {
                        console.error("Outer AJAX Coba:", response);
                    },
                    error: function (error) {
                        console.error("Outer AJAX Error:", error);
                    }
                });
		},
		onPending: function(result){
		  changeResult('pending', result);
		  console.log(result.status_message);
		},
		onError: function(result){
		  changeResult('error', result);
		  console.log(result.status_message);
		}
	  });
	}
  });
});

</script>

