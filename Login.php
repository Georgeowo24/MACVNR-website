<?php
    // Start the session if it is not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Include the database connection file
    include './Backend/Database/DB_Connect.php';

    // Check if the request method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare a SQL statement to check if the admin exists with the given email
        $sql = "SELECT * FROM admin WHERE Email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if exactly one result is returned
        if ($result->num_rows === 1) {
            $admin = $result->fetch_assoc();
            
            // Verify the password
            if (password_verify($password, $admin['Password'])) {
                // Store admin information in the session
                $_SESSION['admin_name'] = $admin['First_Name'];
                $_SESSION['admin_email'] = $admin['Email'];
                
                // Redirect the admin to the dashboard
                header("Location: Admin_Dashboard.php");
                exit;
            } else {
                // Set error message for incorrect password
                $error = "Incorrect password.";
            }
        } else {
            // Set error message for non-existent admin
            $error = "Administrator not found.";
        }
        $stmt->close();
    }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Developed by Jorge Torres Romero">
    <title>MACVNR</title>

    <!--//* Tab icon -->
    <link rel="icon" href="./Resources/Img/Icon-MACVNR-White.ico">
    
    <!--//* CSS Files -->
    <link rel="stylesheet" href="./Resources/Styles/Header-Static.css?1.2">
    <link rel="stylesheet" href="./Resources/Styles/Login.css?1.4">
    <link rel="stylesheet" href="./Resources/Styles/Footer.css?1.5">

    <!--//? Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--//* Header Script -->
    <script src="./Backend/Components/Header.js"></script>

    <!--//! Multilanguages ​​-->
    <script src="./Resources/Languages/Pages/Change_Language.js" type="module"></script>
</head>
<body id="Login">
    <<!--//! Header -->
    <?php include './Resources/Components/Header.php' ?>
    
    <div class="container">
        <main class="wrapper">
            <h1 id="Title"></h1>
            <?php
                if (isset($error)) {
                    // Display the error message
                    echo "<p class='error-message'>$error</p>";
                }
            ?>
            <form action="" method="POST">
                <div class="input-box">
                    <label id="Email" class="Label"></label>
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <label id="Password" class="Label"></label>
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </main>
    </div>

    <!--//! Footer -->
    <?php include './Resources/Components/Footer.php';?>
</body>
</html>
