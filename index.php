<?php

function hitung_umur($tanggal_lahir) {
    $tgl_lahir = new DateTime($tanggal_lahir);
    $hari_ini = new DateTime();
    $umur = $hari_ini->diff($tgl_lahir);
    return $umur->y;
}


function gaji_pekerjaan($pekerjaan) {
    $gaji = 0;
    switch ($pekerjaan) {
        case 'Dokter':
            $gaji = 10000000;
            break;
        case 'Programmer':
            $gaji = 50000000;
            break;
        case 'Guru':
            $gaji = 5000000;
            break;
        case 'Designer':
            $gaji = 6000000;
            break;
        default:
            $gaji = 0;
    }
    return $gaji;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pekerjaan = $_POST['pekerjaan'];

    $umur = hitung_umur($tanggal_lahir);
    $gaji = gaji_pekerjaan($pekerjaan);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: azure;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button  {
            background-color: teal;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .haha {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .haha h3 {
            color: #333;
        }
        .haha p {
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Input Data Tugas PHP</h2>
        <form action="" method="POST">
            <label for="nama">Nama: </label>
            <input type="text" id="nama" name="nama" required><br>

            <label for="tanggal_lahir">Tanggal Lahir: </label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br>

            <label for="pekerjaan">Pekerjaan: </label>
            <select id="pekerjaan" name="pekerjaan" required>
                <option value="Programmer">Programmer</option>
                <option value="Dokter">Dokter</option>
                <option value="Guru">Guru</option>
                <option value="Designer">Designer</option>
            </select><br>

            <button type="submit" name="submiit">Submit</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<div class='haha'>";
            echo "<h3>Output Tugas PHP</h3>";
            echo "<p>Nama: $nama</p>";
            echo "<p>Umur: $umur tahun</p>";
            echo "<p>Pekerjaan: $pekerjaan</p>";
            echo "<p>Gaji: Rp " . number_format($gaji, 0, ',', '.') . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>