<?php
include "koneksi.php";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $koneksi->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['username'] = $data['username'];
        $_SESSION['is_login'] = true;
        header("Location: dashboard.php");
    } else {
        $login_message = "Akun tidak ditemukan";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SoleStep - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h1 class="text-2xl font-bold text-white">Login - JawShoes</h1>
    </div>

    <div class="p-8">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Welcome to JawShoes</h2>
            <p class="text-gray-600">Sign in to access your account</p>
        </div>

        <?php if (!empty($login_message)) : ?>
            <div class="text-red-600 text-sm text-center mb-4">
                <?php echo $login_message; ?>
            </div>
        <?php endif; ?>

        <!-- ✅ Hanya 1 Form -->
        <form action="login.php" method="POST" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 mt-2">Username</label>
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

            <div class="space-y-4 mt-4">
                <button 
                    type="submit" 
                    name="login"
                    class="w-full flex justify-center py-3 px-4 rounded-md text-white bg-orange-600 hover:bg-orange-700 text-sm font-medium shadow-sm"
                > Login
                </button>
                </form>
                
                <button 
                    type="button" 
                    onclick="window.location.href='register.php'" 
                    class="w-full flex justify-center py-3 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50"
                >
                    Create new account
                </button>
            </div>
    </div>
</main>

</body>
</html>
