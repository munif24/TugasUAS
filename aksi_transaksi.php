<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$id_transaksi=$_GET['id_transaksi'];
	$sql="DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:transaksi.php');
}

elseif ($act=='input'){
    $id_transaksi = $_POST["id_transaksi"];
	$id_pembeli = $_POST["id_pembeli"];
	$id_barang = $_POST ["id_barang"];
 	$tanggal_transaksi = $_POST["tanggal_transaksi"];
	$jumlah_beli = $_POST["jumlah_beli"];

   $sql="insert into transaksi values ('$id_transaksi','$id_pembeli','$id_barang','$tanggal_transaksi','$jumlah_beli') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:transaksi.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
    $id_transaksi = $_POST["id_transaksi"];
	$id_pembeli = $_POST["id_pembeli"];
	$id_barang = $_POST ["id_barang"];
 	$tanggal_transaksi = $_POST["tanggal_transaksi"];
	$jumlah_beli = $_POST["jumlah_beli"];
	

	$sql = "UPDATE transaksi SET id_pembeli='$id_pembeli', id_barang='$id_barang', tanggal_transaksi='$tanggal_transaksi',jumlah_beli='$jumlah_beli' WHERE id_transaksi='$id_transaksi'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:transaksi.php');
	}
	else {echo "gagal";}
   



}
?>