<!DOCTYPE html>
<?php
include 'koneksi.php';
include 'fungsi/fungsi_rupiah.php';
?>



<?php include'header.php' ?>

<body id="page-top">
  <div id="wrapper">
    <?php include'sidebar.php' ?>
	
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
		<?php include'topbar.php' ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
            </ol>
          </div>
		  <!-- Isi-->

          <!-- Row -->
          <div class="row">
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a class='btn btn-primary' href='add_barang.php' ><i class='fa fa-plus'></i> Tambah Data Barang</a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        
                        <th>no barang</th>
                        <th>nama barang</th>
                        <th>Harga</th>
                        <th>stok</th>
						<th>opsi</th>
											
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>no barang</th>
                        <th>nama barang</th>
                        <th>Harga</th>
                        <th>stok</th>
						<th>opsi</th>
                       
                      </tr>
                    </tfoot>
                    <tbody>
					<?php 
					
					$stid = oci_parse($koneksi, 'SELECT * from barang');

					oci_execute($stid);

					while (($d = oci_fetch_array ($stid, OCI_BOTH)) != false) {
						?>
                      <tr>
                        <td>
						 <?php echo $d['ID_BARANG']; ?>
						</td>
              <td>
						 <?php echo $d['NAMA_BARANG']; ?>
						</td>
						  
                        <td> 
						 <?php echo rupiah ($d['HARGA_BARANG']); ?>
                        
						</td>
                        <td> 
						 <?php echo $d['STOK_BARANG']; ?>
						</td>
           
                        <td class="td-actions">
						 <a class='btn btn-success' href="update_barang.php?id_barang=<?php echo $d["ID_BARANG"];?>" 
							><i class='fa fa-edit'></i></a>
							<a class='btn btn-danger' onclick="return confirm('Anda yakin ingin menghapus data tersebut?');" 
							href="aksi_barang.php?act=delete&id_barang=<?php echo $d["ID_BARANG"];?>" 
							><i class='fa fa-trash'></i></a>
						 
                         </td>	                       
                      </tr>                                         
                    </tbody>
					 <?php 
						}
					?>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

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