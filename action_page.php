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

		    echo "Data berhasil disimpan. ";
		    echo "<a href = 'daftar.php'>Back </a>";

		} 
		
		else 
		{
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		    echo "<a href = 'daftar.php'>Back </a>";
		}
		}

   }
   else
   {
   		echo "Nothing";
   }

mysqli_close($conn);
?>