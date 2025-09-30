<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Biodata Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3e5d8;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #5d4037;
            margin-bottom: 10px;
            text-align: center;
        }
        form, .output {
            background: #fff;
            padding: 15px;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 6px;
            max-width: 500px;
        }
        label {
            display: inline-block;
            width: 130px;
            font-weight: bold;
        }
        input[type="text"], select, textarea {
            width: 250px;
            padding: 5px;
            margin-bottom: 8px;
        }
        input[type="radio"], input[type="checkbox"] {
            margin-left: 5px;
        }
        button {
            background: #795548;
            color: #fff;
            border: none;
            padding: 6px 12px;
            margin-top: 8px;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background: #5d4037;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #999;
            padding: 6px;
            text-align: left;
        }
        th {
            background: #795548;
            color: #fff;
            width: 150px;
        }
    </style>
</head>
<body>

<h2>Form Biodata Mahasiswa</h2>
<form method="POST" action="">
    <p><label>Nama Lengkap</label>
    <input type="text" name="nama" required></p>

    <p><label>NIM</label>
    <input type="text" name="nim" required></p>

    <p><label>Program Studi</label>
        <select name="prodi" required>
            <option value="Informatika">Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknik Elektro">Teknik Elektro</option>
        </select>
    </p>

    <p><label>Jenis Kelamin</label>
        <input type="radio" name="gender" value="Laki-laki" required> Laki-laki
        <input type="radio" name="gender" value="Perempuan"> Perempuan
    </p>

    <p><label>Hobi</label>
        <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
        <input type="checkbox" name="hobi[]" value="Musik"> Musik
        <input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga
    </p>
    
    <p><label>Alamat</label><textarea name="alamat" rows="3"></textarea></p>
    <button type="submit" name="submit_biodata">Kirim Data</button>
</form>

<?php
if (isset($_POST['submit_biodata'])) {
    $nama   = htmlspecialchars($_POST['nama']);
    $nim    = htmlspecialchars($_POST['nim']);
    $prodi  = htmlspecialchars($_POST['prodi']);
    $gender = htmlspecialchars($_POST['gender']);
    $hobi   = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : "-";
    $alamat = htmlspecialchars($_POST['alamat']);

    echo "<div class='output'>";
    echo "<h3>Data Mahasiswa</h3>";
    echo "<table>
            <tr><th>Nama</th><td>$nama</td></tr>
            <tr><th>NIM</th><td>$nim</td></tr>
            <tr><th>Program Studi</th><td>$prodi</td></tr>
            <tr><th>Jenis Kelamin</th><td>$gender</td></tr>
            <tr><th>Hobi</th><td>$hobi</td></tr>
            <tr><th>Alamat</th><td>$alamat</td></tr>
          </table>";
    echo "</div>";
}
?>

<h2>Form Pencarian</h2>
<form method="GET" action="">
    <p><label>Kata Kunci</label><input type="text" name="q" required></p>
    <button type="submit">Cari</button>
</form>

<?php
if (isset($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
    echo "<div class='output'>";
    echo "<p>Anda mencari data dengan kata kunci: <b style='color:#5d4037;'>$q</b></p>";
    echo "</div>";
}
?>

</body>
</html>