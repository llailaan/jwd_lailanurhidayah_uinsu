<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 30%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 10%;
        }
        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php
        session_start();
        
        // Database connection
        try {
            $koneksi = new PDO("mysql:host=localhost;dbname=wisatadb", "root", "");
            $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<div class='error-message'>Connection failed: " . $e->getMessage() . "</div>";
            die();
        }
        
        // Hardcoded username and password
        $username = 'admin';
        $password = 'admin123';
        
        // Handle login
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input_username = $_POST['username'];
            $input_password = $_POST['password'];
            
            if ($input_username === $username && $input_password === $password) {
                $_SESSION['username'] = $username;
                echo "<script>alert('Login berhasil.');window.location.href='admin.php';</script>";
            } else {
                echo "<div class='error-message'>Username atau password salah.</div>";
            }
        }
        ?>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
