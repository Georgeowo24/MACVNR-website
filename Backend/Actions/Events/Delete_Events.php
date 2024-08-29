<?php
    include '../../Components/Admin_Session_Check.php';
    include '../../Database/DB_Connect.php';

    // Check if 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $ID = $_GET['id'];

        // Prepare the SQL query to delete the event with the specified ID
        $deleteQuery = "DELETE FROM events WHERE ID=?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param('i', $ID);
        
        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            // Redirect to the events page after successful deletion
            header("Location: ../../../Events.php");
            exit();
        } else {
            // Display an error message if the deletion failed
            echo "Error deleting event: " . $conn->error;
        }
        $stmt->close();
    }
    $conn->close();
?>
