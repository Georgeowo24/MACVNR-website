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
    <link rel="stylesheet" href="./Resources/Styles/Header-Static.css">
    <link rel="stylesheet" href="./Resources/Styles/Governing_Board.css?1.7">
    <link rel="stylesheet" href="./Resources/Styles/Footer.css?1.2">

    <!--//? Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--//* Header Script -->
    <script src="./Backend/Components/Header.js"></script>

    <!--//! Multilanguages ​​-->
    <script src="./Resources/Languages/Pages/Change_Language.js" type="module"></script>
</head>
<body id="Management_Board">
    <!--//! Header -->
    <?php include './Resources/Components/Header.php' ?>

    <main>
        <h2 id="Title"></h2>
        <p id="Txt"></p>

        <?php if (isset($_SESSION['admin_email'])): ?>
            <!-- Display the "Add Members" button if the admin is logged in -->
            <a href="./Backend/Actions/Governing_Board/Create_Governing_Board.php" class="btn-full">
                <p id="BtnAddMembers"></p>
            </a>
        <?php endif; ?>

        <section class="container">
            <?php
                include './Backend/Database/DB_Connect.php';

                // Get the language from the URL (default is English)
                $lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

                // Query to select all records from the governing_board table
                $sql = "SELECT * FROM governing_board";
                $result = $conn->query($sql);

                // Check if there are results and process each row
                if ($result -> num_rows > 0){
                    while ($row = $result -> fetch_assoc()){
                        // Create an array with the member's data
                        $GoverningBoard = array(
                            "ID" => $row['ID'],
                            "Image" => $row['Image'],
                            "First_Name" => $row['First_Name'],
                            "Last_Name" => $row['Last_Name'],
                            "Middle_Name" => $row['Middle_Name'],
                            "Position_Es" => $row['Position_Es'],
                            "Position_En" => $row['Position_En'],
                            "Institution" => $row['Institution'],
                        );
                        
                        // Determine the position based on the selected language
                        $Position = $lang === 'en' ? $GoverningBoard['Position_En'] : $GoverningBoard['Position_Es'];?>
                        
                        <!-- HTML structure to display a member -->
                        <article class="card">
                            <img src="<?php echo $GoverningBoard['Image']; ?>">
                            <div class="card-content">
                                <div class="card-info">
                                    <h2><?php echo $GoverningBoard['First_Name'] . " " . $GoverningBoard['Last_Name'] . " " . $GoverningBoard['Middle_Name']; ?></h2>
                                    <h3><?php echo $Position; ?></h3>
                                    <p><?php echo $GoverningBoard['Institution']; ?></p>
                                </div>
                            </div>
                            <?php if (isset($_SESSION['admin_email'])): ?>
                                <!-- If the admin is logged in, show edit and delete buttons -->
                                <div class="card-buttons">
                                    <a href="./Backend/Actions/Governing_Board/Update_Governing_Board.php?id=<?php echo $GoverningBoard['ID']?>" class="btn-edit">
                                        <i class='bx bx-edit-alt'></i>
                                    </a>
                                    <form action="./Backend/Actions/Governing_Board/Delete_Governing_Board.php" method="post" style="display:inline;" onsubmit="confirmDelete(event)">
                                        <input type="hidden" name="id" value="<?php echo $GoverningBoard['ID'] ?>">
                                        <button type="submit" class="btn-delete">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </article>
                        <?php }
                    }
                else {
                    // Display a message if no members are found
                    echo "No members found.";
                }
                // Close the database connection
                $conn -> close();
            ?>
        </section>
    </main>

    <!--//! Footer -->
    <?php include './Resources/Components/Footer.php';?>

    <!--//* Script to confirm deletion -->
    <script>
        function confirmDelete(event) {
            if (!confirm('¿Estás seguro de que deseas eliminar este miembro?')) {
                event.preventDefault();
            }
        }
    </script>
</body>
</html>