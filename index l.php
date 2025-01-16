<?php
// Include the database connection file
include('database1.php');

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];  // Get plain password
    
    // Hash password for security after confirmation
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO login (user_name, password)
            VALUES ('$user_name', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Login successful!";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection after all operations are finished
$conn->close();

// Redirect to the login page
    header("Location: index b.php");
    exit();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
    <style>
        /* Style the success and error messages */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            font-size: 18px;
            z-index: 1000;
        }

        .popup-error {
            background-color: #dc3545;
        }

        .popup-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #ffffff;
            color: #333;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <!-- Form that sends POST request to the same page -->
            <form action="" method="POST">
                <h1>LOGIN</h1>
                <input type="text" name="user_name" placeholder="User Name" required>
                <input type="password" name="password" placeholder="Password" required>
                <a href="#">Forget Your Password?</a>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details to use all of site features</p>
                </div>
            </div>
        </div>
    </div>

    <?php if ($success_message): ?>
        <div id="popup-success" class="popup"><?php echo $success_message; ?>
            <button class="popup-button" onclick="closePopup('popup-success')">Close</button>
        </div>
    <?php endif; ?>

    <?php if ($error_message): ?>
        <div id="popup-error" class="popup popup-error"><?php echo $error_message; ?>
            <button class="popup-button" onclick="closePopup('popup-error')">Close</button>
        </div>
    <?php endif; ?>

    <script>
        // Show popup based on the PHP message
        window.onload = function() {
            <?php if ($success_message): ?>
                document.getElementById('popup-success').style.display = 'block';
            <?php endif; ?>

            <?php if ($error_message): ?>
                document.getElementById('popup-error').style.display = 'block';
            <?php endif; ?>
        };

        // Close the popup
        function closePopup(id) {
            document.getElementById(id).style.display = 'none';
        }
    </script>
</body>
</html>
