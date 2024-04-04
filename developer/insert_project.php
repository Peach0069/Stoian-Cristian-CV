<?php
$servername = "localhost";
$username = "root";
$password = "123123123";
$database = "developer";

// Creare conexiune
$conn = new mysqli($servername, $username, $password, $database);

// Verificare conexiune
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

// Obținerea datelor din formular
$project_name = $_POST['project_name'];
$services = $_POST['services'];

// Inserare proiect în tabelul 'project'
$sql = "INSERT INTO project (PROJECT_NAME) VALUES ('$project_name')";
if ($conn->query($sql) === TRUE) {
    $project_id = $conn->insert_id;
    
    // Inserare asociere proiect-serviciu în tabelul 'project_service'
    foreach ($services as $service_id) {
        $sql = "INSERT INTO project_service (ID_PROJECT, ID_SERVICE) VALUES ('$project_id', '$service_id')";
        $conn->query($sql);
    }

    header("Location: admin.php");
            exit();
} else {
    echo "Eroare la adăugarea proiectului: " . $conn->error;
}

$conn->close();
?>
