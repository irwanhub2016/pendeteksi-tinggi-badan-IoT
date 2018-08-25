<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #474e5d;
    padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}

.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>

  <?php 
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
      echo "Login gagall username atau password belum terdaftar!";
    }else if($_GET['pesan'] == "logout"){
      echo "Anda telah berhasil logout";
    }else if($_GET['pesan'] == "belum_login"){
      echo "Sebelum masuk dashboard anda harus login";
    }
  }
  ?>

<h2 align="center">Daftar Sebagai Peserta</h2>

<p align="center"><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button></p>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/TugasAkhir/action_page.php" method="post" >
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="NIK"><b>NIK</b></label>
      <input type="text" placeholder="Enter NIK" name="NIK" required>

      <label for="nama"><b>Nama</b></label>
      <input type="text" placeholder="Enter Nama" name="nama" required>

      <label for="alamat"><b>Alamat</b></label>
      <input type="text" placeholder="Enter Alamat" name="alamat" required>

      <label for="agama"><b>Agama</b></label></br>
      <select name="agama">
        <option value="Islam">Islam</option>
        <option value="Protestan">Protestan</option>
        <option value="Katolik">Katolik</option>
        <option value="Konghucu">Konghucu</option>
        <option value="Hindu">Hindu</option>
        <option value="Budha">Budha</option>
      </select></br></br>

      <label for="status"><b>Status</b></label></br>
      <select name="status">
        <option value="Lajang">Lajang</option>
        <option value="Menikah">Menikah</option>
      </select></br></br> 

      <label for="Jenis Kelamin"><b>Jenis Kelamin</b></label></br>
      <select name="jenis_kelamin">
        <option value="laki-laki">laki-laki</option>
        <option value="perempuan">perempuan</option>
      </select></br></br>

      <label for="Golongan Darah"><b>Golongan Darah</b></label></br>
      <select name="golongan_darah">
        <option value="AB">AB</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="O">O</option>
      </select></br></br>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" name="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>

  <form class="modal-content" action="cek_login.php" method="post">
    <div class="container">
      <h1 align="center">Login Peserta</h1>
      <hr>

      <label for="NIK"><b>NIK</b></label>
      <input type="text" placeholder="Enter NIK" name="NIK" required>

      <label for="nama"><b>Nama</b></label>
      <input type="text" placeholder="Enter Nama" name="nama" required>

      <div class="clearfix">
        <button type="reset" class="cancelbtn">Reset</button>
        <button type="submit" name="submit" class="signupbtn">Login</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>