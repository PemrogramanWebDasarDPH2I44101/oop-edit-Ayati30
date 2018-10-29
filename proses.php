<?php
class data{
    private $conn;

    public function __construct(){
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $db         = "tugas";
        $this->conn = mysqli_connect($servername, $username, $password, $db);
    }
    //konstruktor
    public function tambah($nim, $nama){
        $sql    = "INSERT INTO user (nama, nim, alamat, tgl_lahir) VALUES ('$nama','$nim', $alamat, $tgl_lahir)";

        if(mysqli_query($this->conn, $sql)){
            ?>
            <script>
                alert("Data berhasil ditambah!");
                location = "tampil.php";
            </script>
            <?php
        }else{
            echo "Terjadi kesalahan : " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }
    public function hapus($nim){
        $sql    = "DELETE FROM mahasiswa WHERE nim = $nim";
        if (mysqli_query($this->conn, $sql)) {
            ?>
            <script>
                alert("Data berhasil dihapus!");
                location = "tampil.php";
            </script>
            <?php
        } else {
            echo "Terjadi kesalahan : " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }
    public function view(){
        $sql    = "SELECT * FROM mahasiswa";
        return mysqli_query($this->conn, $sql);
    }
    public function edit($nim, $nama){
		$sql = "UPDATE mahasiswa SET nama='$nama' WHERE nim='$nim'";
		if(mysqli_query($this->conn, $sql)){
            ?>
                <script>
                    alert("Data berhasil diubah!");
                    location="tampil.php";
                </script>
            <?php
        } else{
            echo "Terjadi kesalahan : " . $sql . "<br>" . mysqli_error($this->conn);
        }
	}
    public function data_terpilih($nim){
	    $edit   = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
	    return mysqli_query($this->conn,$edit);
    }
}
$data       = new data();
if(isset($_GET['tambah'])){
    $nama   = $_POST['nama'];
    $nim    = $_POST['nim'];
    $data -> tambah($nim, $nama);
}
if(isset($_GET['hapus'])){
    $nim = $_GET['hapus'];
    $data -> hapus($nim);
}
if (isset($_GET['edit'])) {
    $nim  = $_GET['edit'];
    $nama = $_POST['nama'];
    $data -> edit($nim, $nama);
}
?>
