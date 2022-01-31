<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$barang=$_GET['id_barang'];
	$sql="DELETE FROM barang WHERE id_barang = '$barang'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:barang.php');
}

elseif ($act=='input'){
    $barang = $_POST["id_barang"];
	$namabr = $_POST ["nama_barang"];
 	$hargabr = $_POST["harga_barang"];
    $stokbr = $_POST["stok_barang"];

   $sql="insert into barang values ('$barang','$namabr','$hargabr','$stokbr') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:barang.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$barang = $_POST["id_barang"];
	
	$namabr = $_POST ["nama_barang"];
 	$hargabr = $_POST["harga_barang"];
    $stokbr = $_POST["stok_barang"];
	

	$sql = "UPDATE barang SET nama_barang='$namabr', harga_barang='$hargabr', stok_barang'$stokbr' WHERE id_barang='$barang'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:barang.php');
	}
	else {echo "gagal";}
   



}
?>