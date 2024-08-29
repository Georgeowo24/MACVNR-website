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
    <link rel="stylesheet" href="./Resources/Styles/Members.css?1.5">
    <link rel="stylesheet" href="./Resources/Styles/Footer.css?1.4">

    <!--//? Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!--//* Header Script -->
    <script src="./Backend/Components/Header.js"></script>

    <!--//! Multilanguages ​​-->
    <script src="./Resources/Languages/Pages/Change_Language.js" type="module"></script>
</head>
<body id="Members">
    <!--//! Header -->
    <?php include './Resources/Components/Header.php' ?>

    <div class="container">
        <main class="table">
            <section class="table_Header">
                <div class="header-content">
                    <h1 id="Title"></h1>

                    <?php if (isset($_SESSION['admin_email'])): ?>
                        <!-- Button to add new members, visible only to logged-in admins -->
                        <a href="./Backend/Actions/Members/Create_Members.php" class="button btn-add">
                            <p id="BtnAddMembers"></p>
                        </a>
                    <?php endif; ?>
                </div>
            </section>
            <section class="table_Body">
                <table>
                    <thead>
                        <tr>
                            <?php if (isset($_SESSION['admin_email'])): ?>
                                <!-- Column header for ID, visible only to logged-in admins -->
                                <th><i class='bx bx-purchase-tag-alt'></i></th>
                            <?php endif; ?>
                            
                            <!-- Column headers for member details -->
                            <th id="FullName"><i class='bx bx-group' ></i></th>
                            <th id="Institution"><i class='bx bxs-institution'></i></th>
                            

                            <?php if (isset($_SESSION['admin_email'])): ?>
                                <!-- Column header for action buttons, visible only to logged-in admins -->
                                <th id="Actions"><i class='bx bx-cog'></i></th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Placeholder row for styling -->
                        <tr></tr>

                        <?php
                            include './Backend/Database/DB_Connect.php';

                            // Query to select all members
                            $sql = "SELECT * FROM members";
                            $result = $conn->query($sql);

                            // Check if any members were found
                            if ($result->num_rows > 0) {
                                // Loop through each member and display their details
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                        // Display the ID column if the user is an admin
                                        if (isset($_SESSION['admin_email'])):
                                            echo "<td>" . $row['ID'] . "</td>";
                                        endif;

                                        // Display the full name and institution of the member
                                        echo "<td>" . $row['First_Name'] ." " . $row['Last_Name']. " " . $row['Middle_Name'] . "</td>";
                                        echo "<td>" . $row['Institution'] . "</td>";

                                        // Display action buttons if the user is an admin
                                        if (isset($_SESSION['admin_email'])):
                                            echo "<td>
                                                    <form action='./Backend/Actions/Members/Delete_Members.php' method='POST' style='display:inline;'>
                                                        <input type='hidden' name='id' value='" . $row['ID'] . "'>
                                                        <button type='submit' class='icon icon-delete' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este miembro?\")'>
                                                            <i class='bx bx-trash'></i>
                                                        </button>
                                                    </form>

                                                    <a href='./Backend/Actions/Members/Update_Members.php?id=" . $row['ID'] . "' class='icon icon-edit'>
                                                        <i class='bx bx-edit-alt'></i>
                                                    </a>
                                                </td>";
                                        endif;
                                    echo "</tr>";
                                }
                            } else {
                                // Display a message if no members were found
                                echo "<tr><td colspan='3'>No members found.</td></tr>";
                            }
                            $conn->close();
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <!--//! Footer -->
    <?php include './Resources/Components/Footer.php';?>
</body>
</html>
