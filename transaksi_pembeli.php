<?php
include("koneksi.php");
$hari_ini = date("dmY");

$act=$_GET['act'];

if ($act=='input'){
echo	$id_transaksi = $_POST['ID_TRANSAKSI'];
echo	$kode_barang = $_POST['KODE_BARANG'];
echo	$jumlah = $_POST['TANGGAL_TRANSAKSI'];
echo	$pembeli = $_POST['NAMA_PEMBELI'];

	$sql = "INSERT INTO TRANSAKSI VALUES ('','$id_transaksi','$kode_barang', '$jumlah', '$pembeli', '$hari_ini')";
	$prepare = ociparse($koneksi, $sql);
    ociexecute($prepare);
    oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:laporan.php');
	}
	else {echo "gagal";} 

}

?>
