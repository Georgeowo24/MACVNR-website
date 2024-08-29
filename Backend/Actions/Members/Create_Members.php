<?php
    include '../../Components/Admin_Session_Check.php';
    include '../../Database/DB_Connect.php';

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $middle_name = $_POST['middle_name'];
        $institution = $_POST['institution'];

        // Prepare the SQL statement for inserting a new member into the database
        $sql = "INSERT INTO members (First_Name, Last_Name, Middle_Name, Institution) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $first_name, $last_name, $middle_name, $institution);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('New member added successfully'); window.location.href='../../../Members.php';</script>";
        } else {
            echo "<script>alert('Error adding the member'); window.location.href='../../../Members.php';</script>";
        }
        $stmt->close();
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Developed by Jorge Torres Romero">
    <title>MACVNR</title>

    <!--//* Tab icon -->
    <link rel="icon" href="../../../Resources/Img/Icon-MACVNR-White.ico">

    <!--//* CSS -->
    <link rel="stylesheet" href="../../../Resources/Styles/Header-Static.css">
    <link rel="stylesheet" href="../../../Resources/Styles/Update_Members.css?1.3">
    <link rel="stylesheet" href="../../../Resources/Styles/Footer.css?1.3">

    <!--//? Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!--//* Header Script -->
    <script src="../../Components/Header.js"></script>

    <!--//! Multilanguages ​​-->
    <script src="../../Languages/Pages/Change_Language.js" type="module"></script>
</head>
<body id="CreateMembers">
    <!--//! Header -->
    <?php include '../../Components/Header.php'; ?>
    
    <div class="container">
        <h1 id="Title"></h1>
        
        <main class="table">
            <form action="./Create_Members.php" method="POST">
                <div class="form-group">
                    <label for="first_name" id="LbFirstName"></label>
                    <input type="text" id="first_name" name="first_name" required><br>
                </div>

                <div class="form-group">
                    <label for="last_name" id="LbLastName"></label>
                    <input type="text" id="last_name" name="last_name" required><br>
                </div>
                
                <div class="form-group">
                    <label for="middle_name" id="LbMiddleName"></label>
                    <input type="text" id="middle_name" name="middle_name"><br>
                </div>

                <div class="form-group">
                    <label for="institution" id="LbInstitution"></label>
                    <input type="text" id="institution" name="institution"><br>
                </div>

                <input type="submit" value="" id="Button">
            </form>
        </main>
    </div>

    <!--//! Footer -->
    <?php include '../../../Resources/Components/Footer.php';?>
</body>
</html>