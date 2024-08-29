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
    <link rel="stylesheet" href="./Resources/Styles/Header-Static.css?1.1">
    <link rel="stylesheet" href="./Resources/Styles/Events.css?1.5">
    <link rel="stylesheet" href="./Resources/Styles/Cards_Events.css?1.3">
    <link rel="stylesheet" href="./Resources/Styles/Footer.css?1.2">

    <!--//? Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--//* Header Script -->
    <script src="./Backend/Components/Header.js"></script>

    <!--//! Multilanguages ​​-->
    <script src="./Resources/Languages/Pages/Change_Language.js" type="module"></script>
</head>
<body id="Events">
    <!--//! Header -->
    <?php include './Resources/Components/Header.php' ?>
    
    <main>
        <?php if (isset($_SESSION['admin_email'])): ?>
            <!-- Checks if the user is authenticated as an administrator. If so, displays a special button for administrators -->
            <a href="./Backend/Actions/Events/Create_Events.php" class="btn-full">
                <p id="BtnAddEvents"></p>
            </a>
        <?php endif; ?>
        <h2 id="Title"></h2>

        <?php
            include './Backend/Database/DB_Connect.php';

            // Get the language from the URL, default is English (en)
            $lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

            // Define the names of the months in Spanish and English
            $months = array(
                'es' => array(
                    'January' => 'Enero',
                    'February' => 'Febrero',
                    'March' => 'Marzo',
                    'April' => 'Abril',
                    'May' => 'Mayo',
                    'June' => 'Junio',
                    'July' => 'Julio',
                    'August' => 'Agosto',
                    'September' => 'Septiembre',
                    'October' => 'Octubre',
                    'November' => 'Noviembre',
                    'December' => 'Diciembre'
                ),
                'en' => array(
                    'January' => 'January',
                    'February' => 'February',
                    'March' => 'March',
                    'April' => 'April',
                    'May' => 'May',
                    'June' => 'June',
                    'July' => 'July',
                    'August' => 'August',
                    'September' => 'September',
                    'October' => 'October',
                    'November' => 'November',
                    'December' => 'December'
                )
            );

            // Query to retrieve all events from the database
            $query = "SELECT * FROM events";
            $result = $conn->query($query);

            // Array to store events grouped by year and month
            $eventsByYearMonth = array();

            // If the query returns results, process each row
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                     // Convert the date to a timestamp and then extract the year and month
                    $date = strtotime($row['Date']);
                    $year = date('Y', $date);
                    $month = date('F', $date); // Month in full format

                    // Get the month name in the selected language
                    $monthName = isset($months[$lang][$month]) ? $months[$lang][$month] : $month;

                    // Create an array with the event data
                    $event = array(
                        "ID" => $row['ID'],
                        "Event_Name" => $row['Event_Name'],
                        "Event_Description_En" => $row['Event_Description_En'],
                        "Event_Description_Es" => $row['Event_Description_Es'],
                        "Country" => $row['Country'],
                        "City" => $row['City'],
                        "Deadline" => $row['Deadline'],
                        "Date" => $row['Date'],
                        "Event_Link" => $row['Event_Link']
                    );

                    // Group the event by year and month
                    $eventsByYearMonth[$year][$monthName][] = $event;
                }
            }

            // Display the events grouped by year and month
            if (!empty($eventsByYearMonth)) {
                foreach ($eventsByYearMonth as $year => $months) {
                    // Create a container for each year, which can be expanded and collapsed
                    echo "<details class='year-details' open>";
                    echo "<summary class='year'>$year</summary>";
                    foreach ($months as $month => $events) {
                        // Create a container for each month within the year, also expandable
                        echo "<details class='month-details' open>";
                        echo "<summary class='month'>$month</summary>";
                        foreach ($events as $event) {
                            // Get event details to display them
                            $date = strtotime($event['Date']);
                            $day = date('d', $date);
                            $eventLink = $event['Event_Link'];
                            $eventName = $event['Event_Name'];
                            // Select the event description based on the language
                            $eventDescription = $lang === 'en' ? $event['Event_Description_En'] : $event['Event_Description_Es'];
                            $eventLocation = $event['City'] . ', ' . $event['Country'];
                            $deadline = $event['Deadline'];
                            $ID = $event['ID'];
                            ?>
                            <!-- HTML structure to display an event -->
                            <div class="event-container">
                                <div class="event-container-date">
                                    <p class="event-day"><?php echo $day; ?></p>
                                    <p class="event-month"><?php echo $month; ?></p>
                                    <p class="event-year"><?php echo $year; ?></p>
                                </div>

                                <div class="event-info">
                                    <a href="<?php echo $eventLink; ?>" class="event-title"><?php echo $eventName; ?></a>
                                    <p class="event-description"><?php echo $eventDescription; ?></p>
                                    <p class="event-location"><?php echo $eventLocation; ?></p>
                                    <p class="deadline">Fecha Limite: <?php echo $deadline; ?></p>
                                </div>
                                
                                <!-- Edit and delete buttons, visible only to admins -->
                                <?php if (isset($_SESSION['admin_email'])): ?>
                                    <div class="event-buttons">
                                        <a href="./Backend/Actions/Events/Update_Events.php?id=<?php echo $ID; ?>" class="icon icon-edit">
                                            <i class='bx bx-edit-alt'></i>
                                        </a>
                                        <a href="./Backend/Actions/Events/Delete_Events.php?id=<?php echo $ID; ?>" class="icon icon-delete" onclick="return confirm('¿Estás seguro de que deseas eliminar este evento?');">
                                            <i class='bx bx-trash'></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php
                        }
                        echo "</details>";
                    }
                    echo "</details>";
                }
            } else {
                // Display a message if no upcoming events are found
                echo "<p>No upcoming events found.</p>";
            }
            // Close the database connection
            $conn->close();
        ?>
    </main>

    <!--//! Footer -->
    <?php include './Resources/Components/Footer.php';?>
</body>
</html>
