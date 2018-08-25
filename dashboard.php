<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama Peserta</title>
<style>
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 10px;
}
</style>

</head>
<body>
	<h2 align="center"><u>Halaman Peserta</u></h2>

	<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['status_account']!="login"){
		header("location:daftar.php?pesan=belum_login");
	}
	?>

	<?php

	include 'koneksi.php';

	$session_NIK = $_SESSION['NIK'];

	$query =  "select NIK,nama,agama,alamat,jenis_kelamin,status,golongan_darah,tinggi_badan from peserta where NIK='$session_NIK'";
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

	?>
 
	<h4>Selamat datang, <?php echo $nama; ?>! anda telah login.</h4>
 	<h3>Data Diri</h3>


	<table>
	  <tr>
	    <td><b>NIK</b></td>
	    <td><?php echo $NIK;?></td>
	  </tr>
	  <tr>
	    <td><b>Nama</b></td>
	    <td><?php echo $nama;?></td>
	  </tr>
	  <tr>
	    <td><b>Agama</b></td>
	    <td><?php echo $agama;?></td>
	  </tr>
	  <tr>
	    <td><b>Alamat</b></td>
	    <td><?php echo $alamat;?></td>
	  </tr>
	  <tr>
	    <td><b>Jenis Kelamin</b></td>
	    <td><?php echo $jenis_kelamin;?></td>
	  </tr>
	  <tr>
	    <td><b>Status</b></td>
	    <td><?php echo $status;?></td>
	  </tr>
	  <tr>
	    <td><b>Golongan Darah</b></td>
	    <td><?php echo $golongan_darah;?></td>
	  </tr>
	  <tr>
	    <td><b>Tinggi Badan</b></td>
	    <td>
			<?php 
			
		 	if (empty($tinggi_badan))
		 	{
		 		echo "Belum diketahui. ";

			    $servername = "localhost";
			    $username = "root";
			    $password = "";
			    $dbname = "baca_sensor";

			    // Create connection
			    $conn = new mysqli($servername, $username, $password, $dbname);
			    // Check connection
			    if ($conn->connect_error) {
			        die("Database Connection failed: " . $conn->connect_error);
			    }

			    //Get current date and time
			    //echo " Date:".$d."<BR>";

			    if(!empty($_GET['sensor']))
			    {
			        $sensor = $_GET['sensor'];

			        $delete =  "delete from sensor order BY no DESC LIMIT 1";
			        $sql_delete = $conn->query($delete);

			        $sql = "INSERT INTO sensor (nilai) VALUES ('".$sensor."')";

			        if ($conn->query($sql) === TRUE) {
			            echo "Nilai sensor: ".$sensor ;
			                    
			        } 

			        else 
			        {
			            echo "Error: " . $sql . "<br>" . $conn->error;
			        }
			    }

				    //$conn->close();

				else
				{
					$cek_data = mysqli_query($koneksi,"select nilai from sensor order BY no DESC LIMIT 1");
 
					$cek = mysqli_num_rows($cek_data);
					 
					if($cek > 0)
					{
				 			$query =  "select nilai from sensor order BY no DESC LIMIT 1";
							$sql = mysqli_query ($koneksi, $query);

							while ($hasil = mysqli_fetch_array ($sql)) 
							{
							$nilai_sensor = $hasil['nilai'];
							}

				 			$update_tinggi_badan =  "update peserta set tinggi_badan='$nilai_sensor' where NIK='$NIK'";
				 			$sql_tinggi_badan=mysqli_query($koneksi, $update_tinggi_badan);

				 			if($sql_tinggi_badan)
				 			{

				 				echo "Proses update tinggi badan";

				 				$delete_tinggi_badan =  "delete from sensor order BY no DESC LIMIT 1";
					 			$sql_delete_sensor=mysqli_query($koneksi, $delete_tinggi_badan);

				 			}

				 			else
				 			{
				 				echo "Gagal melakukan update tinggi badan";
				 			}

					}
	
					else
					{
							echo "Silahkan lakukan scanning sensor terlebih dahulu";
					}						


				}    

		 	}

		 	else
		 	{


			 	echo $tinggi_badan.' cm'; 		
		 	}
			?>
	    </td>
	  </tr>
	</table>
	<br/>
	<br/>
 
	<a href="logout.php">LOGOUT</a>
 
 
</body>
</html>