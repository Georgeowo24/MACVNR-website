<?php include './Resources/Components/Admin_Session_Check.php'; ?>

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
    <link rel="stylesheet" href="./Resources/Styles/Header-Static.css?1.0">
    <link rel="stylesheet" href="./Resources/Styles/Dashboard.css?1.0">
    <link rel="stylesheet" href="./Resources/Styles/Footer.css?1.3">

    <!--//? Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--//* Header Script -->
    <script src="./Backend/Components/Header.js"></script>

    <!--//! Multilanguages ​​-->
    <script src="./Resources/Languages/Pages/Change_Language.js" type="module"></script>
</head>
<body id="Dashboard">
    <!--//! Header -->
    <?php include './Resources/Components/Header.php' ?>
    
    <main class="container">
        <h1 id="Welcome" data-admin-name = "<?php echo htmlspecialchars($_SESSION['admin_name']); ?>"></h1>
        <p class="Present-Dashboard"></p>
        
        <a href="./Events.php" class="button">
            <p id="Events"></p>
            <i class='bx bx-calendar-event'></i>
        </a>
        <a href="./Members.php" class="button">
            <p id="Members"></p>
            <i class='bx bx-group'></i>
        </a>
        <a href="./Governing_Board.php" class="button">
            <p id="GoverningBoard"></p>
            <i class='bx bx-buildings'></i>
        </a>
    </main>

    <!--//! Footer -->
    <?php include './Resources/Components/Footer.php';?>
</body>
</html>
