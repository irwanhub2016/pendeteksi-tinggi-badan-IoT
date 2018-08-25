<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$NIK = $_POST['NIK'];
$nama = $_POST['nama'];
$id_petugas = $_POST['id_petugas']; 

if($id_petugas=='1234')
{
	// menyeleksi data admin dengan username dan password yang sesuai
	$data = mysqli_query($koneksi,"select * from peserta where NIK='$NIK' and nama='$nama'");
	 
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($data);
	 
	if($cek > 0){

		$query =  "select NIK,nama,agama,alamat,jenis_kelamin,status,golongan_darah,tinggi_badan from peserta where NIK='$NIK'";
		$sql = mysqli_query ($koneksi, $query);

		while ($hasil = mysqli_fetch_array ($sql)) 
		{

		$NIK = $hasil['NIK'];
		$nama = stripslashes ($hasil['nama']);
		$agama = stripslashes ($hasil['agama']);
		$alamat = stripslashes ($hasil['alamat']);
		$jenis_kelamin = stripslashes ($hasil['jenis_kelamin']);
		$status = stripslashes ($hasil['status']);
		$golongan_darah = stripslashes ($hasil['golongan_darah']);
		$tinggi_badan = stripslashes ($hasil['tinggi_badan']);
		}

		$_SESSION['NIK'] = $NIK;
		$_SESSION['nama'] = $nama;
		/*$_SESSION['agama'] = $agama;
		$_SESSION['alamat'] = $alamat;
		$_SESSION['jenis_kelamin'] = $jenis_kelamin;
		$_SESSION['status'] = $status;
		$_SESSION['golongan_darah'] = $golongan_darah;
		$_SESSION['tinggi_badan'] = $tinggi_badan;*/
		$_SESSION['status_account'] = "login";

		header("location:dashboard.php");
	}
	
	else
	{
		header("location:daftar.php?pesan=gagal");
	}
}

else
{
    echo "Gagal login. ID petugas untuk akses dashboard salah !";
	header("refresh:1.5;http://localhost/TugasAkhir/daftar.php");
}
?>