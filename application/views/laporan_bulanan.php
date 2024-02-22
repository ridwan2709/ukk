<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Penjualan</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminlte/plugins/sweetalert2/sweetalert2.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
  <?php $this->load->view('partials/head'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php $this->load->view('includes/nav'); ?>

  <?php $this->load->view('includes/aside'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Laporan Bulanan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <form action="<?= site_url('laporan_bulanan')?>" method="POST">
            <div class="row">
              <div class="col">
                <label for="">Dari</label>
                <input type="date" name="dari" class="form-control" placeholder="" value="<?= @$tanggal['dari'] ?>">
              </div>
              <div class="col">
                <label for="">Sampai</label>
                <input type="date" name="sampai" class="form-control" placeholder="" value="<?= @$tanggal['sampai'] ?>">
              </div>
              <div class="col">
                <button type="submit" class="btn btn-primary" style="margin-top: 30px">Kirim</button>
              </div>
            </div>
            </form>

              <table class="table w-100 table-bordered table-hover mt-5">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Produk</th> 
                  <th>Total Bayar</th> 
                  <th>Jumlah Uang</th> 
                  <th>Diskon</th> 
                  <th>Pelanggan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($data == 'Kosong') {
                  echo "Kosong";
                } else {
                  foreach ($data as $key => $value):
                    $qty = $value['qty'];
                    $id = $value['barcode'];
                  ?>
                    <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $value['tanggal'] ?></td>
                      <td>
                        <?php 
                        $produk = explode(',',$id);
                        foreach ($produk as $k => $row) {
                          $this->db->select('nama_produk');
			                    $this->db->where('id', $row);
                          echo $this->db->get('produk')->row()->nama_produk;
                          echo '<br>';
                        }
                        ?>
                      </td>
                      <td><?= $value['total_bayar'] ?></td>
                      <td><?= $value['jumlah_uang'] ?></td>
                      <td><?= $value['diskon'] ?></td>
                      <td><?= $value['pelanggan'] ?></td>
                    </tr>
                    <?php endforeach;
                }
                
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('partials/footer'); ?>
<script src="<?php echo base_url('assets/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/adminlte/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script>
  var readUrl = '<?php echo site_url('transaksi/read') ?>';
  var deleteUrl = '<?php echo site_url('transaksi/delete') ?>';
</script>
<script src="<?php echo base_url('assets/js/laporan_penjualan.min.js') ?>"></script>
</body>
</html>