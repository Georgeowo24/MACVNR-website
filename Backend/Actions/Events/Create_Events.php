<?php
    include '../../Components/Admin_Session_Check.php';
    include '../../Database/DB_Connect.php';

     // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $eventName = $_POST['event_name'];
        $eventDescriptionEn = $_POST['event_description_en'];
        $eventDescriptionEs = $_POST['event_description_es'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $deadline = $_POST['deadline'];
        $date = $_POST['date'];
        $eventLink = $_POST['event_link'];

        // Insert the new event into the database
        $insertQuery = "INSERT INTO events (Event_Name, Event_Description_En, Event_Description_Es, Country, City, Deadline, Date, Event_Link) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param('ssssssss', $eventName, $eventDescriptionEn, $eventDescriptionEs, $country, $city, $deadline, $date, $eventLink);
        $stmt->execute();
        

         // Redirect to the events page after adding the new event
        echo "<script>alert('New event successfully added'); window.location.href='../../../Events.php'</script>";
        exit();
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
    <link rel="stylesheet" href="../../../Resources/Styles/Update_Events.css?1.5">
    <link rel="stylesheet" href="../../../Resources/Styles/Footer.css?1.3">

    <!--//? Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!--//* Header Script -->
    <script src="../../Components/Header.js"></script>

    <!--//! Multilanguages ​​-->
    <script src="../../Languages/Pages/Change_Language.js" type="module"></script>
</head>
<body id="CreateEvents">
    <!--//! Header -->
    <?php include '../../Components/Header.php'; ?>
        
    <main class="container">
        <h1 id="Title"></h1>
        <form action="./Create_Events.php" method="post">
            <div class="form-group">
                <label for="event_name" id="LbNameEvent"></label>
                <input type="text" id="event_name" name="event_name" required>
            </div>                
            <div class="description-group">
                <label for="event_description_en" id="LbDescriptionEn"></label>
                <textarea id="event_description_en" name="event_description_en" required></textarea>
            </div>
            <div class="description-group">
                <label for="event_description_es" id="LbDescriptionEs"></label>
                <textarea id="event_description_es" name="event_description_es" required></textarea>
            </div>
            <div class="form-group">
                <label for="country" id="LbCountry"></label>
                <input type="text" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="city" id="LbCity"></label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="deadline" id="LbDeadline"></label>
                <input type="date" id="deadline" name="deadline" required>
            </div>
            <div class="form-group">
                <label for="date" id="LbEventDate"></label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="event_link" id="LbLinkEvent"></label>
                <input type="url" id="event_link" name="event_link" required>
            </div>

            <input type="submit" value="" id="Button">
        </form>
    </main>

    <!--//! Footer -->
    <?php include '../../../Resources/Components/Footer.php';?>
</body>
</html>