<?php
session_start(); // Memulai sesi

// Memeriksa apakah pengguna telah login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: hal1.php"); // Redirect ke halaman login jika belum login
    exit();
}

// Memeriksa apakah data diri telah disimpan
if (!isset($_SESSION["data_tersimpan"])) {
    header("Location: hal2.php"); // Redirect ke halaman form jika belum menyimpan data
    exit();
}

$email = $_SESSION["email"]; // Mengambil email dari sesi
session_destroy(); // Menghapus semua data sesi
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
 
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f4f4;
            color: black;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #f4f4f4;
            color: black;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            font-size: 16px;
        }
        .nav {
            background-color: #081f4d;
            display: flex;
            justify-content: center;
            padding: 10px;
            border-radius: 25px;
            margin: 10px auto;
            max-width: 350px;
        }
        .nav span {
            color: white;
            margin: 0 15px;
            font-weight: bold;
        }
        .nama-container {
            background-color: #081f4d;
            text-align: center;
            padding: 20px;
        }
        .nama {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        .container {
            max-width: 800px;
            background: white;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .section-title {
            background: #081f4d;
            color: white;
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .education {
            border: 1px solid #081f4d;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }
        .footer {
            background-color: #081f4d;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            border-radius: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Curriculum Vitae</h1>
        <div class="nav">
            <span>Biografi</span>
            <span>Pendidikan</span>
        </div>
    </div>
    
    <div class="nama-container">
        <p class="nama"><?php echo $_SESSION['nama']; ?></p>
    </div>
    <div class="container">
        <h3 class="section-title">Biografi</h3>
        <p><strong>Nama Lengkap:</strong> <?php echo $_SESSION['nama']; ?></p>
        <p><strong>Tempat Lahir:</strong> <?php echo $_SESSION['tempat_lahir']; ?></p>
        <p><strong>Tanggal Lahir:</strong> <?php echo $_SESSION['tanggal_lahir']; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>

        <h3 class="section-title">Pendidikan</h3>
        <div class="education">
            <h4><?php echo $_SESSION['sma']; ?></h4>
        </div>
        <div class="education">
            <h4><?php echo $_SESSION['smp']; ?></h4>
        </div>
        <div class="education">
            <h4><?php echo $_SESSION['sd']; ?></h4>
        </div>
    </div>

    <div class="footer">
        <?php echo $email; ?>
    </div>
</body>
</html>