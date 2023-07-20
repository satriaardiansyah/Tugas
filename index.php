<html>
    <head>
        <title>Data User</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
	<?php
session_start();

// Fungsi untuk memeriksa apakah user telah login
function isLoggedIn() {
    return isset($_SESSION['username']);
}

$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');

// Logout user jika parameter logout ada di URL
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
}

// Jika user telah login, tampilkan link untuk menambahkan data
if (isLoggedIn()) {
    echo '<a href="tambah_buku.php" class="btn btn-primary">Tambah Data Buku</a> | <a href="?logout" class="btn btn-danger">Logout</a>';
}
?>
        <?php
        $conn = mysqli_connect('localhost','root','','perpustakaan');
        ?>
		<center>
		<a href="login.php" class="btn btn-primary">Login!!!</a>
		</center>
			<hr>
			<h3>Data Buku</h3>
			<table border="1" width="50%" style="text-align: center" class="table table-striped">
			<tr>
				<td width="20%"><b>Judul</b></td>
				<td width="30%"><b>Pengarang</b></td>
				<td width="10%"><b>Harga</b></td>
				<td width="10%"><b>ISBN</b></td>
                <td width="10%"><b>Tahun terbit</b></td>
			</tr>

			<?php 
				$cari = "SELECT * FROM daftar_buku";
				$hasil_cari = mysqli_query($conn, $cari);
				while ($data = mysqli_fetch_row($hasil_cari)) {
					echo "
					<tr>
						<td width='20%'>$data[0]</td>
						<td width='30%'>$data[1]</td>
						<td width='10%'>$data[2]</td>
                        <td width='10%'>$data[3]</td>
                        <td width='10%'>$data[4]</td>
					</tr>";
				}
			?>
			</table>
        </center>
    </body>
</html>