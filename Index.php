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
    <link rel="stylesheet" href="./Resources/Styles/Header.css?1.4">
    <link rel="stylesheet" href="./Resources/Styles/Index.css?1.13">
    <link rel="stylesheet" href="./Resources/Styles/Cards_Events.css?1.1">
    <link rel="stylesheet" href="./Resources/Styles/Footer.css?1.5">

    <!--//? Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--//* Header Script -->
    <script src="./Backend/Components/Header.js"></script>

    <!--//! Multilanguages ​​-->
    <script src="./Resources/Languages/Pages/Change_Language.js" type="module"></script>
</head>
<body id="Index">
    <!--//! Header -->
    <?php include './Resources/Components/Header.php' ?>

    <div class="container">
        <section class="section-main">
            <h1 id="Title"></h1>
            <h2>MACVNR</h2>
        </section>

        <div class="divider"></div>

        <main>
            <section class="section-about-us">
                <h2 class="title" id="AboutUs"></h2>
                <p class="text" id="AboutUsTxt1"></p>
                <p class="text" id="AboutUsTxt2"></p>
                <p class="text" id="AboutUsTxt3"></p>
            </section>

            <div class="section-image left"></div>

            <section>
                <h3 id="TitleMissionActivities"></h3>
                <p class="text" id="TxtMissionActivities"></p>

                <h4 id="TitleObjectives"></h4>
                <ul>
                    <li class="text items" id="ObjectivesItem1"></li>
                    <li class="text items" id="ObjectivesItem2"></li>
                    <li class="text items" id="ObjectivesItem3"></li>
                    <li class="text items" id="ObjectivesItem4"></li>
                    <li class="text items" id="ObjectivesItem5"></li>
                </ul>

                <h4 id="TitleActivities"></h4>
                <ul>
                    <li class="text items" id="ActivitiesItem1"></li>
                    <li class="text items" id="ActivitiesItem2"></li>
                    <li class="text items" id="ActivitiesItem3"></li>
                    <li class="text items" id="ActivitiesItem4"></li>
                    <li class="text items" id="ActivitiesItem5"></li>
                </ul>

            </section>

            <div class="section-image right"></div>
        </main>

        <aside>
            <h2 class="title" id="UpcomingEvents"></h2>

            <?php
                include './Backend/Database/DB_Connect.php';

                // Get the language from the URL (default is English)
                $lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

                // Define the names of the months in Spanish and English
                $months = array(
                    'es' => array(
                        'Jan' => 'Enero',
                        'Feb' => 'Febrero',
                        'Mar' => 'Marzo',
                        'Apr' => 'Abril',
                        'May' => 'Mayo',
                        'Jun' => 'Junio',
                        'Jul' => 'Julio',
                        'Aug' => 'Agosto',
                        'Sep' => 'Septiembre',
                        'Oct' => 'Octubre',
                        'Nov' => 'Noviembre',
                        'Dec' => 'Diciembre'
                    ),
                    'en' => array(
                        'Jan' => 'January',
                        'Feb' => 'February',
                        'Mar' => 'March',
                        'Apr' => 'April',
                        'May' => 'May',
                        'Jun' => 'June',
                        'Jul' => 'July',
                        'Aug' => 'August',
                        'Sep' => 'September',
                        'Oct' => 'October',
                        'Nov' => 'November',
                        'Dec' => 'December'
                    )
                );

                // Get the current date
                $currentDate = date('Y-m-d');

                // Query to retrieve events that have not yet passed
                $query = "SELECT Event_Name, Event_Description_Es, Event_Description_En, Country, City, Deadline, Date, Event_Link FROM events WHERE Date >= '$currentDate' LIMIT 10";

                $result = $conn->query($query);

                // Check if there are results and process each event
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $date = strtotime($row['Date']);
                        $month = date('M', $date);
                        $day = date('d', $date);
                        $year = date('Y', $date);
                        $eventLink = $row['Event_Link'];
                        $eventName = $row['Event_Name'];
                        $eventDescription = $lang === 'en' ? $row['Event_Description_En'] : $row['Event_Description_Es'];
                        $eventLocation = $row['City'] . ', ' . $row['Country'];
                        $deadline = $row['Deadline'];

                        // Get the month name in the selected language
                        $monthName = isset($months[$lang][$month]) ? $months[$lang][$month] : $month;
                        ?>

                        <!-- HTML structure to display an event -->
                        <div class="event-container">
                            <div class="event-container-date">
                                <p class="event-month"><?php echo $monthName; ?></p>
                                <p class="event-day"><?php echo $day; ?></p>
                                <p class="event-year"><?php echo $year; ?></p>
                            </div>
                            <div class="event-info">
                                <a href="<?php echo $eventLink; ?>" class="event-title"><?php echo $eventName; ?></a>
                                <p class="event-description"><?php echo $eventDescription; ?></p>
                                <p class="event-location"><?php echo $eventLocation; ?></p>
                                <p class="deadline">Fecha Limite: <?php echo $deadline; ?></p>
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    // Display a message if no events are found
                    echo "<p id='NoEvents'></p>";
                }
                $conn->close();
            ?>

            <div id="ContarinerViewAllEvents">
                <a href="./Events.php" id="ViewEvents"></a>
            </div>
        </aside>

        <!--//! Footer -->
        <?php include './Resources/Components/Footer.php';?>
    </div>
</body>
</html>
