<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baca_sensor";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

   if(isset($_POST['submit'])) 
   {

 		$id_petugas = $_POST['id_petugas'];   		

 		if($id_petugas=='1234')
 		{	
	   		$NIK = $_POST['NIK']; 
	   		$nama = $_POST['nama'];
	   		$alamat = $_POST['alamat']; 
	   		$agama = $_POST['agama'];
	   		$status = $_POST['status']; 
	   		$jenis_kelamin = $_POST['jenis_kelamin'];
	   		$golongan_darah = $_POST['golongan_darah'];

			$data = mysqli_query($conn,"select * from peserta where NIK='$NIK'");
			 
			// menghitung jumlah data yang ditemukan
			$cek = mysqli_num_rows($data);


			if($cek > 0)
			{

				echo "NIK sudah ada ! ";
				echo "<a href = 'daftar.php'>Back </a>";
			}

			else
			{

			$sql = "INSERT INTO peserta (NIK, nama, alamat, agama, status, jenis_kelamin, tinggi_badan, golongan_darah) VALUES ('$NIK', '$nama', '$alamat', '$agama', '$status', '$jenis_kelamin','', '$golongan_darah')";

			if (mysqli_query($conn, $sql)) 
			{

			    echo "Data berhasil disimpan. Anda akan dialihkan ke halaman login dalam waktu 3 detik ...";
		   	 	header("refresh:3;http://localhost/TugasAkhir/daftar.php");
			} 
			
			else 
			{
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			    echo " Maaf pendaftaran gagal !";
		   	 	header("refresh:3;http://localhost/TugasAkhir/daftar.php");
			}
			}
		}

		else
		{
			echo "Maaf ID Petugas salah coba lagi !.";
		   	header("refresh:1.5;http://localhost/TugasAkhir/daftar.php");	
		}
   }

   else
   {
   		echo "Nothing";
   }

mysqli_close($conn);
?>