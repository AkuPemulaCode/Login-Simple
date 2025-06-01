<?php
include "koneksi.php";
session_start();

$register_message = "";

if (isset($_SESSION["is_login"])) {
    header("Location: login.php");
   
}

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $register_message = "Username dan Password tidak boleh kosong";
    } else {

       

        try {
            $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
            if ($koneksi->query($sql)) {
                $register_message = "Daftar akun berhasil, silakan login.";
                header("Location: login.php");
            } else {
                $register_message = "Daftar akun gagal.";
            }
        } catch (mysqli_sql_exception $e) {
            $register_message = "Akun sudah terdaftar, ganti username lain.";
        }

        $koneksi->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SoleStep - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #6b7280;
        }
        .password-toggle:hover {
            color: #374151;
        }
        .shoe-gradient {
            background: linear-gradient(135deg, #f97316 0%, #f59e0b 100%);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

<main class="bg-white rounded-xl shadow-2xl w-full max-w-md border border-gray-200">
    <div class="shoe-gradient py-4 px-6">
        <h1 class="text-2xl font-bold text-white">Register - JawShoes</h1>
    </div>

    <div class="p-8">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Welcome to JawShoes</h2>
            <p class="text-gray-600">Sign up to create your account</p>
        </div>

        <?php if (!empty($register_message)) : ?>
            <div class="text-sm text-center text-red-600 mb-4"><?php echo $register_message; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input 
                    type="text" 
                    name="username" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-orange-500" 
                    placeholder="username"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg pr-12 focus:border-orange-500"
                        placeholder="Enter your password"
                    >
                </div>
            </div>

            <div>
                <button 
                    type="submit" 
                    name="register"
                    class="w-full flex justify-center py-3 px-4 rounded-md text-white bg-orange-600 hover:bg-orange-700 text-sm font-medium shadow-sm"
                >
                    <i class="fas fa-sign-in-alt mr-2"></i> Create Account
                </button>
            </div>
        </form>
    </div>
</main>

</body>
</html>
