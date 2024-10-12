<?php
    // Start the session
    session_start();
    include './Database/DB_Connect.php';

    // New administrator data
    $first_name = '';
    $email = '';
    $password = '';

    // Hash the password using a secure hashing algorithm
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    echo "Hash generado: " . $hashed_password . "<br>";

    // Prepare the SQL statement to insert the new administrator into the database
    $sql = "INSERT INTO admin (First_Name, Email, Password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $first_name, $email, $hashed_password);

    // Execute the SQL statement and check if it was successful
    if ($stmt->execute()) {
        echo "Admin registered successfully";
    } else {
        // Display an error message if the insertion fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
?>
