<?php
session_start(); // Memulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $domain = explode('@', $email)[1]; // Mengambil domain dari email
    
    // Memeriksa apakah password sesuai dengan domain email
    if ($password === $domain) {
        $_SESSION["loggedin"] = true; // Menandakan bahwa pengguna telah login
        $_SESSION["email"] = $email; // Menyimpan email ke session
        header("Location: hal2.php"); // Redirect ke halaman form
        exit();
    } else {
        $error = "Password Salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
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
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Masukkan Email" required>
            <input type="password" name="password" placeholder="Masukkan Password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
    </div>
</body>
</html>