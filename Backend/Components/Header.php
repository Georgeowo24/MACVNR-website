<?php
    // Start the session if not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<header>
    <a href="../../../Index.php" class="brand">
        <img src="../../../Resources/Img/Logo-MACVNR-White.png" alt="Logo-MACVNR">
    </a>
    <nav class="menu">
        <!-- Close button for the menu -->
        <div class="btn">
            <i class='bx bx-x close-btn'></i>
        </div>

        <ul>
            <li><a href="../../../Index.php" id="HomeBtn"></a></li>
            <?php if (isset($_SESSION['admin_email'])): ?>
                <li><a href="../../../Admin_Dashboard.php" id="DashboardBtn"></a></li>
            <?php else: ?>
                <li><a href="../../../Governing_Board.php" id="ManagementBoardBtn"></a></li>
                <li><a href="../../../Members.php" id="MembersBtn"></a></li>
                <li><a href="../../../Events.php" id="EventsBtn"></a></li>
            <?php endif; ?>

            <li><button id="LanguageBtn">En</button></li>
            
            <?php if (isset($_SESSION['admin_email'])): ?>
                <li><a href="../../../Logout.php"><i class='bx bx-log-out'></i></a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- Menu button for toggling the navigation menu -->
    <div class="btn">
        <i class='bx bx-menu menu-btn'></i>
    </div>
</header>
