<html>
    <head>
        <title>Data User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
        <?php
        $conn = mysqli_connect('localhost','root','','perpustakaan');
        ?>
    <body>
        <center>
            <h3>Masukan data Buku :</h3>
            <table>
                <form method="POST" action="tambah_buku.php">
                <tr>
                    <td>judul</td>
                    <td>:</td>
                    <td><input type="text" name="judul" class="form-control"></td>
                </tr>
                <tr>
                    <td>pengarang</td>
                    <td>:</td>
                    <td><input type="text" name="pengarang" class="form-control"></td>
                </tr>
                <tr>
                    <td>harga</td>
                    <td>:</td>
                    <td><input type="text" name="harga" class="form-control"></td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td>:</td>
                    <td><input type="text" name="isbn" class="form-control"></td>
                </tr>
                <tr>
                    <td>tahun_terbit</td>
                    <td>:</td>
                    <td><input type="text" name="tahun" class="form-control"></td>
                </tr>
            </table>
            <input type="submit" value="masukan" name="submit">
            </form>
            <?php 
				error_reporting(E_ALL &	 E_NOTICE);
				$judul = $_POST["judul"];
				$pengarang = $_POST["pengarang"];
				$harga = $_POST["harga"];
                $isbn = $_POST["isbn"];
                $tahun = $_POST["tahun"];
				$submit = $_POST["submit"];
				$input="INSERT INTO daftar_buku(judul, pengarang, harga, isbn, tahun_terbit) VALUES ('$judul', '$pengarang', '$harga', '$isbn', '$tahun')";
				if ($submit) {
					if ($judul=='') {
						echo "</br>kode buku tidak boleh kosong, harus diisi";
					}elseif ($pengarang=='') {
						echo "</br>Nama buku tidak boleh kosong, harus diisi";
					}elseif ($harga=='') {
						echo "</br> Kode jenis tidak boleh kosong, harus diisi";
					}elseif ($isbn=='') {
						echo "</br> Kode jenis tidak boleh kosong, harus diisi";
					}
                    else{
						mysqli_query($conn, $input);
						echo "</br>Data berhasil dimasukkan";
					}
				}	
			?>
			<hr>
			<h3>Data Buku</h3>
			<table border="1" width="50%" style="text-align: center" class="table">
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

            <a href="index.php" class="btn btn-primary">kembali</a>
        </center>
    </body>
</html>