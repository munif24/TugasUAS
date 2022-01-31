<!DOCTYPE html>


<?php include'header.php' ?>

<body id="page-top">
  <div id="wrapper">
    <?php include'sidebar.php' ?>
	
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
		<?php include'topbar.php' ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-left justify-content-between mb-6">
            <h1 class="h3 mb-4 text-gray-800">Tambah Data Transaksi</h1>
			
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Data Transaksi</li>
            </ol>		
          </div>
		  
		  <!-- Isi-->
		  <div class="row">
            <div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Data Transaksi</h6>
                </div>
                <div class="card-body">
                  <form method='post' action='aksi_transaksi.php?act=input'>
                    <div class="form-group">
                      <label for="id_transaksi">Pilih ID Transaksi</label>
                      <select name='id_transaksi' class='form-control'>
					  <?php
						include 'koneksi.php';
						$stid = oci_parse($koneksi, 'SELECT * from pembeli');
						oci_execute($stid);
						while (($d = oci_fetch_array ($stid, OCI_BOTH)) != false) {
						$id_transaksi = $d["ID_TRANSAKSI"];
						$pembeli = $d["ID_PEMBELI"];
						echo "<option value='$id_transaksi'>$pembeli</option>";
						}
						?>
						</select>
                      
                    </div>
                    <div class="form-group">
                      <label for="id_barang">Pilih Jenis barang</label>
                      <select name='id_barang' class='form-control'>
					  <?php												
						$stid = oci_parse($koneksi, 'SELECT * from barang');
						oci_execute($stid);
						while (($d = oci_fetch_array ($stid, OCI_BOTH)) != false) {
						$id_transaksi = $d["ID_TRANSAKSI"];
						$barang = $d["ID_BARANG"];
						echo "<option value='$id_transaksi'>$barang</option>";
						}
						?>
						</select>
					  
                    </div>
					<div class="form-group">
                      <label for="tanggal_transaksi"> tanggal Beli </label>
                      <input type="text" class="form-control" name="tanggal_transaksi" placeholder="tanggal">
					  
                    </div>
                    <div class="form-group">
                      <label for="jumlah_beli"> jumlah pembeli </label>
                      <input type="text" class="form-control" name="jumlah_beli" placeholder="jumlah pembeli">
					  
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
			  </div>
			  </div>

          

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
    
    </div>
  </div>

  

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script> 
<!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>  
</body>

</html>