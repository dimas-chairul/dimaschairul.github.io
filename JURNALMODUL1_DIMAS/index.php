<?php
// **********************  1  **************************
// Inisialisasi variabel
$nama = $email = $nomorhp = $film = $jumlah = "";

$namaErr = $emailErr = $nomorhpErr = $filmErr = $jumlahErr = "";

// **********************  2  **************************
// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // **********************  3  **************************
    // Ambil nilai Nama dari form
    // silakan taruh kode kalian di bawah
    //buatkan validasi yang sesuai
    $nama = trim($_POST["nama"]);
    if (empty($nama)) 
    { 
      $namaErr = "Nama wajib diisi"; 
    }


    // **********************  4  **************************
    // Ambil nilai Email dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $email = trim($_POST["email"]);
    if (empty($email)) {
      $emailErr = "Email wajib diisi";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Format email tidak valid";
    }

    // **********************  5  **************************
    // Ambil nilai Nomor HP dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $nomorhp = trim($_POST["nomorhp"]);
    if (empty($nomorhp)) {
      $nomorhpErr = "Nomor telepon wajib diisi";
    }
    elseif (!ctype_digit($nomorhp)) {
      $nomorhpErr = "Nomor telepon hanya boleh angka";
    }

    // **********************  6  **************************
    // Ambil nilai Film (dropdown)
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $film = $_POST["film"] ?? "";
    if (empty($film)) {
      $filmErr = "Pilih film";
    }


    // **********************  7  **************************
    // Ambil nilai Jumlah Tiket dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $jumlah = trim($_POST["jumlah"]);
    if (empty($jumlah)) { 
      $jumlahErr = "Jumlah tiket wajib diisi";
    }
    elseif (!ctype_digit($jumlah)) {
      $jumlahErr = "Jumla tiket hanya boleh angka";
    }



}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pemesanan Tiket Bioskop</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <!-- **********************  8  **************************
       Tambahkan nilai atribut di dalam src dengan nama file gambar logo bioskop
  -->
  <img src="EAD.png" alt="Logo Bioskop EAD" class="logo">

  <h2>Form Pemesanan Tiket Bioskop</h2>
  <form method="post" action="">
    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nomor HP:</label>
    <input type="text" name="nomorhp" value="<?php echo $nomorhp; ?>">
    <span class="error"><?php echo $nomorhpErr ? "* $nomorhpErr" : ""; ?></span>

    <label>Pilih Film:</label>
    <select name="film">
      <option value="">-- Pilih Film --</option>
      <option value="Interstellar">Interstellar</option>
      <option value="Inception">Inception</option>
      <option value="Oppenheimer">Oppenheimer</option>
      <option value="Avengers: Endgame">Avengers: Endgame</option>
    </select>
    <span class="error"><?php echo $filmErr; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Jumlah Tiket:</label>
    <input type="text" name="jumlah" value="<?php echo $jumlah; ?>">
    <span class="error"><?php echo $jumlahErr ? "* $jumlahErr" : ""; ?></span>

    <button type="submit">Pesan Tiket</button>
  </form>
  
  <!-- **********************  9  ************************** -->
  <!-- Tampilkan hasil input dalam tabel jika semua valid -->
  <!-- silakan taruh kode kalian di bawah -->
  <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$emailErr && !$nomorhpErr && !$filmErr && !$jumlahErr) { ?>
    <div class="container">
      <h3>Data Pemesanan:</h3>
      <div class ="table-container">
        <table>
          <thead>
            <tr>
              <th width="20%">Nama</th>
              <th width="10%">Email</th>
              <th width="15%">Nomor Telepon</th>
              <th width="15%">Jenis Film</th>
              <th width="10%">Jumlah Tiket</th> 
            </tr>
          </thead>
        <tbody>
    <tr>
      <td><?php echo $nama; ?></td>
      <td><?php echo $email; ?></td>
      <td><?php echo $nomorhp; ?></td>
      <td><?php echo $film; ?></td>
      <td><?php echo $jumlah; ?></td>
    </tr>
  </tbody>
  </table>
  </div>
  </div>
    <?php
  }
  
  ?>
</div>
</body>
</html>
