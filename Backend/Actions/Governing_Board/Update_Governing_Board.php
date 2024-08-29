<?php
    include '../../Components/Admin_Session_Check.php';
    include '../../Database/DB_Connect.php'; 

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize input data to prevent SQL injection
        $id = $conn->real_escape_string($_POST['id']);
        $first_name = $conn->real_escape_string($_POST['first_name']);
        $last_name = $conn->real_escape_string($_POST['last_name']);
        $middle_name = $conn->real_escape_string($_POST['middle_name']);
        $position_es = $conn->real_escape_string($_POST['position_es']);
        $position_en = $conn->real_escape_string($_POST['position_en']);
        $institution = $conn->real_escape_string($_POST['institution']);
        $existing_image = $_POST['existing_image'];
        $relative_image_path = $existing_image;

        // Check if a new image was uploaded
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
            // Upload the new image
            $image = $_FILES['imagen'];
            $image_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            $image_name = "{$first_name}_{$last_name}_{$middle_name}.{$image_extension}";
            $image_path = "../../../Resources/Img/Governing_Board/" . $image_name;
            $relative_image_path = "./Resources/Img/Governing_Board/" . $image_name;
            $absolute_image_path = "../../." . $relative_image_path;

            // Validate the image file type
            $allowed_types = array('jpg', 'jpeg', 'png');
            if (!in_array(strtolower($image_extension), $allowed_types)) {
                echo "Solo se permiten archivos JPG, JPEG, PNG";
                exit;
            }

            // Delete the existing image if it exists
            $existing_absolute_image_path = "../../." . $existing_image;
            if (file_exists($existing_absolute_image_path)) {
                unlink($existing_absolute_image_path);
            }

            // Move the uploaded file to the target directory
            if (!move_uploaded_file($image['tmp_name'], $absolute_image_path)) {
                echo "Error uploading the image";
                exit;
            }
        }

        // Prepare the SQL query to update the member's details
        $sql = "UPDATE governing_board SET Image='$relative_image_path', First_Name='$first_name', Last_Name='$last_name', Middle_Name='$middle_name', Position_Es='$position_es', Position_En='$position_en', Institution='$institution' WHERE ID='$id'";

        // Execute the query and check if it was successful
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Member updated successfully'); window.location.href='../../../Governing_Board.php'</script>";
            exit;
        } else {
            echo "<script>alert('Error updating member'); window.location.href='../../../Governing_Board.php'</script>";
        }
    } else {
        // If the form was not submitted, check if 'id' is provided
        if (isset($_GET['id'])) {
            $id = $conn->real_escape_string($_GET['id']);
            
            // Retrieve the member details from the database
            $sql = "SELECT * FROM governing_board WHERE ID='$id'";
            $result = $conn->query($sql);
            $member = $result->fetch_assoc();
        } else {
            echo "No se ha proporcionado un ID válido.";
            exit;
        }
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
    <link rel="icon" href="../../../Resources/Img/Icon-MACVNR-White.ico">
    
    <!--//* CSS -->
    <link rel="stylesheet" href="../../../Resources/Styles/Header-Static.css">
    <link rel="stylesheet" href="../../../Resources/Styles/Update_Governing_Board.css?1.7">
    <link rel="stylesheet" href="../../../Resources/Styles/Footer.css?1.3">

    <!--//? Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!--//* Header Script -->
    <script src="../../Components/Header.js"></script>

    <!--//! Multilanguages ​​-->
    <script src="../../Languages/Pages/Change_Language.js" type="module"></script>
</head>
<body id="UpdateGoverningBoard">
    <!--//! Header -->
    <?php include '../../Components/Header.php'; ?>

    <div class="container">
        <main>
            <h1 id="Title"></h1>
            <form action="./Update_Governing_Board.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $member['ID']; ?>">
                <input type="hidden" name="existing_image" value="<?php echo $member['Image']; ?>">
                <div id="drop-area">
                    <i class='bx bxs-cloud-upload icon'></i>
                    <p id="DragImage"></p>
                    <small id="UploadImage"></small><br>
                    <i class='bx bxs-file-jpg icon-files'></i>
                    <i class='bx bxs-file-png icon-files'></i>
                    <input type="file" name="imagen" id="imagen" accept="image/*">
                    <div id="preview">
                        <img src="../../../Resources/Img/Governing_Board/<?php echo basename($member['Image']); ?>" alt="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="first_name" id="LbFirstName"></label>
                    <input type="text" name="first_name" id="first_name" value="<?php echo $member['First_Name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="last_name" id="LbLastName"></label>
                    <input type="text" name="last_name" id="last_name" value="<?php echo $member['Last_Name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="middle_name" id="LbMiddleName"></label>
                    <input type="text" name="middle_name" id="middle_name" value="<?php echo $member['Middle_Name']; ?>">
                </div>
                <div class="form-group">
                    <label for="position_es" id="LbPositionEs"></label>
                    <input type="text" name="position_es" id="position_es" value="<?php echo $member['Position_Es']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="position_en" id="LbPositionEn"></label>
                    <input type="text" name="position_en" id="position_en" value="<?php echo $member['Position_En']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="institution" id="LbInstitution"></label>
                    <input type="text" name="institution" id="institution" value="<?php echo $member['Institution']; ?>" required>
                </div>
                
                <input type="submit" value="" id="Button">
            </form>
        </main>
    </div>

    <!--//! Footer -->
    <?php include '../../../Resources/Components/Footer.php';?>

    <!--//* Script to drag images -->
    <script src="../../Components/Drag-Image.js"></script>
</body>
</html>
