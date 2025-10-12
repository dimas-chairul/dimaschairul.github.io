<?php
// Inisialisasi variabel
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // **********************  1  **************************
    // Tangkap nilai nama dari form
    if (empty($_POST["nama"])) {
        $namaErr = "Nama wajib diisi";
    } else {
        $nama = htmlspecialchars($_POST["nama"]);
    }

    // **********************  2  **************************
    // Tangkap nilai email dari form
    if (empty($_POST["email"])) {
        $emailErr = "Email wajib diisi";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format email tidak valid";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    // **********************  3  **************************
    // Tangkap nilai NIM dari form
    if (empty($_POST["nim"])) {
        $nimErr = "NIM wajib diisi";
    } elseif (!preg_match("/^[0-9]{8,}$/", $_POST["nim"])) {
        $nimErr = "NIM harus berupa angka minimal 8 digit";
    } else {
        $nim = htmlspecialchars($_POST["nim"]);
    }

    // **********************  4  **************************
    // Tangkap nilai jurusan (dropdown)
    if (empty($_POST["jurusan"])) {
        $jurusanErr = "Jurusan wajib dipilih";
    } else {
        $jurusan = htmlspecialchars($_POST["jurusan"]);
    }

    // **********************  5  **************************
    // Tangkap nilai alasan (textarea)
    if (empty($_POST["alasan"])) {
        $alasanErr = "Alasan wajib diisi";
    } else {
        $alasan = htmlspecialchars($_POST["alasan"]);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <img src="EAD.png" alt="Logo EAD" class="logo">
  <h2>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h2>
  <form method="post" action="">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr; ?></span>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span>

    <label>NIM:</label>
    <input type="text" name="nim" value="<?php echo $nim; ?>">
    <span class="error"><?php echo $nimErr; ?></span>

    <label>Jurusan:</label>
    <select name="jurusan">
      <option value="">-- Pilih Jurusan --</option>
      <option value="Sistem Informasi" <?php if($jurusan=="Sistem Informasi") echo "selected"; ?>>Sistem Informasi</option>
      <option value="Informatika" <?php if($jurusan=="Informatika") echo "selected"; ?>>Informatika</option>
      <option value="Teknik Industri" <?php if($jurusan=="Teknik Industri") echo "selected"; ?>>Teknik Industri</option>
    </select>
    <span class="error"><?php echo $jurusanErr; ?></span>

    <label>Alasan Bergabung:</label>
    <textarea name="alasan"><?php echo $alasan; ?></textarea>
    <span class="error"><?php echo $alasanErr; ?></span>

    <button type="submit">Daftar</button>
  </form>

  <?php
  // **********************  6  **************************
  // Tampilkan hasil input dalam tabel + logo di atasnya jika semua valid
  if ($nama && $email && $nim && $jurusan && $alasan && !$namaErr && !$emailErr && !$nimErr && !$jurusanErr && !$alasanErr) {
      echo "<h3>Data Pendaftaran</h3>";
      echo '<img src="EAD.png" alt="Logo EAD" class="logo">';
      echo "<table border='1' cellpadding='8'>
              <tr><th>Nama</th><td>$nama</td></tr>
              <tr><th>Email</th><td>$email</td></tr>
              <tr><th>NIM</th><td>$nim</td></tr>
              <tr><th>Jurusan</th><td>$jurusan</td></tr>
              <tr><th>Alasan Bergabung</th><td>$alasan</td></tr>
            </table>";
  }
  ?>
</div>
</body>
</html>
