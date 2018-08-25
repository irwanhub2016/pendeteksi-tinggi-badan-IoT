<?php 
   session_start();
?>

<?php
//Creates new record as per request
    //Connect to database

$session_NIK = $_SESSION['NIK'];

if(!empty($session_NIK))
{
    
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

        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
   }

    else
    {
            $scan =  "select nilai from sensor order BY no DESC LIMIT 1";
            $sql_scan = $conn->query($scan);

            while ($hasil = mysqli_fetch_array ($sql_scan)) 
            {
                $nilai_sensor = $hasil['nilai'];
            }

        echo "Update nilai sensor terbaru : ".$nilai_sensor;
    }


    $conn->close();

}

else
{
    echo "Kosong";
}


?>