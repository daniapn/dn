<?php
session_start(); 

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: hal1_tugas4.php"); 
    exit();
}

$email = $_SESSION["email"]; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menyimpan data diri ke dalam sesi
    $_SESSION["nama"] = $_POST["nama"];
    $_SESSION["tempat_lahir"] = $_POST["tempat_lahir"];
    $_SESSION["tanggal_lahir"] = $_POST["tanggal_lahir"];
    $_SESSION["sd"] = $_POST["sd"];
    $_SESSION["smp"] = $_POST["smp"];
    $_SESSION["sma"] = $_POST["sma"];
    $_SESSION["data_tersimpan"] = true; 
    header("Location: hal3_tugas4.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Data Diri</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: block;
            text-align: center;
        }
        button {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: #081f4d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 10px auto;
        }
        button:hover {
            background-color: #061737;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Isi Data Diri</h2>
        <form action="" method="post">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
            <input type="text" name="tanggal_lahir" placeholder="Tanggal Lahir (DD/MM/YYYY)" required>
            <input type="text" name="sd" placeholder="Pendidikan SD" required>
            <input type="text" name="smp" placeholder="Pendidikan SMP" required>
            <input type="text" name="sma" placeholder="Pendidikan SMA" required>
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>