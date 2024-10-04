<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Calendar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- jQuery (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/schedule.css">

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
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



        <div id="calendar"></div>
        <!-- Modal structure -->
        <div id="modalBackdrop"></div>
        <div id="appointmentModal">
            <div class="modal-content">
                <h4>Appointment Details</h4>
                <p id="appointmentDetails"></p>
                <button id="closeModal">Close</button>
                <button id="checkAppointmentBtn">Check Appointment</button>
            </div>
        </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            // Initialize FullCalendar
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: 'fetch-events.php',  
                eventClick: function(info) {
                    var modal = document.getElementById('appointmentModal');
                    var modalBackdrop = document.getElementById('modalBackdrop');
                    
                    // Display appointment details
                    var details = "Patient: " + info.event.title + "<br>Date: " + info.event.start.toLocaleString();
                    document.getElementById('appointmentDetails').innerHTML = details;

                    // Show modal and backdrop
                    modal.style.display = 'block';
                    modalBackdrop.style.display = 'block';

                    // Handle the "Check Appointment" button click
                    document.getElementById('checkAppointmentBtn').onclick = function() {
                        window.location.href = '/appointment_details.php?id=' + info.event.id; // Redirect to appointment details page
                    };

                    // Close modal on button click
                    document.getElementById('closeModal').onclick = function() {
                        modal.style.display = 'none';
                        modalBackdrop.style.display = 'none';
                    };

                    // Close modal when clicking outside the modal
                    modalBackdrop.onclick = function() {
                        modal.style.display = 'none';
                        modalBackdrop.style.display = 'none';
                    };
                }
            });
            calendar.render();                   
        });
    </script>
</body>
</html>


<?php include('partials/footer.php') ?>