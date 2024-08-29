<?php
    include '../../Components/Admin_Session_Check.php';
    include '../../Database/DB_Connect.php'; 

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize the ID to prevent SQL injection
        $id = $conn->real_escape_string($_POST['id']);
        
        // Retrieve the image path associated with the given ID
        $sql = "SELECT Image FROM governing_board WHERE ID='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $image_path = "../../." . $row['Image'];

            // Delete the image file if it exists
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // Delete the record from the database
        $sql = "DELETE FROM governing_board WHERE ID='$id'";
        if ($conn->query($sql) === TRUE) {
            // Redirect to the governing board page after deletion
            header("Location: ../../../Governing_Board.php");
            exit;
        } else {
            // Display an error message if the deletion failed
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>
