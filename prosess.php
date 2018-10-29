<?php
require_once("db.php")

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$tgl_lahir = $_POST['tgl_lahir'];

$sql = "insert into user (nama, nim, tgl_lahir)
        value ('$nama', '$nim', '$tgl_lahir')";

if (mysqli_query($conn, $sql)) {
  echo "new recored created successfully";
} else {
  echo "error".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);
?>
