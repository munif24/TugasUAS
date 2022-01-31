<!DOCTYPE html>
<?php
include 'koneksi.php';
include'fungsi/fungsi_rupiah.php';
include'fungsi/fungsi_indotgl.php';

?>
<html>
<?php include'header.php' ?>
<head>
	<title>CETAK Data</title>
</head>
<body>
<h3><center>Laporan Penjualan barang</center></h3>
			 <br>
			  
			  <br><br>
          <!-- Row -->
          <div class="row">
		  
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" ">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
						<th>Tanggal Transaksi</th>
						<th>Nama Pembeli </th>
						<th>Alamat </th>
						<th>Nama Barang</th>
                        <th>Harga</th>
						<th>Berat (Kg)</th>
                        <th>Total</th>                        										
                      </tr>
                    </thead>
                    
                    <tbody>
					<?php 
					$no = 1;
					$total_semua = 0;
					$stid = oci_parse($koneksi, 'SELECT pembeli.*, barang.*, transaksi.* FROM transaksi 
transaksi INNER JOIN pembeli pembeli ON transaksi.id_transaksi = pembeli.id_pembeli 
INNER JOIN barang barang ON transaksi.id_transaksi = barang.id_barang ORDER BY transaksi.id_transaksi ASC');

					oci_execute($stid);

					while (($row = oci_fetch_array ($stid, OCI_BOTH)) != false) {
					$total = $row["harga_barang"] * $row["jumlah_beli"];
					$total_semua += $total;	
						
						?>
                      <tr>
                        <td>
						 <?php echo $no; ?>
						</td>
                          <td>
						 <?php echo $row["ID_TRANSAKSI"];?>
						</td>
						<td>
						 <?php echo $row["ID_PEMBELI"];?>
						</td>
						<td>
						 <?php echo $row["ALAMAT_PEMBELI"];?>
						</td>
						<td>
						 <?php echo $row["ID_BARANG"];?>
						</td>						
						  <td> 
						 <?php echo tgl_indo($row['TANGGAL_TRANSAKSI']); ?>
						</td>
						<td>
						 <?php echo $row["JUMLAH_BELI"];?>
						</td>
						<td>
						 <?php echo rupiah($total); ?>
						</td>
                                             
                      </tr>                                         
                    </tbody>
					 <?php
						$no++;
						}
						
					?>
                  </table>
                </div>
              </div>
            </div>
          </div>
 <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <!-- Popover basic -->
              <div class="card mb-4">
               
                <div class="card-body">
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Dismiss on next click -->
              <div class="card mb-4">
                
                <div class="card-body">
                 <center>Bekasi, <?php echo tgl_indo($hari_ini); ?></center>
							<b><center>Manager Perusahaan</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>munif s.pd</center></b>
                </div>
              </div>
            </div>
	
 
	<script>
		window.print();
	</script>
 
</body>
</html>