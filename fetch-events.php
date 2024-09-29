<?php
include('config/connection.php');

// Set the content type to JSON
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to get appointments with patient info
    $sql = "SELECT appointments.appointment_date, appointments.type_of_service, patients.first_name, patients.last_name 
            FROM appointments 
            JOIN patients ON appointments.patient_id = patients.patient_id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch appointments
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare the appointments in FullCalendar's expected format
    $events = [];
    foreach ($appointments as $row) {
        $events[] = [
            'title' => $row['first_name'] . ' ' . $row['last_name'] . ' - ' . $row['type_of_service'],
            'start' => $row['appointment_date']
        ];
    }

    // Return the JSON response
    echo json_encode($events);

} catch (PDOException $e) {
    // In case of an error, return a JSON-encoded error message
    echo json_encode(['error' => 'Connection failed: ' . $e->getMessage()]);
}

?>
