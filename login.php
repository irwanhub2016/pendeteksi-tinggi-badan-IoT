<?php
session_start();
if (isset($_SESSION['NIK']) && $_SESSION['NIK'] != '')
{
    header('Location: daftar.html');
}
error_reporting(-1);
?>

<form method="post" action="/TugasAkhir/action_login.php">
    <label>Username:</label><br>
    <input type="text" name="NIK" placeholder="NIK" /><br><br>
    <label>Password:</label><br>
    <input type="text" name="nama" placeholder="nama" />  <br><br>
	<input type="submit" name="submit" value="Login" /> 
</form>