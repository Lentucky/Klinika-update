<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- jQuery (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<nav>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <img src="img/logo.png" alt="">
    <div class="collapse show" id="navbarNav"> <!-- Added 'show' class -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php') { echo 'active'; } ?>" href="index.php"><i class='bx bxs-dashboard'></i> DASHBOARD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(basename($_SERVER['SCRIPT_NAME']) == 'appointments.php') { echo 'active'; } ?>" href="appointments.php"><i class='bx bx-calendar-week'></i> APPOINTMENTS</a>
            </li>
            <!-- more nav items here -->
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['SCRIPT_NAME']) == 'patient-records.php') ? 'active' : '' ?>" href="patient-records.php"><i class='bx bx-book' ></i>  PATIENT RECORDS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['SCRIPT_NAME']) == 'schedule.php') ? 'active' : '' ?>" href="schedule.php"><i class='bx bx-time-five' ></i>  SCHEDULE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['SCRIPT_NAME']) == 'transactions.php') ? 'active' : '' ?>" href="transactions.php"><i class='bx bx-bar-chart' ></i>  TRANSACTIONS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (basename($_SERVER['SCRIPT_NAME']) == 'staff.php') ? 'active' : '' ?>" href="staff.php"><i class='bx bxs-user' ></i>  STAFF</a>
            </li>
        </ul>
    </div>
</nav>






