<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'C:/xampp/htdocs/SUPERHERO-SYSTEM/controllers/db_connection.php';

if (!$pdo) {
    die("Connection failed: hindi pa nakakonek");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $complainantName = $_POST['complainant_name'] ?? '';
    $complainantAddress = $_POST['complainant_address'] ?? '';
    $respondentName = $_POST['respondent_name'] ?? '';
    $respondentAddress = $_POST['respondent_address'] ?? '';
    $complaintCategory = $_POST['complaint_category'] ?? '';
    $complaintDescription = $_POST['complaint_description'] ?? '';
    $placeOfIncident = $_POST['place_of_incident'] ?? '';
    $dateOfIncident = $_POST['incidence_date'] ?? ''; 
    $timeOfIncident = $_POST['incidence_time'] ?? ''; 
    $caseNumber = $_POST['case_number'] ?? ''; 
    $specialCase = $_POST['special_case'] ?? ''; 
    $query = "INSERT INTO complaint (complainant_name, complainant_address, respondent_name, respondent_address, complaint_category, complaint_description, place_of_incident, date_of_incident, time_of_incident, case_number ,special_case) VALUES (:complainant_name, :complainant_address, :respondent_name, :respondent_address, :complaint_category, :complaint_description, :place_of_incident, :date_of_incident, :time_of_incident, :case_number, :special_case)";
    $stmt = $pdo->prepare($query);

    //bind para sa avoiding ng sql injec
    $params = [
        ':complainant_name' => $complainantName,
        ':complainant_address' => $complainantAddress,
        ':respondent_name' => $respondentName,
        ':respondent_address' => $respondentAddress,
        ':complaint_category' => $complaintCategory,
        ':complaint_description' => $complaintDescription,
        ':place_of_incident' => $placeOfIncident,
        ':date_of_incident' => $dateOfIncident,
        ':time_of_incident' => $timeOfIncident,
        ':case_number' => $caseNumber,
        ':special_case' => $specialCase,
      
    ];
    foreach ($params as $param => $value) {
        $stmt->bindParam($param, $params[$param]);
    } 
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Submit successfully';
        header("Location: http://localhost/SUPERHERO-SYSTEM/views/dashboard/departments/BPSO/Dashboard%20main/bpso.php");
        exit();
        
    } else {
        echo "Error: " . implode(", ", $stmt->errorInfo());
    }  
} 
$pdo = null; 
?>

