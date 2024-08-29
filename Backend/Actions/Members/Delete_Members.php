<?php
    include '../../Components/Admin_Session_Check.php';
    include '../../Database/DB_Connect.php';

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id']);

        // Prepare the SQL statement to delete the member with the given ID
        $sql = "DELETE FROM members WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Member deleted successfully'); window.location.href='../../../Members.php';</script>";
        } else {
            echo "<script>alert('Error deleting the member'); window.location.href='../../../Members.php';</script>";
        }

        $stmt->close();
        $conn->close();
    } else {
        // If the request method is not POST, show an error message
        echo "<script>alert('Invalid request method'); window.location.href='../../../Members.php';</script>";
    }
?>
