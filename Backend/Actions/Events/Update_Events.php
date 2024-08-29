<?php
    include '../../Components/Admin_Session_Check.php';
    include '../../Database/DB_Connect.php'; 

    // Check if 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $ID = $_GET['id'];

        // Check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get form data
            $eventName = $_POST['event_name'];
            $eventDescriptionEn = $_POST['event_description_en'];
            $eventDescriptionEs = $_POST['event_description_es'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $deadline = $_POST['deadline'];
            $date = $_POST['date'];
            $eventLink = $_POST['event_link'];

            // Update the event in the database
            $updateQuery = "UPDATE events SET Event_Name=?, Event_Description_En=?, Event_Description_Es=?, Country=?, City=?, Deadline=?, Date=?, Event_Link=? WHERE ID=?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param('ssssssssi', $eventName, $eventDescriptionEn, $eventDescriptionEs, $country, $city, $deadline, $date, $eventLink, $ID);
            $stmt->execute();
            
            // Redirect to the events page after updating
            header("Location: ../../../Events.php");
            exit();
        }

        // Get event data to populate the form
        $query = "SELECT * FROM events WHERE ID=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $ID);
        $stmt->execute();
        
        // Define variables to store the results
        $stmt->bind_result($db_id, $db_eventName, $db_eventDescriptionEn, $db_eventDescriptionEs, $db_country, $db_city, $db_deadline, $db_date, $db_eventLink);
        
        // Fetch the results
        if ($stmt->fetch()) {
            $event = [
                'ID' => $db_id,
                'Event_Name' => $db_eventName,
                'Event_Description_En' => $db_eventDescriptionEn,
                'Event_Description_Es' => $db_eventDescriptionEs,
                'Country' => $db_country,
                'City' => $db_city,
                'Deadline' => $db_deadline,
                'Date' => $db_date,
                'Event_Link' => $db_eventLink
            ];
        } else {
            echo "<p>Event not found.</p>";
            exit();
        }
    } else {
        echo "<p>Event ID not provided.</p>";
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
<body id="UpdateEvents">
    <!--//! Header -->
    <?php include '../../Components/Header.php'; ?>
        
    <main class="container">
        <h1 id="Title"></h1>
        <form action="./Update_Events.php?id=<?php echo $ID; ?>" method="post">
            <div class="form-group">
                <label for="event_name" id="LbNameEvent"></label>
                <input type="text" id="event_name" name="event_name" value="<?php echo htmlspecialchars($event['Event_Name']); ?>" required>
            </div>                
            <div class="description-group">
                <label for="event_description_en" id="LbDescriptionEn"></label>
                <textarea id="event_description_en" name="event_description_en" required><?php echo htmlspecialchars($event['Event_Description_En']); ?></textarea>
            </div>
            <div class="description-group">
                <label for="event_description_es" id="LbDescriptionEs"></label>
                <textarea id="event_description_es" name="event_description_es" required><?php echo htmlspecialchars($event['Event_Description_Es']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="country" id="LbCountry"></label>
                <input type="text" id="country" name="country" value="<?php echo htmlspecialchars($event['Country']); ?>" required>
            </div>
            <div class="form-group">
                <label for="city" id="LbCity"></label>
                <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($event['City']); ?>" required>
            </div>
            <div class="form-group">
                <label for="deadline" id="LbDeadline"></label>
                <input type="date" id="deadline" name="deadline" value="<?php echo htmlspecialchars($event['Deadline']); ?>" required>
            </div>
            <div class="form-group">
                <label for="date" id="LbEventDate"></label>
                <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($event['Date']); ?>" required>
            </div>
            <div class="form-group">
                <label for="event_link" id="LbLinkEvent"></label>
                <input type="url" id="event_link" name="event_link" value="<?php echo htmlspecialchars($event['Event_Link']); ?>" required>
            </div>

            <input type="submit" value="" id="Button">
        </form>
    </main>

    <!--//! Footer -->
    <?php include '../../../Resources/Components/Footer.php';?>
</body>
</html>