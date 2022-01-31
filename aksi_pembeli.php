<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$id_pembeli=$_GET['id_pembeli'];
	$sql="DELETE FROM pembeli WHERE id_pembeli = '$id_pembeli'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:pembeli.php');
}

elseif ($act=='input'){
    $id_pembeli = $_POST["id_pembeli"];
	$nama_pembeli = $_POST["nama_pembeli"];

   $sql="insert into pembeli values ('$id_pembeli','$nama_pembeli') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:pembeli.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$id_pembeli = $_POST["id_pembeli"];
	$nama_pembeli = $_POST["nama_pembeli"];
	

	$sql = "UPDATE pembeli SET nama_pembeli='$nama_pembeli' WHERE id_pembeli='$id_pembeli'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:pembeli.php');
	}
	else {echo "gagal";}
   



}
?>