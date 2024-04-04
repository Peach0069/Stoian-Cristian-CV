<?php
// Verifică dacă a fost trimis un ID de proiect pentru ștergere
if (isset($_POST['project_id'])) {
    // Preiați ID-ul proiectului trimis prin formular
    $project_id = $_POST['project_id'];

    // Conectați-vă la baza de date
    $servername = "localhost";
    $username = "root";
    $password = "123123123";
    $database = "developer";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificați conexiunea
    if ($conn->connect_error) {
        die("Conexiune eșuată: " . $conn->connect_error);
    }

    // Ștergeți intrările asociate din tabelul `project_service`
    $delete_project_service_sql = "DELETE FROM project_service WHERE ID_PROJECT = $project_id";
    if ($conn->query($delete_project_service_sql) === TRUE) {
        // Ștergeți proiectul din tabelul `project`
        $delete_project_sql = "DELETE FROM project WHERE ID_PROJECT = $project_id";
        if ($conn->query($delete_project_sql) === TRUE) {
            // Redirecționați către pagina principală după ștergere
            header("Location: admin.php");
            exit();
        } else {
            echo "Eroare la ștergerea proiectului: " . $conn->error;
        }
    } else {
        echo "Eroare la ștergerea înregistrărilor asociate din project_service: " . $conn->error;
    }

    $conn->close();
}
?>
